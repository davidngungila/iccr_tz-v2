@extends('admin.layout')

@section('title', 'Event Programs')
@section('subtitle', 'Manage Event Schedule & Program')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ $event->title }}</h1>
            <p class="text-gray-600 mt-2">Manage event program and schedule</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.events.registrations', $event) }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-700 font-semibold">
                Back to Registrations
            </a>
            <button onclick="document.getElementById('addProgramModal').classList.remove('hidden')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg text-white font-semibold">
                Add Program Item
            </button>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<!-- Programs by Date -->
<div class="space-y-6">
    @forelse($programs as $date => $dayPrograms)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-purple-50 to-purple-100 px-6 py-4 border-b border-purple-200">
                <h3 class="text-lg font-bold text-gray-900">
                    {{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}
                </h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($dayPrograms->sortBy('order') as $program)
                        <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition border border-gray-200">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                                        {{ $program->start_time->format('H:i') }} - {{ $program->end_time ? $program->end_time->format('H:i') : 'TBD' }}
                                    </span>
                                    @if($program->is_break)
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Break</span>
                                    @endif
                                    @if($program->session_type)
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">{{ $program->session_type }}</span>
                                    @endif
                                </div>
                                <h4 class="font-bold text-gray-900 mb-1">{{ $program->title }}</h4>
                                @if($program->description)
                                    <p class="text-sm text-gray-600 mb-2">{{ $program->description }}</p>
                                @endif
                                @if($program->speaker_name)
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold">Speaker:</span> {{ $program->speaker_name }}
                                    </p>
                                @endif
                                @if($program->location)
                                    <p class="text-sm text-gray-700 mt-1">
                                        <span class="font-semibold">Location:</span> {{ $program->location }}
                                    </p>
                                @endif
                            </div>
                            <div class="flex gap-2">
                                <button onclick="editProgram({{ $program->id }})" class="p-2 bg-blue-100 hover:bg-blue-200 rounded-lg text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <form action="{{ route('admin.events.programs.delete', $program) }}" method="POST" onsubmit="return confirm('Delete this program item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-100 hover:bg-red-200 rounded-lg text-red-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
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
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No Program Items</h3>
            <p class="text-gray-600 mb-4">Start by adding program items to this event</p>
            <button onclick="document.getElementById('addProgramModal').classList.remove('hidden')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg text-white font-semibold">
                Add Program Item
            </button>
        </div>
    @endforelse
</div>

<!-- Add Program Modal -->
<div id="addProgramModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-gradient-to-r from-purple-50 to-purple-100 px-6 py-4 border-b border-purple-200 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900">Add Program Item</h3>
            <button onclick="document.getElementById('addProgramModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('admin.events.programs.store', $event) }}" method="POST" class="p-6">
            @csrf
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Program Date *</label>
                        <input type="date" name="program_date" value="{{ old('program_date', $event->start_date->format('Y-m-d')) }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Start Time *</label>
                            <input type="time" name="start_time" value="{{ old('start_time') }}" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">End Time</label>
                            <input type="time" name="end_time" value="{{ old('end_time') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">{{ old('description') }}</textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Session Type</label>
                        <select name="session_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">Select type</option>
                            <option value="worship">Worship</option>
                            <option value="teaching">Teaching</option>
                            <option value="workshop">Workshop</option>
                            <option value="prayer">Prayer</option>
                            <option value="testimony">Testimony</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                        <input type="text" name="location" value="{{ old('location') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Speaker Name</label>
                    <input type="text" name="speaker_name" value="{{ old('speaker_name') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Speaker Bio</label>
                    <textarea name="speaker_bio" rows="2"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">{{ old('speaker_bio') }}</textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="flex items-center pt-8">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="is_break" value="1" {{ old('is_break') ? 'checked' : '' }}
                                   class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                            <span class="text-sm text-gray-700">This is a break</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button type="submit" class="flex-1 px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg text-white font-semibold">
                    Add Program Item
                </button>
                <button type="button" onclick="document.getElementById('addProgramModal').classList.add('hidden')" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-700 font-semibold">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function editProgram(id) {
    // TODO: Implement edit functionality
    alert('Edit functionality coming soon');
}
</script>
@endsection
