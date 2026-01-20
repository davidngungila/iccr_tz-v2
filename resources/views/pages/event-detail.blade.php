@extends('layouts.app')

@section('title', $event->title . ' - ICCR Tanzania')
@section('description', $event->description ?? 'Event details and information')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[60vh] bg-gradient-to-br from-indigo-900 via-blue-900 to-purple-900 text-white py-20">
    @if($event->banner_image)
    <div class="absolute inset-0">
        <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-full h-full object-cover opacity-30">
    </div>
    @endif
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full text-sm font-semibold mb-6 border border-white/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ $event->start_date->format('F d, Y') }} @if($event->end_date) - {{ $event->end_date->format('F d, Y') }} @endif</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">{{ $event->title }}</h1>
            @if($event->title_sw)
            <h2 class="text-2xl md:text-3xl text-blue-100 mb-6">{{ $event->title_sw }}</h2>
            @endif
            @if($event->location)
            <div class="flex items-center gap-2 text-lg text-blue-100 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>{{ $event->location }}</span>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Event Details -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Description -->
                @if($event->description)
                <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">About This Event</h2>
                    <div class="prose max-w-none text-gray-600 leading-relaxed">
                        <p class="text-lg">{{ $event->description }}</p>
                    </div>
                    @if($event->description_sw)
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <p class="text-lg text-gray-600 leading-relaxed">{{ $event->description_sw }}</p>
                    </div>
                    @endif
                </div>
                @endif

                <!-- Full Details -->
                @if($event->full_details || $event->full_details_sw)
                <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Full Details</h2>
                    @if($event->full_details)
                    <div class="prose max-w-none text-gray-600 leading-relaxed mb-6">
                        {!! nl2br(e($event->full_details)) !!}
                    </div>
                    @endif
                    @if($event->full_details_sw)
                    <div class="prose max-w-none text-gray-600 leading-relaxed pt-6 border-t border-gray-200">
                        {!! nl2br(e($event->full_details_sw)) !!}
                    </div>
                    @endif
                </div>
                @endif

                <!-- Schedule -->
                @if($event->schedule || $event->schedule_sw)
                <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Schedule</h2>
                    @if($event->schedule)
                    <div class="prose max-w-none text-gray-600 leading-relaxed mb-6">
                        {!! nl2br(e($event->schedule)) !!}
                    </div>
                    @endif
                    @if($event->schedule_sw)
                    <div class="prose max-w-none text-gray-600 leading-relaxed pt-6 border-t border-gray-200">
                        {!! nl2br(e($event->schedule_sw)) !!}
                    </div>
                    @endif
                </div>
                @endif

                <!-- Prayer Meeting Info -->
                @if($event->prayer_meeting_link || $event->prayer_schedule)
                <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-8 shadow-lg border-2 border-purple-200">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Prayer Meeting
                    </h2>
                    @if($event->prayer_schedule)
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Prayer Schedule</h3>
                        <div class="prose max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($event->prayer_schedule)) !!}
                        </div>
                        @if($event->prayer_schedule_sw)
                        <div class="mt-4 pt-4 border-t border-purple-200">
                            {!! nl2br(e($event->prayer_schedule_sw)) !!}
                        </div>
                        @endif
                    </div>
                    @endif
                    @if($event->prayer_meeting_link)
                    <div class="space-y-4">
                        <a href="{{ $event->prayer_meeting_link }}" target="_blank" class="inline-flex items-center gap-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-6 py-4 rounded-xl font-bold hover:from-purple-700 hover:to-indigo-700 transition shadow-lg hover:shadow-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.568 8.16c-.169 0-.315.06-.442.18l-1.903 1.903c-.02.02-.04.04-.06.06-.02.02-.04.04-.06.06l-1.903 1.903c-.127.12-.273.18-.442.18s-.315-.06-.442-.18l-1.903-1.903c-.02-.02-.04-.04-.06-.06-.02-.02-.04-.04-.06-.06L6.274 8.34c-.127-.12-.273-.18-.442-.18s-.315.06-.442.18c-.24.24-.24.644 0 .884l1.903 1.903c.02.02.04.04.06.06.02.02.04.04.06.06l1.903 1.903c.127.12.273.18.442.18s.315-.06.442-.18l1.903-1.903c.02-.02.04-.04.06-.06.02-.02.04-.04.06-.06l1.903-1.903c.127-.12.273-.18.442-.18s.315.06.442.18c.24.24.24.644 0 .884l-1.903 1.903c-.02.02-.04.04-.06.06-.02.02-.04.04-.06.06l-1.903 1.903c-.127.12-.273.18-.442.18s-.315-.06-.442-.18l-1.903-1.903c-.02-.02-.04-.04-.06-.06-.02-.02-.04-.04-.06-.06l-1.903-1.903c-.127-.12-.273-.18-.442-.18s-.315.06-.442.18c-.24.24-.24.644 0 .884l1.903 1.903c.02.02.04.04.06.06.02.02.04.04.06.06l1.903 1.903c.127.12.273.18.442.18s.315-.06.442-.18l1.903-1.903c.02-.02.04-.04.06-.06.02-.02.04-.04.06-.06l1.903-1.903c.127-.12.273-.18.442-.18s.315.06.442.18c.24.24.24.644 0 .884l-1.903 1.903c-.02.02-.04.04-.06.06-.02.02-.04.04-.06.06l-1.903 1.903c-.127.12-.273.18-.442.18s-.315-.06-.442-.18l-1.903-1.903c-.02-.02-.04-.04-.06-.06-.02-.02-.04-.04-.06-.06l-1.903-1.903c-.127-.12-.273-.18-.442-.18s-.315.06-.442.18c-.24.24-.24.644 0 .884l1.903 1.903c.02.02.04.04.06.06.02.02.04.04.06.06l1.903 1.903c.127.12.273.18.442.18s.315-.06.442-.18l1.903-1.903c.02-.02.04-.04.06-.06.02-.02.04-.04.06-.06l1.903-1.903c.127-.12.273-.18.442-.18s.315.06.442.18c.24.24.24.644 0 .884z"/>
                            </svg>
                            Join Prayer Meeting on Google Meet
                        </a>
                        @if($event->prayer_meeting_code)
                        <div class="bg-white rounded-lg p-4 border-2 border-purple-200">
                            <p class="text-sm text-gray-600 mb-2">Meeting Code:</p>
                            <p class="text-lg font-mono font-bold text-purple-600">{{ $event->prayer_meeting_code }}</p>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
                @endif

                <!-- Payment Information -->
                @if($event->payment_info || $event->payment_info_sw)
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 shadow-lg border-2 border-green-200">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Payment Information
                    </h2>
                    @if($event->payment_info)
                    <div class="prose max-w-none text-gray-700 leading-relaxed mb-6">
                        {!! nl2br(e($event->payment_info)) !!}
                    </div>
                    @endif
                    @if($event->payment_info_sw)
                    <div class="prose max-w-none text-gray-700 leading-relaxed pt-6 border-t border-green-200">
                        {!! nl2br(e($event->payment_info_sw)) !!}
                    </div>
                    @endif
                </div>
                @endif

                <!-- Registration Info -->
                @if($event->registration_info || $event->registration_info_sw)
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-8 shadow-lg border-2 border-blue-200">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Registration Information</h2>
                    @if($event->registration_info)
                    <div class="prose max-w-none text-gray-700 leading-relaxed mb-6">
                        {!! nl2br(e($event->registration_info)) !!}
                    </div>
                    @endif
                    @if($event->registration_info_sw)
                    <div class="prose max-w-none text-gray-700 leading-relaxed pt-6 border-t border-blue-200">
                        {!! nl2br(e($event->registration_info_sw)) !!}
                    </div>
                    @endif
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Event Info Card -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 sticky top-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Event Information</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Date</div>
                            <div class="font-semibold text-gray-900">
                                {{ $event->start_date->format('F d, Y') }}
                                @if($event->end_date)
                                    <br><span class="text-sm">to {{ $event->end_date->format('F d, Y') }}</span>
                                @endif
                            </div>
                        </div>
                        @if($event->location)
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Location</div>
                            <div class="font-semibold text-gray-900">{{ $event->location }}</div>
                        </div>
                        @endif
                        @if($event->contact_phone)
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Contact</div>
                            <a href="tel:{{ $event->contact_phone }}" class="font-semibold text-blue-600 hover:text-blue-800">
                                {{ $event->contact_phone }}
                            </a>
                        </div>
                        @endif
                        @if($event->contact_email)
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Email</div>
                            <a href="mailto:{{ $event->contact_email }}" class="font-semibold text-blue-600 hover:text-blue-800">
                                {{ $event->contact_email }}
                            </a>
                        </div>
                        @endif
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Status</div>
                            <span class="px-3 py-1 text-sm rounded-full {{ $event->status === 'upcoming' ? 'bg-green-100 text-green-800' : ($event->status === 'past' ? 'bg-gray-100 text-gray-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Related Events -->
                @if($relatedEvents->count() > 0)
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Related Events</h3>
                    <div class="space-y-4">
                        @foreach($relatedEvents as $relatedEvent)
                        <a href="{{ route('event.detail', $relatedEvent->slug) }}" class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="font-semibold text-gray-900 mb-1">{{ $relatedEvent->title }}</div>
                            <div class="text-sm text-gray-600">{{ $relatedEvent->start_date->format('M d, Y') }}</div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

