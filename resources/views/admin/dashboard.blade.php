@extends('admin.layout')

@section('title', 'Dashboard')
@section('subtitle', 'Website Overview & Quick Actions')

@section('content')
<!-- Welcome Banner with Time -->
<div class="mb-8">
    <div class="bg-gradient-to-r from-green-600 via-blue-600 to-green-700 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
        <div class="relative z-10 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-green-100 text-lg mb-1">Here's what's happening with your website today.</p>
                <p class="text-green-200 text-sm">{{ now()->format('l, F j, Y') }} • {{ now()->format('g:i A') }}</p>
            </div>
            <div class="text-right">
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition text-white font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    View Site
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Primary Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Pages Card -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-blue-100 rounded-xl p-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <a href="{{ route('admin.pages') }}" class="text-blue-600 hover:text-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600 uppercase tracking-wider mb-1">Total Pages</p>
            <p class="text-4xl font-bold text-gray-900 mb-3">{{ $stats['pages'] }}</p>
            <div class="flex items-center gap-2 flex-wrap">
                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ $stats['published_pages'] }} published</span>
                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">{{ $stats['draft_pages'] }} draft</span>
            </div>
        </div>
    </div>

    <!-- Blog Posts Card -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-green-100 rounded-xl p-3">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
            <a href="{{ route('admin.blog.index') }}" class="text-green-600 hover:text-green-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600 uppercase tracking-wider mb-1">Blog Posts</p>
            <p class="text-4xl font-bold text-gray-900 mb-3">{{ $stats['blog_posts'] }}</p>
            <p class="text-sm text-gray-600">{{ $stats['published_posts'] }} published</p>
        </div>
    </div>

    <!-- Events Card -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-purple-100 rounded-xl p-3">
                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <a href="{{ route('admin.events') }}" class="text-purple-600 hover:text-purple-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600 uppercase tracking-wider mb-1">Events</p>
            <p class="text-4xl font-bold text-gray-900 mb-3">{{ $stats['events'] }}</p>
            <div class="flex items-center gap-2 flex-wrap">
                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ $stats['upcoming_events'] }} upcoming</span>
                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">{{ $stats['featured_events'] }} featured</span>
            </div>
        </div>
    </div>

    <!-- Event Registrations Card -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-orange-100 rounded-xl p-3">
                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <a href="{{ route('admin.events') }}" class="text-orange-600 hover:text-orange-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600 uppercase tracking-wider mb-1">Registrations</p>
            <p class="text-4xl font-bold text-gray-900 mb-3">{{ $stats['event_registrations'] }}</p>
            <div class="flex items-center gap-2 flex-wrap">
                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $stats['pending_registrations'] }} pending</span>
                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ $stats['sms_sent'] }} SMS sent</span>
            </div>
        </div>
    </div>
</div>

<!-- Secondary Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <!-- Media -->
    <div class="bg-white rounded-xl shadow p-6 border-t-4 border-indigo-500">
        <div class="flex items-center justify-between mb-3">
            <div class="bg-indigo-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-1">Media Files</p>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['media'] }}</p>
    </div>

    <!-- Newsletter -->
    <div class="bg-white rounded-xl shadow p-6 border-t-4 border-blue-500">
        <div class="flex items-center justify-between mb-3">
            <div class="bg-blue-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-1">Newsletter</p>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['newsletter_subscriptions'] }}</p>
        <p class="text-xs text-gray-500 mt-1">Subscribers</p>
    </div>

    <!-- Messages -->
    <div class="bg-white rounded-xl shadow p-6 border-t-4 border-green-500">
        <div class="flex items-center justify-between mb-3">
            <div class="bg-green-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-1">Messages</p>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['contact_messages'] }}</p>
        <p class="text-xs text-gray-500 mt-1">New / {{ $stats['total_messages'] }} total</p>
    </div>

    <!-- Team -->
    <div class="bg-white rounded-xl shadow p-6 border-t-4 border-purple-500">
        <div class="flex items-center justify-between mb-3">
            <div class="bg-purple-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-1">Team</p>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['team_members'] }}</p>
        <p class="text-xs text-gray-500 mt-1">Active / {{ $stats['total_team'] }} total</p>
    </div>

    <!-- Carousel Slides -->
    <div class="bg-white rounded-xl shadow p-6 border-t-4 border-pink-500">
        <div class="flex items-center justify-between mb-3">
            <div class="bg-pink-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-1">Carousel</p>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['carousel_slides'] }}</p>
        <p class="text-xs text-gray-500 mt-1">Active slides</p>
    </div>
</div>

<!-- Quick Actions & System Status -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Quick Actions -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            Quick Actions
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.slides.create') }}" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg hover:from-blue-100 hover:to-blue-200 transition text-center border-2 border-blue-200 hover:border-blue-300">
                <svg class="w-8 h-8 text-blue-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                <span class="text-sm font-semibold text-gray-900">New Slide</span>
            </a>
            <a href="{{ route('admin.blog.create') }}" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg hover:from-green-100 hover:to-green-200 transition text-center border-2 border-green-200 hover:border-green-300">
                <svg class="w-8 h-8 text-green-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="text-sm font-semibold text-gray-900">New Post</span>
            </a>
            <a href="{{ route('admin.events.create') }}" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg hover:from-purple-100 hover:to-purple-200 transition text-center border-2 border-purple-200 hover:border-purple-300">
                <svg class="w-8 h-8 text-purple-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="text-sm font-semibold text-gray-900">New Event</span>
            </a>
            <a href="{{ route('admin.media.create') }}" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-orange-50 to-orange-100 rounded-lg hover:from-orange-100 hover:to-orange-200 transition text-center border-2 border-orange-200 hover:border-orange-300">
                <svg class="w-8 h-8 text-orange-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="text-sm font-semibold text-gray-900">Upload Media</span>
            </a>
        </div>
    </div>

    <!-- System Status -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            System Status
        </h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="text-sm text-gray-700">Activity Today</span>
                <span class="text-sm font-bold text-gray-900">{{ $stats['activity_logs_today'] }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="text-sm text-gray-700">Activity This Week</span>
                <span class="text-sm font-bold text-gray-900">{{ $stats['activity_logs_week'] }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="text-sm text-gray-700">SMS Providers</span>
                <span class="text-sm font-bold text-green-600">{{ $stats['notification_providers'] }} active</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="text-sm text-gray-700">Server Time</span>
                <span class="text-sm font-bold text-gray-900">{{ now()->format('H:i') }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Recent Event Registrations -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-orange-50 to-orange-100 px-6 py-4 border-b border-orange-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Recent Event Registrations
                </h3>
                <a href="{{ route('admin.events') }}" class="text-sm text-orange-600 hover:text-orange-800 font-semibold">View All →</a>
            </div>
        </div>
        <div class="p-6">
            @if($recent_registrations->count() > 0)
                <div class="space-y-3">
                    @foreach($recent_registrations as $registration)
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg hover:from-gray-100 hover:to-gray-200 transition border border-gray-200">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 truncate">{{ $registration->full_name }}</h4>
                                <p class="text-sm text-gray-600 truncate">{{ $registration->event->title ?? 'Event Deleted' }}</p>
                                <div class="flex items-center gap-3 mt-2">
                                    <span class="text-xs text-gray-500">{{ $registration->email }}</span>
                                    <span class="text-xs text-gray-500">•</span>
                                    <span class="text-xs text-gray-500">{{ $registration->phone }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $registration->status === 'confirmed' ? 'bg-green-100 text-green-800' : ($registration->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($registration->status) }}
                                </span>
                                @if($registration->sms_sent)
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">SMS Sent</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No registrations yet</p>
            @endif
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-purple-50 to-purple-100 px-6 py-4 border-b border-purple-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Upcoming Events
                </h3>
                <a href="{{ route('admin.events.index') }}" class="text-sm text-purple-600 hover:text-purple-800 font-semibold">View All →</a>
            </div>
        </div>
        <div class="p-6">
            @if($upcoming_events->count() > 0)
                <div class="space-y-3">
                    @foreach($upcoming_events as $event)
                        <div class="p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg hover:from-gray-100 hover:to-gray-200 transition border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2 truncate">{{ $event->title }}</h4>
                            <p class="text-sm text-gray-600 mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $event->start_date->format('M d, Y') }}
                            </p>
                            @if($event->location)
                                <p class="text-xs text-gray-500 truncate">{{ $event->location }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No upcoming events</p>
            @endif
        </div>
    </div>
</div>

<!-- Recent Activity & Content -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Recent Activity
                </h3>
                <a href="{{ route('admin.security.logs') }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">View All →</a>
            </div>
        </div>
        <div class="p-6">
            @if($recent_activity->count() > 0)
                <div class="space-y-3">
                    @foreach($recent_activity as $activity)
                        <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-{{ match($activity->action) {
                                'created' => 'green',
                                'updated' => 'blue',
                                'deleted' => 'red',
                                'login' => 'purple',
                                'sms_sent' => 'orange',
                                default => 'gray'
                            } }}-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-{{ match($activity->action) {
                                    'created' => 'green',
                                    'updated' => 'blue',
                                    'deleted' => 'red',
                                    'login' => 'purple',
                                    'sms_sent' => 'orange',
                                    default => 'gray'
                                } }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @if($activity->action === 'created')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    @elseif($activity->action === 'updated')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    @elseif($activity->action === 'deleted')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    @endif
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $activity->description }}</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ $activity->user->name ?? 'System' }} • {{ $activity->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No recent activity</p>
            @endif
        </div>
    </div>

    <!-- Recent Pages & Posts -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Recent Content
                </h3>
            </div>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <!-- Recent Pages -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                        Pages
                    </h4>
                    @if($recent_pages->count() > 0)
                        <div class="space-y-2">
                            @foreach($recent_pages->take(3) as $page)
                                <div class="flex items-center justify-between p-2 bg-gray-50 rounded hover:bg-gray-100 transition">
                                    <div class="flex-1 min-w-0">
                                        <h5 class="text-sm font-medium text-gray-900 truncate">{{ $page->title }}</h5>
                                        <p class="text-xs text-gray-500 truncate">{{ $page->slug }}</p>
                                    </div>
                                    <span class="px-2 py-1 text-xs font-semibold rounded {{ $page->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst($page->status) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-gray-500 py-2">No pages yet</p>
                    @endif
                </div>

                <!-- Recent Blog Posts -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        Blog Posts
                    </h4>
                    @if($recent_posts->count() > 0)
                        <div class="space-y-2">
                            @foreach($recent_posts->take(3) as $post)
                                <div class="flex items-center justify-between p-2 bg-gray-50 rounded hover:bg-gray-100 transition">
                                    <div class="flex-1 min-w-0">
                                        <h5 class="text-sm font-medium text-gray-900 truncate">{{ $post->title }}</h5>
                                        <p class="text-xs text-gray-500 truncate">{{ $post->category->name ?? 'Uncategorized' }}</p>
                                    </div>
                                    <span class="px-2 py-1 text-xs font-semibold rounded {{ $post->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-gray-500 py-2">No blog posts yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
