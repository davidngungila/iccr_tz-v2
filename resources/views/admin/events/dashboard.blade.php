@extends('admin.layout')

@section('title', 'Event Management Dashboard')
@section('subtitle', 'Comprehensive Event Management & Analytics')

@section('content')
<!-- Header -->
<div class="mb-8">
    <div class="bg-gradient-to-r from-purple-600 via-blue-600 to-purple-700 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
        <div class="relative z-10 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold mb-2">Event Management Dashboard</h1>
                <p class="text-purple-100 text-lg">Manage all events, registrations, payments, attendance, and more</p>
            </div>
            <div class="text-right">
                <a href="{{ route('admin.events.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition text-white font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    New Event
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Events -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-purple-100 rounded-xl p-3">
                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider mb-1">Total Events</p>
        <p class="text-4xl font-bold text-gray-900 mb-3">{{ $stats['total_events'] }}</p>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ $stats['upcoming_events'] }} upcoming</span>
            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">{{ $stats['active_events'] }} active</span>
        </div>
    </div>

    <!-- Registrations -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-orange-100 rounded-xl p-3">
                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider mb-1">Registrations</p>
        <p class="text-4xl font-bold text-gray-900 mb-3">{{ $stats['total_registrations'] }}</p>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $stats['pending_registrations'] }} pending</span>
            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ $stats['confirmed_registrations'] }} confirmed</span>
        </div>
    </div>

    <!-- Payments -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-green-100 rounded-xl p-3">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider mb-1">Payments</p>
        <p class="text-4xl font-bold text-gray-900 mb-3">{{ number_format($stats['total_payment_amount']) }}</p>
        <p class="text-sm text-gray-600">TZS • {{ $stats['total_payments'] }} completed</p>
    </div>

    <!-- Attendance Today -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-blue-100 rounded-xl p-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider mb-1">Attendance Today</p>
        <p class="text-4xl font-bold text-gray-900 mb-3">{{ $stats['total_attendances'] }}</p>
        <p class="text-sm text-gray-600">Checked in today</p>
    </div>
</div>

<!-- Secondary Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow p-6 border-t-4 border-purple-500">
        <div class="flex items-center justify-between mb-3">
            <div class="bg-purple-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-1">Volunteers</p>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['total_volunteers'] }}</p>
        <p class="text-xs text-gray-500 mt-1">{{ $stats['active_volunteers'] }} active</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-t-4 border-pink-500">
        <div class="flex items-center justify-between mb-3">
            <div class="bg-pink-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-1">Prayer Requests</p>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['prayer_requests_pending'] }}</p>
        <p class="text-xs text-gray-500 mt-1">Pending</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-t-4 border-yellow-500">
        <div class="flex items-center justify-between mb-3">
            <div class="bg-yellow-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-1">Testimonies</p>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['testimonies_pending'] }}</p>
        <p class="text-xs text-gray-500 mt-1">Pending approval</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-t-4 border-indigo-500">
        <div class="flex items-center justify-between mb-3">
            <div class="bg-indigo-100 rounded-lg p-2">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-1">All Events</p>
        <a href="{{ route('admin.events') }}" class="text-2xl font-bold text-indigo-600 hover:text-indigo-800">View All</a>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <a href="{{ route('admin.events') }}" class="bg-white rounded-xl shadow-lg p-6 border-2 border-purple-200 hover:border-purple-400 transition group">
        <div class="flex items-center gap-4">
            <div class="bg-purple-100 rounded-lg p-3 group-hover:bg-purple-200 transition">
                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-gray-900">All Events</h3>
                <p class="text-sm text-gray-600">View & manage events</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.events') }}?status=upcoming" class="bg-white rounded-xl shadow-lg p-6 border-2 border-green-200 hover:border-green-400 transition group">
        <div class="flex items-center gap-4">
            <div class="bg-green-100 rounded-lg p-3 group-hover:bg-green-200 transition">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-gray-900">Registrations</h3>
                <p class="text-sm text-gray-600">Manage registrations</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.prayer-requests') }}" class="bg-white rounded-xl shadow-lg p-6 border-2 border-pink-200 hover:border-pink-400 transition group">
        <div class="flex items-center gap-4">
            <div class="bg-pink-100 rounded-lg p-3 group-hover:bg-pink-200 transition">
                <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-gray-900">Prayer Requests</h3>
                <p class="text-sm text-gray-600">View requests</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.testimonies') }}" class="bg-white rounded-xl shadow-lg p-6 border-2 border-yellow-200 hover:border-yellow-400 transition group">
        <div class="flex items-center gap-4">
            <div class="bg-yellow-100 rounded-lg p-3 group-hover:bg-yellow-200 transition">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-gray-900">Testimonies</h3>
                <p class="text-sm text-gray-600">Review & approve</p>
            </div>
        </div>
    </a>
</div>

<!-- Upcoming Events & Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Upcoming Events -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-purple-50 to-purple-100 px-6 py-4 border-b border-purple-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Upcoming Events</h3>
                <a href="{{ route('admin.events') }}?status=upcoming" class="text-sm text-purple-600 hover:text-purple-800 font-semibold">View All →</a>
            </div>
        </div>
        <div class="p-6">
            @if($upcomingEvents->count() > 0)
                <div class="space-y-3">
                    @foreach($upcomingEvents as $event)
                        <a href="{{ route('admin.events.registrations', $event) }}" class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">{{ $event->title }}</h4>
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $event->start_date->format('M d, Y') }}
                                </span>
                                @if($event->location)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ Str::limit($event->location, 20) }}
                                    </span>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No upcoming events</p>
            @endif
        </div>
    </div>

    <!-- Active Events -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-6 py-4 border-b border-blue-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Active Events</h3>
            </div>
        </div>
        <div class="p-6">
            @if($activeEvents->count() > 0)
                <div class="space-y-3">
                    @foreach($activeEvents as $event)
                        <div class="p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-lg border border-green-200">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-semibold text-gray-900">{{ $event->title }}</h4>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-200 text-green-800">Active</span>
                            </div>
                            <div class="flex items-center gap-4 text-sm text-gray-600 mb-3">
                                <span>{{ $event->start_date->format('M d') }} - {{ $event->end_date?->format('M d, Y') ?? 'Ongoing' }}</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.events.attendance', $event) }}" class="flex-1 text-center px-3 py-2 bg-white rounded-lg hover:bg-gray-50 text-sm font-semibold text-gray-700 border border-gray-200">
                                    Attendance
                                </a>
                                <a href="{{ route('admin.events.registrations', $event) }}" class="flex-1 text-center px-3 py-2 bg-white rounded-lg hover:bg-gray-50 text-sm font-semibold text-gray-700 border border-gray-200">
                                    Registrations
                                </a>
                                <a href="{{ route('admin.events.payments', $event) }}" class="flex-1 text-center px-3 py-2 bg-white rounded-lg hover:bg-gray-50 text-sm font-semibold text-gray-700 border border-gray-200">
                                    Payments
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No active events</p>
            @endif
        </div>
    </div>
</div>

<!-- Recent Registrations & Payments -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Registrations -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-orange-50 to-orange-100 px-6 py-4 border-b border-orange-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Recent Registrations</h3>
                <a href="{{ route('admin.events') }}" class="text-sm text-orange-600 hover:text-orange-800 font-semibold">View All →</a>
            </div>
        </div>
        <div class="p-6">
            @if($recentRegistrations->count() > 0)
                <div class="space-y-3">
                    @foreach($recentRegistrations as $registration)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition border border-gray-200">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 truncate">{{ $registration->full_name }}</h4>
                                <p class="text-sm text-gray-600 truncate">{{ $registration->event->title ?? 'Event Deleted' }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $registration->email }}</p>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $registration->status === 'confirmed' ? 'bg-green-100 text-green-800' : ($registration->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($registration->status) }}
                                </span>
                                <span class="text-xs text-gray-500">{{ $registration->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No registrations yet</p>
            @endif
        </div>
    </div>

    <!-- Recent Payments -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-green-50 to-green-100 px-6 py-4 border-b border-green-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Recent Payments</h3>
                <a href="{{ route('admin.events') }}" class="text-sm text-green-600 hover:text-green-800 font-semibold">View All →</a>
            </div>
        </div>
        <div class="p-6">
            @if($recentPayments->count() > 0)
                <div class="space-y-3">
                    @foreach($recentPayments as $payment)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition border border-gray-200">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 truncate">{{ $payment->registration?->full_name ?? 'Direct Payment' }}</h4>
                                <p class="text-sm text-gray-600 truncate">{{ $payment->event->title ?? 'Event Deleted' }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ ucfirst($payment->payment_method ?? 'N/A') }}</p>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <span class="text-lg font-bold text-green-600">{{ number_format($payment->amount) }} {{ $payment->currency }}</span>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $payment->status === 'completed' ? 'bg-green-100 text-green-800' : ($payment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No payments yet</p>
            @endif
        </div>
    </div>
</div>
@endsection


