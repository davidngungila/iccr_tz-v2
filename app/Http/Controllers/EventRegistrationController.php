<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\ActivityLog;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class EventRegistrationController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'campus' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'year_of_study' => 'nullable|string|max:50',
            'course' => 'nullable|string|max:255',
            'special_requirements' => 'nullable|string|max:1000',
            'dietary_restrictions' => 'nullable|string|max:500',
            'accommodation_needed' => 'nullable|in:yes,no',
            'transportation_needed' => 'nullable|in:yes,no',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
        ], [
            'full_name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter your phone number.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('event.register', $event->slug)
                ->withErrors($validator)
                ->withInput();
        }

        // Check if already registered
        $existing = EventRegistration::where('event_id', $event->id)
            ->where('email', $request->email)
            ->first();

        if ($existing) {
            return redirect()->route('event.register', $event->slug)
                ->with('error', 'You have already registered for this event.')
                ->withInput();
        }

        $registration = EventRegistration::create([
            'event_id' => $event->id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'campus' => $request->campus,
            'institution' => $request->institution,
            'year_of_study' => $request->year_of_study,
            'course' => $request->course,
            'special_requirements' => $request->special_requirements,
            'dietary_restrictions' => $request->dietary_restrictions,
            'accommodation_needed' => $request->accommodation_needed ?? 'no',
            'transportation_needed' => $request->transportation_needed ?? 'no',
            'emergency_contact_name' => $request->emergency_contact_name,
            'emergency_contact_phone' => $request->emergency_contact_phone,
            'status' => 'pending',
        ]);

        // Send SMS notification using NotificationService
        try {
            $notificationService = new NotificationService();
            
            // Format event date and location
            $eventDate = $event->start_date ? $event->start_date->format('d M Y') : 'TBA';
            $eventLocation = $event->location ? " mahali: {$event->location}" : "";
            
            // Create personalized SMS message in Swahili
            $smsMessage = "Habari {$registration->full_name}! Umesajiliwa kikamilifu kwa {$event->title} tarehe {$eventDate}{$eventLocation}. Tutakutumia maelezo zaidi hivi karibuni. - ICCR Tanzania";
            
            // Send SMS
            $smsSent = $notificationService->sendSMS($registration->phone, $smsMessage);
            
            if ($smsSent) {
                $registration->update(['sms_sent' => true]);
                
                // Log successful SMS
                \App\Models\ActivityLog::create([
                    'user_id' => null, // System action
                    'action' => 'sms_sent',
                    'model_type' => 'EventRegistration',
                    'model_id' => $registration->id,
                    'description' => "SMS confirmation sent to {$registration->full_name} ({$registration->phone}) for event: {$event->title}",
                    'ip_address' => $request->ip(),
                ]);
            } else {
                // Log failed SMS
                \App\Models\ActivityLog::create([
                    'user_id' => null,
                    'action' => 'sms_error',
                    'model_type' => 'EventRegistration',
                    'model_id' => $registration->id,
                    'description' => "Failed to send SMS confirmation to {$registration->full_name} ({$registration->phone}) for event: {$event->title}",
                    'ip_address' => $request->ip(),
                ]);
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send registration SMS', [
                'registration_id' => $registration->id,
                'phone' => $registration->phone,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            // Log to ActivityLog
            try {
                \App\Models\ActivityLog::create([
                    'user_id' => null,
                    'action' => 'sms_error',
                    'model_type' => 'EventRegistration',
                    'model_id' => $registration->id,
                    'description' => "Exception sending SMS to {$registration->full_name} ({$registration->phone}): " . $e->getMessage(),
                    'ip_address' => $request->ip(),
                ]);
            } catch (\Exception $logException) {
                // Fail silently if ActivityLog fails
            }
            
            // Continue even if SMS fails - registration is still successful
        }

        // Redirect to success page or back with success message
        return redirect()->route('event.show', $event->slug)
            ->with('success', 'Registration successful! You will receive a confirmation SMS shortly.');
    }

}
