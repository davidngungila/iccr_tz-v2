<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
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
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Check if already registered
        $existing = EventRegistration::where('event_id', $event->id)
            ->where('email', $request->email)
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'You have already registered for this event.'
            ], 422);
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

        // Send SMS notification
        $smsSent = $this->sendRegistrationSMS($registration, $event);
        if ($smsSent) {
            $registration->update(['sms_sent' => true]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Registration successful! You will receive a confirmation SMS shortly.',
            'registration_id' => $registration->id
        ]);
    }

    private function sendRegistrationSMS(EventRegistration $registration, Event $event): bool
    {
        try {
            // SMS API Configuration (Update with your SMS provider)
            $smsApiUrl = env('SMS_API_URL', 'https://api.example.com/sms');
            $smsApiKey = env('SMS_API_KEY', '');
            $smsSenderId = env('SMS_SENDER_ID', 'ICCR TZ');

            if (empty($smsApiKey)) {
                \Log::info('SMS API key not configured. Skipping SMS for registration: ' . $registration->id);
                return false;
            }

            $message = "Hello {$registration->full_name}, you have successfully registered for {$event->title} on {$event->start_date->format('M d, Y')}. We'll send you more details soon. - ICCR Tanzania";

            // Example SMS API call using cURL (works without external dependencies)
            // Adjust the API format based on your SMS provider
            $ch = curl_init($smsApiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $smsApiKey,
                'Content-Type: application/json',
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'to' => $registration->phone,
                'message' => $message,
                'from' => $smsSenderId,
            ]));
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            if ($httpCode === 200) {
                \Log::info('SMS sent successfully to: ' . $registration->phone);
                return true;
            } else {
                \Log::warning('SMS sending failed. HTTP Code: ' . $httpCode . ', Error: ' . $error);
            }

            return false;
        } catch (\Exception $e) {
            \Log::error('Failed to send SMS: ' . $e->getMessage());
            return false;
        }
    }
}
