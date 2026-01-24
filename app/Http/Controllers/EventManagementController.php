<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventProgram;
use App\Models\Volunteer;
use App\Models\PrayerRequest;
use App\Models\Testimony;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EventManagementController extends Controller
{
    // ==================== EVENT PROGRAMS ====================
    
    public function programs(Event $event)
    {
        $programs = EventProgram::where('event_id', $event->id)
            ->orderBy('program_date')
            ->orderBy('order')
            ->get()
            ->groupBy('program_date');
        
        return view('admin.events.programs', compact('event', 'programs'));
    }

    public function storeProgram(Request $request, Event $event)
    {
        $validated = $request->validate([
            'program_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'session_type' => 'nullable|string|max:100',
            'speaker_name' => 'nullable|string|max:255',
            'speaker_bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_break' => 'nullable|boolean',
        ]);

        $validated['event_id'] = $event->id;
        $program = EventProgram::create($validated);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'EventProgram',
            'model_id' => $program->id,
            'description' => "Created program '{$program->title}' for event '{$event->title}'",
        ]);

        return back()->with('success', 'Program item added successfully!');
    }

    public function updateProgram(Request $request, EventProgram $program)
    {
        $validated = $request->validate([
            'program_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'session_type' => 'nullable|string|max:100',
            'speaker_name' => 'nullable|string|max:255',
            'speaker_bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_break' => 'nullable|boolean',
        ]);

        $program->update($validated);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'EventProgram',
            'model_id' => $program->id,
            'description' => "Updated program '{$program->title}'",
        ]);

        return back()->with('success', 'Program item updated successfully!');
    }

    public function deleteProgram(EventProgram $program)
    {
        $title = $program->title;
        $program->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'EventProgram',
            'model_id' => $program->id,
            'description' => "Deleted program '{$title}'",
        ]);

        return back()->with('success', 'Program item deleted successfully!');
    }

    // ==================== VOLUNTEERS ====================
    
    public function volunteers(Event $event)
    {
        $volunteers = Volunteer::where('event_id', $event->id)
            ->orderBy('team')
            ->orderBy('full_name')
            ->get()
            ->groupBy('team');
        
        $teams = Volunteer::where('event_id', $event->id)
            ->distinct()
            ->pluck('team')
            ->filter()
            ->values();
        
        return view('admin.events.volunteers', compact('event', 'volunteers', 'teams'));
    }

    public function storeVolunteer(Request $request, Event $event)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'institution' => 'nullable|string|max:255',
            'team' => 'nullable|string|max:100',
            'duties' => 'nullable|string',
            'duty_date' => 'nullable|date',
            'duty_start_time' => 'nullable',
            'duty_end_time' => 'nullable',
            'status' => 'nullable|in:registered,confirmed,active,completed',
            'notes' => 'nullable|string',
        ]);

        $validated['event_id'] = $event->id;
        $volunteer = Volunteer::create($validated);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'Volunteer',
            'model_id' => $volunteer->id,
            'description' => "Registered volunteer '{$volunteer->full_name}' for event '{$event->title}'",
        ]);

        return back()->with('success', 'Volunteer registered successfully!');
    }

    public function updateVolunteer(Request $request, Volunteer $volunteer)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'institution' => 'nullable|string|max:255',
            'team' => 'nullable|string|max:100',
            'duties' => 'nullable|string',
            'duty_date' => 'nullable|date',
            'duty_start_time' => 'nullable',
            'duty_end_time' => 'nullable',
            'status' => 'nullable|in:registered,confirmed,active,completed',
            'notes' => 'nullable|string',
        ]);

        $volunteer->update($validated);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'Volunteer',
            'model_id' => $volunteer->id,
            'description' => "Updated volunteer '{$volunteer->full_name}'",
        ]);

        return back()->with('success', 'Volunteer updated successfully!');
    }

    public function deleteVolunteer(Volunteer $volunteer)
    {
        $name = $volunteer->full_name;
        $volunteer->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'Volunteer',
            'model_id' => $volunteer->id,
            'description' => "Deleted volunteer '{$name}'",
        ]);

        return back()->with('success', 'Volunteer deleted successfully!');
    }

    // ==================== PRAYER REQUESTS ====================
    
    public function prayerRequests(Request $request, Event $event = null)
    {
        $query = PrayerRequest::query();
        
        if ($event) {
            $query->where('event_id', $event->id);
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $prayerRequests = $query->orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.events.prayer-requests', compact('event', 'prayerRequests'));
    }

    public function updatePrayerRequestStatus(Request $request, PrayerRequest $prayerRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,prayed_for,answered',
        ]);

        $prayerRequest->update($validated);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'PrayerRequest',
            'model_id' => $prayerRequest->id,
            'description' => "Updated prayer request status to {$validated['status']}",
        ]);

        return back()->with('success', 'Prayer request status updated!');
    }

    // ==================== TESTIMONIES ====================
    
    public function testimonies(Request $request, Event $event = null)
    {
        $query = Testimony::query();
        
        if ($event) {
            $query->where('event_id', $event->id);
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $testimonies = $query->orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.events.testimonies', compact('event', 'testimonies'));
    }

    public function storeTestimony(Request $request, Event $event = null)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'testimony' => 'required|string',
            'status' => 'nullable|in:pending,approved,rejected',
            'is_featured' => 'nullable|boolean',
            'is_anonymous' => 'nullable|boolean',
            'photo' => 'nullable|string',
        ]);

        if ($event) {
            $validated['event_id'] = $event->id;
        }
        
        $testimony = Testimony::create($validated);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'Testimony',
            'model_id' => $testimony->id,
            'description' => "Created testimony from '{$testimony->name}'",
        ]);

        return back()->with('success', 'Testimony submitted successfully!');
    }

    public function updateTestimony(Request $request, Testimony $testimony)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'testimony' => 'required|string',
            'status' => 'nullable|in:pending,approved,rejected',
            'is_featured' => 'nullable|boolean',
            'is_anonymous' => 'nullable|boolean',
            'photo' => 'nullable|string',
        ]);

        $testimony->update($validated);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'Testimony',
            'model_id' => $testimony->id,
            'description' => "Updated testimony from '{$testimony->name}'",
        ]);

        return back()->with('success', 'Testimony updated successfully!');
    }

    public function deleteTestimony(Testimony $testimony)
    {
        $name = $testimony->name;
        $testimony->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'Testimony',
            'model_id' => $testimony->id,
            'description' => "Deleted testimony from '{$name}'",
        ]);

        return back()->with('success', 'Testimony deleted successfully!');
    }
}
