<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Attendance;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Event $event)
    {
        $registrations = EventRegistration::where('event_id', $event->id)
            ->where('status', 'confirmed')
            ->with(['attendances' => function($query) use ($event) {
                $query->where('event_id', $event->id);
            }])
            ->orderBy('full_name')
            ->get();
        
        $attendanceStats = [
            'total_registered' => EventRegistration::where('event_id', $event->id)->where('status', 'confirmed')->count(),
            'total_checked_in' => Attendance::where('event_id', $event->id)->distinct('registration_id')->count(),
            'present_today' => Attendance::where('event_id', $event->id)
                ->where('attendance_date', today())
                ->where('status', 'present')
                ->count(),
            'late_today' => Attendance::where('event_id', $event->id)
                ->where('attendance_date', today())
                ->where('status', 'late')
                ->count(),
        ];
        
        return view('admin.events.attendance', compact('event', 'registrations', 'attendanceStats'));
    }

    public function checkIn(Request $request, Event $event, EventRegistration $registration)
    {
        $validated = $request->validate([
            'attendance_date' => 'nullable|date',
            'check_in_time' => 'nullable',
            'notes' => 'nullable|string',
        ]);

        $attendanceDate = $validated['attendance_date'] ?? today();
        
        // Check if already checked in for this date
        $existing = Attendance::where('event_id', $event->id)
            ->where('registration_id', $registration->id)
            ->where('attendance_date', $attendanceDate)
            ->first();

        if ($existing) {
            return back()->with('error', 'Already checked in for this date!');
        }

        $checkInTime = $validated['check_in_time'] ?? now();
        $eventStartTime = $event->start_date->format('H:i');
        $isLate = $checkInTime > $eventStartTime;

        $attendance = Attendance::create([
            'event_id' => $event->id,
            'registration_id' => $registration->id,
            'attendance_date' => $attendanceDate,
            'check_in_time' => $checkInTime,
            'status' => $isLate ? 'late' : 'present',
            'checked_in_by' => Auth::user()->name,
            'notes' => $validated['notes'] ?? null,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'Attendance',
            'model_id' => $attendance->id,
            'description' => "Checked in '{$registration->full_name}' for event '{$event->title}'",
        ]);

        return back()->with('success', 'Check-in successful!');
    }

    public function checkOut(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'check_out_time' => 'nullable',
            'notes' => 'nullable|string',
        ]);

        $checkOutTime = $validated['check_out_time'] ?? now();
        $eventEndTime = $attendance->event->end_date?->format('H:i');
        $isEarlyExit = $eventEndTime && $checkOutTime < $eventEndTime;

        $attendance->update([
            'check_out_time' => $checkOutTime,
            'status' => $isEarlyExit ? 'early_exit' : $attendance->status,
            'notes' => $validated['notes'] ?? $attendance->notes,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'Attendance',
            'model_id' => $attendance->id,
            'description' => "Checked out '{$attendance->registration->full_name}'",
        ]);

        return back()->with('success', 'Check-out successful!');
    }

    public function scanQR(Request $request, Event $event)
    {
        $request->validate([
            'qr_data' => 'required|string',
        ]);

        try {
            $qrData = json_decode($request->qr_data, true);
            
            if (!isset($qrData['registration_id']) || $qrData['event_id'] != $event->id) {
                return response()->json(['error' => 'Invalid QR code'], 400);
            }

            $registration = EventRegistration::find($qrData['registration_id']);
            
            if (!$registration || $registration->event_id != $event->id) {
                return response()->json(['error' => 'Registration not found'], 404);
            }

            if ($registration->status !== 'confirmed') {
                return response()->json(['error' => 'Registration not confirmed'], 400);
            }

            // Check if already checked in today
            $existing = Attendance::where('event_id', $event->id)
                ->where('registration_id', $registration->id)
                ->where('attendance_date', today())
                ->first();

            if ($existing) {
                return response()->json([
                    'success' => true,
                    'message' => 'Already checked in',
                    'registration' => $registration,
                    'attendance' => $existing,
                ]);
            }

            // Auto check-in
            $checkInTime = now();
            $eventStartTime = $event->start_date;
            $isLate = $checkInTime->gt($eventStartTime);

            $attendance = Attendance::create([
                'event_id' => $event->id,
                'registration_id' => $registration->id,
                'attendance_date' => today(),
                'check_in_time' => $checkInTime,
                'status' => $isLate ? 'late' : 'present',
                'checked_in_by' => Auth::user()->name ?? 'QR Scanner',
            ]);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'created',
                'model_type' => 'Attendance',
                'model_id' => $attendance->id,
                'description' => "QR check-in: '{$registration->full_name}' for event '{$event->title}'",
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Check-in successful',
                'registration' => $registration,
                'attendance' => $attendance,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid QR code format'], 400);
        }
    }

    public function exportAttendance(Event $event)
    {
        $attendances = Attendance::where('event_id', $event->id)
            ->with('registration')
            ->orderBy('attendance_date')
            ->orderBy('check_in_time')
            ->get();

        $data = [];
        $data[] = ['Date', 'Name', 'Email', 'Phone', 'Institution', 'Check-In Time', 'Check-Out Time', 'Status'];

        foreach ($attendances as $attendance) {
            $data[] = [
                $attendance->attendance_date->format('Y-m-d'),
                $attendance->registration->full_name,
                $attendance->registration->email,
                $attendance->registration->phone,
                $attendance->registration->institution ?? '-',
                $attendance->check_in_time ? $attendance->check_in_time->format('H:i:s') : '-',
                $attendance->check_out_time ? $attendance->check_out_time->format('H:i:s') : '-',
                ucfirst($attendance->status),
            ];
        }

        $filename = "{$event->slug}-attendance-" . now()->format('Y-m-d') . ".csv";

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');
            foreach ($data as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
