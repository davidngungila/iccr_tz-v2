@extends('admin.layout')

@section('title', 'Event Volunteers')
@section('subtitle', 'Manage Volunteers & Service Teams')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ $event->title }}</h1>
            <p class="text-gray-600 mt-2">Manage volunteers and service teams</p>
        </div>
        <button onclick="document.getElementById('addVolunteerModal').classList.remove('hidden')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg text-white font-semibold">
            Add Volunteer
        </button>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<!-- Volunteers by Team -->
<div class="space-y-6">
    @forelse($teams as $team)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-purple-50 to-purple-100 px-6 py-4 border-b border-purple-200">
                <h3 class="text-lg font-bold text-gray-900">{{ $team ?? 'Unassigned' }}</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($volunteers->get($team, []) as $volunteer)
                        <div class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition border border-gray-200">
                            <div class="flex items-start justify-between mb-2">
                                <h4 class="font-bold text-gray-900">{{ $volunteer->full_name }}</h4>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ match($volunteer->status) {
                                    'active' => 'bg-green-100 text-green-800',
                                    'confirmed' => 'bg-blue-100 text-blue-800',
                                    'completed' => 'bg-gray-100 text-gray-800',
                                    default => 'bg-yellow-100 text-yellow-800'
                                } }}">
                                    {{ ucfirst($volunteer->status) }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">{{ $volunteer->email }}</p>
                            <p class="text-sm text-gray-600 mb-2">{{ $volunteer->phone }}</p>
                            @if($volunteer->institution)
                                <p class="text-sm text-gray-600 mb-2">{{ $volunteer->institution }}</p>
                            @endif
                            @if($volunteer->duties)
                                <p class="text-sm text-gray-700 mb-2"><strong>Duties:</strong> {{ $volunteer->duties }}</p>
                            @endif
                            @if($volunteer->duty_date)
                                <p class="text-xs text-gray-500">
                                    {{ $volunteer->duty_date->format('M d, Y') }}
                                    @if($volunteer->duty_start_time)
                                        {{ $volunteer->duty_start_time->format('H:i') }} - {{ $volunteer->duty_end_time?->format('H:i') ?? 'TBD' }}
                                    @endif
                                </p>
                            @endif
                            <div class="flex gap-2 mt-3">
                                <button onclick="editVolunteer({{ $volunteer->id }})" class="flex-1 px-3 py-1 bg-blue-100 hover:bg-blue-200 rounded text-blue-600 text-sm font-semibold">
                                    Edit
                                </button>
                                <form action="{{ route('admin.events.volunteers.delete', $volunteer) }}" method="POST" onsubmit="return confirm('Delete this volunteer?')" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full px-3 py-1 bg-red-100 hover:bg-red-200 rounded text-red-600 text-sm font-semibold">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @empty
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No Volunteers</h3>
            <p class="text-gray-600 mb-4">Start by adding volunteers to this event</p>
            <button onclick="document.getElementById('addVolunteerModal').classList.remove('hidden')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg text-white font-semibold">
                Add Volunteer
            </button>
        </div>
    @endforelse
</div>

<!-- Add Volunteer Modal -->
<div id="addVolunteerModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-gradient-to-r from-purple-50 to-purple-100 px-6 py-4 border-b border-purple-200 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900">Add Volunteer</h3>
            <button onclick="document.getElementById('addVolunteerModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('admin.events.volunteers.store', $event) }}" method="POST" class="p-6">
            @csrf
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone *</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Institution</label>
                        <input type="text" name="institution" value="{{ old('institution') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Team</label>
                        <select name="team" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">Select team</option>
                            <option value="ushers">Ushers</option>
                            <option value="choir">Choir</option>
                            <option value="media">Media</option>
                            <option value="security">Security</option>
                            <option value="prayer">Prayer Team</option>
                            <option value="hospitality">Hospitality</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Duties</label>
                    <textarea name="duties" rows="2"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">{{ old('duties') }}</textarea>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Duty Date</label>
                        <input type="date" name="duty_date" value="{{ old('duty_date') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Start Time</label>
                        <input type="time" name="duty_start_time" value="{{ old('duty_start_time') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">End Time</label>
                        <input type="time" name="duty_end_time" value="{{ old('duty_end_time') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="registered">Registered</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                    <textarea name="notes" rows="2"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">{{ old('notes') }}</textarea>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button type="submit" class="flex-1 px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg text-white font-semibold">
                    Add Volunteer
                </button>
                <button type="button" onclick="document.getElementById('addVolunteerModal').classList.add('hidden')" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-700 font-semibold">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function editVolunteer(id) {
    // TODO: Implement edit functionality
    alert('Edit functionality coming soon');
}
</script>
@endsection
