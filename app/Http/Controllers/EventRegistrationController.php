<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            $smsMessage = "Hello {$registration->full_name}, you have successfully registered for {$event->title} on {$event->start_date->format('M d, Y')}. We'll send you more details soon. - ICCR Tanzania";
            
            $smsSent = $notificationService->sendSMS($registration->phone, $smsMessage);
            if ($smsSent) {
                $registration->update(['sms_sent' => true]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to send registration SMS: ' . $e->getMessage());
            // Continue even if SMS fails
        }

        // Redirect to success page or back with success message
        return redirect()->route('event.show', $event->slug)
            ->with('success', 'Registration successful! You will receive a confirmation SMS shortly.');
    }

}
