@extends('admin.layout')

@section('title', 'Carousel Slides')
@section('subtitle', 'Manage homepage carousel slides')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Carousel Slides</h1>
        <p class="text-gray-600 mt-2">Manage all carousel slides displayed on the homepage</p>
    </div>
    <a href="{{ route('admin.slides.create') }}" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add New Slide
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-green-50 to-blue-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Preview</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Animation</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($slides as $slide)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $slide->order }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" class="w-24 h-16 object-cover rounded">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $slide->title }}</div>
                            @if($slide->subtitle)
                                <div class="text-sm text-gray-500">{{ Str::limit($slide->subtitle, 50) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">{{ $slide->animation_type }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($slide->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-medium">Active</span>
                            @else
                                <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-xs font-medium">Inactive</span>
                            @endif
                            @if($slide->is_urgent)
                                <span class="ml-2 px-2 py-1 bg-red-100 text-red-800 rounded text-xs font-medium">🔥 Urgent</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.slides.edit', $slide) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('admin.slides.delete', $slide) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this slide?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            No slides found. <a href="{{ route('admin.slides.create') }}" class="text-blue-600 hover:underline">Create your first slide</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

