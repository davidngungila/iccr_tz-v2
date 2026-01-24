@extends('admin.layout')

@section('title', 'Events Management')
@section('subtitle', 'Manage website events and registrations')

@section('content')
<div class="mb-8 flex items-center justify-between flex-wrap gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Events Management</h1>
        <p class="text-gray-600 mt-2">Manage all events and their registrations</p>
    </div>
    <a href="{{ route('admin.events.create') }}" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold flex items-center gap-2 shadow-lg hover:shadow-xl">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        New Event
    </a>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Total Events</p>
                <p class="text-3xl font-bold text-gray-900">{{ $events->total() }}</p>
            </div>
            <div class="bg-blue-100 rounded-lg p-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Upcoming</p>
                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Event::where('status', 'upcoming')->count() }}</p>
            </div>
            <div class="bg-green-100 rounded-lg p-3">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Total Registrations</p>
                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\EventRegistration::count() }}</p>
            </div>
            <div class="bg-orange-100 rounded-lg p-3">
                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Pending</p>
                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\EventRegistration::where('status', 'pending')->count() }}</p>
            </div>
            <div class="bg-purple-100 rounded-lg p-3">
                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Events Table -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl font-bold text-gray-900">All Events</h2>
            <div class="flex items-center gap-3">
                <form method="GET" action="{{ route('admin.events') }}" class="flex items-center gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search events..." class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    <select name="status" class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value="">All Status</option>
                        <option value="upcoming" {{ request('status') === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="past" {{ request('status') === 'past' ? 'selected' : '' }}>Past</option>
                        <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold">Filter</button>
                    @if(request('search') || request('status'))
                        <a href="{{ route('admin.events') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Clear</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Location</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Registrations</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($events as $event)
                    @php
                        $registrations = \App\Models\EventRegistration::where('event_id', $event->id)->get();
                        $registrationCount = $registrations->count();
                        $pendingCount = $registrations->where('status', 'pending')->count();
                        $confirmedCount = $registrations->where('status', 'confirmed')->count();
                    @endphp
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($event->banner_image)
                                    <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-16 h-16 rounded-lg object-cover mr-4 shadow-md">
                                @else
                                    <div class="w-16 h-16 rounded-lg bg-gradient-to-br from-green-400 to-blue-500 mr-4 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <div class="text-sm font-semibold text-gray-900">{{ $event->title }}</div>
                                    <div class="text-sm text-gray-500">{{ \Illuminate\Support\Str::limit($event->description, 60) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 font-medium">
                                {{ $event->start_date->format('M d, Y') }}
                                @if($event->end_date && $event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d'))
                                    <br><span class="text-xs text-gray-500">to {{ $event->end_date->format('M d, Y') }}</span>
                                @endif
                            </div>
                            @if($event->location)
                                <div class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                    {{ $event->location }}
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="flex flex-col items-center gap-1">
                                <span class="text-lg font-bold text-gray-900">{{ $registrationCount }}</span>
                                <div class="flex items-center gap-2 text-xs">
                                    <span class="px-2 py-1 rounded-full bg-green-100 text-green-800">{{ $confirmedCount }} confirmed</span>
                                    @if($pendingCount > 0)
                                        <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-800">{{ $pendingCount }} pending</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $event->status === 'upcoming' ? 'bg-green-100 text-green-800' : ($event->status === 'past' ? 'bg-gray-100 text-gray-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <form action="{{ route('admin.events.update', $event) }}" method="POST" class="inline" id="featured-form-{{ $event->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $event->title }}">
                                <input type="hidden" name="slug" value="{{ $event->slug }}">
                                <input type="hidden" name="description" value="{{ $event->description }}">
                                <input type="hidden" name="content" value="{{ $event->content }}">
                                <input type="hidden" name="banner_image" value="{{ $event->banner_image }}">
                                <input type="hidden" name="location" value="{{ $event->location }}">
                                <input type="hidden" name="start_date" value="{{ $event->start_date->format('Y-m-d\TH:i') }}">
                                <input type="hidden" name="end_date" value="{{ $event->end_date ? $event->end_date->format('Y-m-d\TH:i') : '' }}">
                                <input type="hidden" name="status" value="{{ $event->status }}">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_featured" value="1" {{ $event->is_featured ? 'checked' : '' }}
                                           onchange="document.getElementById('featured-form-{{ $event->id }}').submit();"
                                           class="sr-only peer">
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                                    @if($event->is_featured)
                                        <span class="ml-2 text-xs font-semibold text-green-600">⭐</span>
                                    @endif
                                </label>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.events.registrations', $event) }}" class="text-orange-600 hover:text-orange-900 font-semibold flex items-center gap-1" title="View Registrations">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span>{{ $registrationCount }}</span>
                                </a>
                                <a href="{{ route('admin.events.edit', $event) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('admin.events.delete', $event) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this event? This will also delete all registrations.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-600">
                            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-lg font-semibold">No events found</p>
                            <p class="text-sm mt-2">Create your first event to get started!</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
        {{ $events->appends(request()->query())->links() }}
    </div>
</div>
@endsection
