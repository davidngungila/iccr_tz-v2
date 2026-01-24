@extends('admin.layout')

@section('title', 'Events Management')
@section('subtitle', 'Manage website events')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Events</h1>
        <p class="text-gray-600 mt-2">Manage all website events</p>
    </div>
    <a href="{{ route('admin.events.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        New Event
    </a>
</div>

<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($event->banner_image)
                                    <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-16 h-16 rounded-lg object-cover mr-4">
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $event->title }}</div>
                                    <div class="text-sm text-gray-500">{{ \Illuminate\Support\Str::limit($event->description, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $event->start_date->format('M d, Y') }}
                            @if($event->end_date)
                                <br><span class="text-xs">to {{ $event->end_date->format('M d, Y') }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $event->location ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full {{ $event->status === 'upcoming' ? 'bg-green-100 text-green-800' : ($event->status === 'past' ? 'bg-gray-100 text-gray-800' : 'bg-red-100 text-red-800') }}">
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
                                        <span class="ml-2 text-xs font-semibold text-green-600">⭐ Featured</span>
                                    @endif
                                </label>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.events.edit', $event) }}" class="text-blue-600 hover:text-blue-900 mr-4">Edit</a>
                            <form action="{{ route('admin.events.delete', $event) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-600">No events found. Create your first event!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $events->links() }}
    </div>
</div>
@endsection

