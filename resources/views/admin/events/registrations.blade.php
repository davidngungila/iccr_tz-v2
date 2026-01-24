@extends('admin.layout')

@section('title', 'Event Registrations')
@section('subtitle', $event->title)

@section('content')
<div class="mb-8 flex items-center justify-between flex-wrap gap-4">
    <div>
        <a href="{{ route('admin.events') }}" class="text-blue-600 hover:text-blue-800 mb-2 inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Events
        </a>
        <h1 class="text-3xl font-bold text-gray-900 mt-2">{{ $event->title }}</h1>
        <p class="text-gray-600 mt-1">Manage all registrations for this event</p>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.events.export.excel', $event) }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-semibold flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Export Excel
        </a>
        <a href="{{ route('admin.events.export.pdf', $event) }}" target="_blank" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition font-semibold flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
            Export PDF
        </a>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-5 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-xs text-gray-600 mb-1">Total</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
            </div>
            <div class="bg-blue-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-xs text-gray-600 mb-1">Pending</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['pending'] }}</p>
            </div>
            <div class="bg-yellow-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-xs text-gray-600 mb-1">Confirmed</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['confirmed'] }}</p>
            </div>
            <div class="bg-green-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-red-500">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-xs text-gray-600 mb-1">Cancelled</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['cancelled'] }}</p>
            </div>
            <div class="bg-red-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-xs text-gray-600 mb-1">SMS Sent</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['sms_sent'] }}</p>
            </div>
            <div class="bg-purple-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Event Info -->
<div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl shadow-lg p-6 mb-8 border-2 border-green-200">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <p class="text-sm text-gray-600 mb-1">Event Date</p>
            <p class="text-lg font-bold text-gray-900">{{ $event->start_date->format('F j, Y') }}</p>
            @if($event->end_date && $event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d'))
                <p class="text-sm text-gray-600">to {{ $event->end_date->format('F j, Y') }}</p>
            @endif
        </div>
        <div>
            <p class="text-sm text-gray-600 mb-1">Location</p>
            <p class="text-lg font-bold text-gray-900">{{ $event->location ?? 'TBA' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600 mb-1">Status</p>
            <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold {{ $event->status === 'upcoming' ? 'bg-green-100 text-green-800' : ($event->status === 'past' ? 'bg-gray-100 text-gray-800' : 'bg-red-100 text-red-800') }}">
                {{ ucfirst($event->status) }}
            </span>
        </div>
    </div>
</div>

<!-- Registrations Table -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
        <h2 class="text-xl font-bold text-gray-900">All Registrations</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registrant</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Academic Info</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Requirements</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">SMS</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($registrations as $registration)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-gray-900">{{ $registration->full_name }}</div>
                            <div class="text-xs text-gray-500 mt-1">Registered: {{ $registration->created_at->format('M d, Y H:i') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $registration->email }}</div>
                            <div class="text-sm text-gray-600 font-mono">{{ $registration->phone }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                @if($registration->institution)
                                    <div><span class="font-semibold">Institution:</span> {{ $registration->institution }}</div>
                                @endif
                                @if($registration->campus)
                                    <div><span class="font-semibold">Campus:</span> {{ $registration->campus }}</div>
                                @endif
                                @if($registration->course)
                                    <div><span class="font-semibold">Course:</span> {{ $registration->course }}</div>
                                @endif
                                @if($registration->year_of_study)
                                    <div><span class="font-semibold">Year:</span> {{ $registration->year_of_study }}</div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs text-gray-600 space-y-1">
                                @if($registration->accommodation_needed === 'yes')
                                    <span class="inline-block px-2 py-1 rounded bg-blue-100 text-blue-800">Accommodation</span>
                                @endif
                                @if($registration->transportation_needed === 'yes')
                                    <span class="inline-block px-2 py-1 rounded bg-green-100 text-green-800">Transport</span>
                                @endif
                                @if($registration->dietary_restrictions)
                                    <div class="mt-1"><span class="font-semibold">Dietary:</span> {{ \Illuminate\Support\Str::limit($registration->dietary_restrictions, 30) }}</div>
                                @endif
                                @if($registration->special_requirements)
                                    <div class="mt-1"><span class="font-semibold">Special:</span> {{ \Illuminate\Support\Str::limit($registration->special_requirements, 30) }}</div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <form action="{{ route('admin.events.registrations.update', $registration) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()" class="text-xs font-semibold rounded-full px-3 py-1 border-2 {{ $registration->status === 'confirmed' ? 'bg-green-100 text-green-800 border-green-300' : ($registration->status === 'pending' ? 'bg-yellow-100 text-yellow-800 border-yellow-300' : 'bg-red-100 text-red-800 border-red-300') }}">
                                    <option value="pending" {{ $registration->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $registration->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $registration->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if($registration->sms_sent)
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">✓ Sent</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Not Sent</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2 flex-wrap">
                                <a href="{{ route('admin.events.id-card', [$event, $registration]) }}" target="_blank" class="text-green-600 hover:text-green-900 font-semibold flex items-center gap-1" title="Generate ID Card">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                    </svg>
                                    ID Card
                                </a>
                                <a href="{{ route('admin.events.ticket', [$event, $registration]) }}" target="_blank" class="text-purple-600 hover:text-purple-900 font-semibold flex items-center gap-1" title="Generate Ticket">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4v-3a2 2 0 00-2-2H5z"/>
                                    </svg>
                                    Ticket
                                </a>
                                <a href="{{ route('admin.events.registration.pdf', [$event, $registration]) }}" target="_blank" class="text-red-600 hover:text-red-900 font-semibold flex items-center gap-1" title="Generate PDF">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                    PDF
                                </a>
                                <button onclick="showRegistrationDetails({{ $registration->id }})" class="text-blue-600 hover:text-blue-900">View</button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Registration Details Modal -->
                    <div id="modal-{{ $registration->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto">
                        <div class="flex items-center justify-center min-h-screen px-4">
                            <div class="fixed inset-0 bg-black opacity-50" onclick="closeModal({{ $registration->id }})"></div>
                            <div class="relative bg-white rounded-xl shadow-2xl max-w-3xl w-full p-8">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-2xl font-bold text-gray-900">Registration Details</h3>
                                    <button onclick="closeModal({{ $registration->id }})" class="text-gray-400 hover:text-gray-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="space-y-6">
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <p class="text-sm text-gray-600 mb-1">Full Name</p>
                                            <p class="text-lg font-semibold text-gray-900">{{ $registration->full_name }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600 mb-1">Email</p>
                                            <p class="text-lg font-semibold text-gray-900">{{ $registration->email }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600 mb-1">Phone</p>
                                            <p class="text-lg font-semibold text-gray-900 font-mono">{{ $registration->phone }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600 mb-1">Registered At</p>
                                            <p class="text-lg font-semibold text-gray-900">{{ $registration->created_at->format('F j, Y H:i') }}</p>
                                        </div>
                                    </div>
                                    @if($registration->institution || $registration->campus || $registration->course)
                                    <div class="border-t pt-6">
                                        <h4 class="font-semibold text-gray-900 mb-4">Academic Information</h4>
                                        <div class="grid grid-cols-2 gap-4">
                                            @if($registration->institution)
                                                <div>
                                                    <p class="text-sm text-gray-600 mb-1">Institution</p>
                                                    <p class="text-gray-900">{{ $registration->institution }}</p>
                                                </div>
                                            @endif
                                            @if($registration->campus)
                                                <div>
                                                    <p class="text-sm text-gray-600 mb-1">Campus</p>
                                                    <p class="text-gray-900">{{ $registration->campus }}</p>
                                                </div>
                                            @endif
                                            @if($registration->course)
                                                <div>
                                                    <p class="text-sm text-gray-600 mb-1">Course</p>
                                                    <p class="text-gray-900">{{ $registration->course }}</p>
                                                </div>
                                            @endif
                                            @if($registration->year_of_study)
                                                <div>
                                                    <p class="text-sm text-gray-600 mb-1">Year of Study</p>
                                                    <p class="text-gray-900">{{ $registration->year_of_study }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    @if($registration->accommodation_needed === 'yes' || $registration->transportation_needed === 'yes' || $registration->dietary_restrictions || $registration->special_requirements)
                                    <div class="border-t pt-6">
                                        <h4 class="font-semibold text-gray-900 mb-4">Special Requirements</h4>
                                        <div class="space-y-3">
                                            @if($registration->accommodation_needed === 'yes')
                                                <div class="flex items-center gap-2">
                                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">Accommodation Needed</span>
                                                </div>
                                            @endif
                                            @if($registration->transportation_needed === 'yes')
                                                <div class="flex items-center gap-2">
                                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">Transportation Needed</span>
                                                </div>
                                            @endif
                                            @if($registration->dietary_restrictions)
                                                <div>
                                                    <p class="text-sm text-gray-600 mb-1">Dietary Restrictions</p>
                                                    <p class="text-gray-900">{{ $registration->dietary_restrictions }}</p>
                                                </div>
                                            @endif
                                            @if($registration->special_requirements)
                                                <div>
                                                    <p class="text-sm text-gray-600 mb-1">Special Requirements</p>
                                                    <p class="text-gray-900">{{ $registration->special_requirements }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    @if($registration->emergency_contact_name || $registration->emergency_contact_phone)
                                    <div class="border-t pt-6">
                                        <h4 class="font-semibold text-gray-900 mb-4">Emergency Contact</h4>
                                        <div class="grid grid-cols-2 gap-4">
                                            @if($registration->emergency_contact_name)
                                                <div>
                                                    <p class="text-sm text-gray-600 mb-1">Contact Name</p>
                                                    <p class="text-gray-900">{{ $registration->emergency_contact_name }}</p>
                                                </div>
                                            @endif
                                            @if($registration->emergency_contact_phone)
                                                <div>
                                                    <p class="text-sm text-gray-600 mb-1">Contact Phone</p>
                                                    <p class="text-gray-900 font-mono">{{ $registration->emergency_contact_phone }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    @if($registration->admin_notes)
                                    <div class="border-t pt-6">
                                        <h4 class="font-semibold text-gray-900 mb-4">Admin Notes</h4>
                                        <p class="text-gray-900 bg-gray-50 p-4 rounded-lg">{{ $registration->admin_notes }}</p>
                                    </div>
                                    @endif
                                    
                                    <!-- Action Buttons -->
                                    <div class="border-t pt-6 flex items-center justify-center gap-4">
                                        <a href="{{ route('admin.events.ticket', [$event, $registration]) }}" target="_blank" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-purple-800 transition shadow-lg flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4v-3a2 2 0 00-2-2H5z"/>
                                            </svg>
                                            Generate Ticket
                                        </a>
                                        <a href="{{ route('admin.events.registration.pdf', [$event, $registration]) }}" target="_blank" class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition shadow-lg flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                            </svg>
                                            Download PDF
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-600">
                            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-lg font-semibold">No registrations yet</p>
                            <p class="text-sm mt-2">Registrations will appear here once people start registering for this event.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
        {{ $registrations->links() }}
    </div>
</div>

@push('scripts')
<script>
function showRegistrationDetails(id) {
    document.getElementById('modal-' + id).classList.remove('hidden');
}

function closeModal(id) {
    document.getElementById('modal-' + id).classList.add('hidden');
}

function editRegistration(id) {
    // TODO: Implement edit functionality
    alert('Edit functionality coming soon!');
}
</script>
@endpush
@endsection

