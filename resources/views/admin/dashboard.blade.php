@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
    <p class="text-gray-600 mt-2">Welcome to the ICCR Tanzania Admin Panel</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Total Pages</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['pages'] }}</p>
                <p class="text-sm text-green-600 mt-1">{{ $stats['active_pages'] }} active</p>
            </div>
            <div class="bg-blue-100 rounded-full p-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Total Media</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['media'] }}</p>
                <p class="text-sm text-gray-600 mt-1">{{ $stats['images'] }} images, {{ $stats['videos'] }} videos</p>
            </div>
            <div class="bg-green-100 rounded-full p-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Newsletter Subscriptions</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['newsletter_subscriptions'] }}</p>
                <p class="text-sm text-gray-600 mt-1">Total subscribers</p>
            </div>
            <div class="bg-purple-100 rounded-full p-4">
                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Pages -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900">Recent Pages</h2>
                <a href="{{ route('admin.pages') }}" class="text-blue-600 hover:text-blue-800 text-sm">View All</a>
            </div>
        </div>
        <div class="p-6">
            @if($recent_pages->count() > 0)
                <div class="space-y-4">
                    @foreach($recent_pages as $page)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $page->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $page->slug }}</p>
                            </div>
                            <span class="px-2 py-1 text-xs rounded {{ $page->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $page->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-4">No pages yet</p>
            @endif
        </div>
    </div>

    <!-- Recent Media -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900">Recent Media</h2>
                <a href="{{ route('admin.media') }}" class="text-blue-600 hover:text-blue-800 text-sm">View All</a>
            </div>
        </div>
        <div class="p-6">
            @if($recent_media->count() > 0)
                <div class="space-y-4">
                    @foreach($recent_media as $media)
                        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                            @if($media->type === 'image')
                                <img src="{{ $media->url }}" alt="{{ $media->title }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 bg-red-100 rounded flex items-center justify-center">
                                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">{{ $media->title ?? 'Untitled' }}</h3>
                                <p class="text-sm text-gray-600">{{ ucfirst($media->type) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-4">No media yet</p>
            @endif
        </div>
    </div>
</div>
@endsection

