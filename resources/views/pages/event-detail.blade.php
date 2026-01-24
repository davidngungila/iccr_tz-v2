@extends('layouts.app')

@section('title', $event->title . ' - ICCR Tanzania Events')
@section('description', $event->description ?: 'Join us for this upcoming event')

@section('content')
<!-- Hero Section with Event Banner -->
<section class="relative min-h-[60vh] h-[60vh] max-h-[700px] overflow-hidden">
    @if($event->banner_image)
    <div class="relative h-full">
        <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>
    @else
    <div class="relative h-full bg-gradient-to-br from-green-600 via-blue-600 to-green-800">
        <div class="absolute inset-0 bg-black opacity-50"></div>
    @endif
        <div class="absolute inset-0 flex items-center justify-center pb-12 md:pb-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold text-white mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>{{ ucfirst($event->status) }} Event</span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 drop-shadow-2xl leading-tight">
                        {{ $event->title }}
                    </h1>
                    @if($event->description)
                    <p class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-6 leading-relaxed drop-shadow-lg max-w-3xl mx-auto">
                        {{ $event->description }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Modal Popup -->
@if(session('success'))
<div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm" style="display: none;">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all animate-bounce-in">
        <div class="p-8 text-center">
            <!-- Success Icon -->
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-gradient-to-br from-green-500 to-green-600 mb-6 animate-pulse">
                <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            
            <!-- Success Message -->
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Registration Successful!</h3>
            <p class="text-lg text-gray-700 mb-6">{{ session('success') }}</p>
            
            <!-- Close Button -->
            <button onclick="closeSuccessModal()" class="w-full px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-xl font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                Continue
            </button>
        </div>
    </div>
</div>
@endif

<!-- Event Details Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Event Content -->
                @if($event->content)
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 mb-8">
                    <div class="prose prose-lg max-w-none">
                        {!! $event->content !!}
                    </div>
                </div>
                @endif

                <!-- Event Highlights -->
                <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl shadow-lg p-8 md:p-12 mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Event Highlights</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Powerful Worship</h3>
                                <p class="text-gray-700">Experience anointed worship sessions that usher you into the presence of God.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Inspiring Teaching</h3>
                                <p class="text-gray-700">Learn from experienced speakers sharing practical wisdom and biblical insights.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Rich Fellowship</h3>
                                <p class="text-gray-700">Connect with like-minded students from across Tanzania and build lasting friendships.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Spiritual Breakthrough</h3>
                                <p class="text-gray-700">Experience God's power through prayer, prophetic ministry, and the Holy Spirit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Event Info Card -->
                <div class="bg-white rounded-2xl shadow-xl border-2 border-gray-100 p-6 mb-6 sticky top-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Event Details</h3>
                    
                    <div class="space-y-6">
                        <!-- Date & Time -->
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Date & Time</h4>
                                <p class="text-gray-700">
                                    <span class="font-semibold">{{ $event->start_date->format('l, F j, Y') }}</span>
                                    <br>
                                    <span>{{ $event->start_date->format('g:i A') }}</span>
                                    @if($event->end_date)
                                        <span> - {{ $event->end_date->format('g:i A') }}</span>
                                    @endif
                                </p>
                                @if($event->end_date && $event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d'))
                                <p class="text-sm text-gray-600 mt-1">
                                    Ends: {{ $event->end_date->format('F j, Y') }}
                                </p>
                                @endif
                            </div>
                        </div>

                        <!-- Location -->
                        @if($event->location)
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Location</h4>
                                <p class="text-gray-700">{{ $event->location }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Status -->
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Status</h4>
                                <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold {{ $event->status === 'upcoming' ? 'bg-green-100 text-green-800' : ($event->status === 'past' ? 'bg-gray-100 text-gray-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <div class="mt-8 pt-6 border-t-2 border-gray-100">
                        @if($event->status === 'upcoming')
                        <a href="{{ route('event.register', $event->slug) }}" class="block w-full text-center px-6 py-4 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-xl font-bold text-lg hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                            Register Now
                        </a>
                        @else
                        <button disabled class="block w-full text-center px-6 py-4 bg-gray-400 text-white rounded-xl font-bold text-lg cursor-not-allowed">
                            Registration Closed
                        </button>
                        @endif
                        <button onclick="shareEvent()" class="mt-3 block w-full text-center px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                            Share Event
                        </button>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Quick Links</h3>
                    <div class="space-y-3">
                        <a href="{{ route('events') }}" class="flex items-center gap-3 p-3 bg-white rounded-lg hover:bg-green-50 transition group">
                            <svg class="w-5 h-5 text-green-600 group-hover:text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="font-semibold text-gray-700 group-hover:text-green-700">All Events</span>
                        </a>
                        <a href="{{ route('contact') }}" class="flex items-center gap-3 p-3 bg-white rounded-lg hover:bg-green-50 transition group">
                            <svg class="w-5 h-5 text-green-600 group-hover:text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="font-semibold text-gray-700 group-hover:text-green-700">Contact Us</span>
                        </a>
                        <a href="{{ route('get-involved') }}" class="flex items-center gap-3 p-3 bg-white rounded-lg hover:bg-green-50 transition group">
                            <svg class="w-5 h-5 text-green-600 group-hover:text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            <span class="font-semibold text-gray-700 group-hover:text-green-700">Get Involved</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Events Section -->
@if($relatedEvents->count() > 0)
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Related Events</h2>
            <p class="text-lg text-gray-600">You might also be interested in these events</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedEvents as $relatedEvent)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                @if($relatedEvent->banner_image)
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $relatedEvent->banner_image }}" alt="{{ $relatedEvent->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black opacity-30"></div>
                    <div class="absolute top-4 right-4 px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-semibold text-gray-900">
                        {{ ucfirst($relatedEvent->status) }}
                    </div>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $relatedEvent->title }}</h3>
                    <p class="text-gray-600 mb-4 text-sm line-clamp-2">{{ $relatedEvent->description ?: \Illuminate\Support\Str::limit(strip_tags($relatedEvent->content ?? ''), 100) }}</p>
                    <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>{{ $relatedEvent->start_date->format('M d, Y') }}</span>
                        @if($relatedEvent->location)
                        <span class="mx-2">•</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <span>{{ $relatedEvent->location }}</span>
                        @endif
                    </div>
                    <a href="{{ route('event.show', $relatedEvent->slug) }}" class="inline-flex items-center gap-2 text-green-600 font-semibold hover:text-green-700 transition">
                        <span>Learn More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@push('scripts')
<script>
// Show success modal on page load if success message exists
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.style.display = 'flex';
        // Auto-close after 5 seconds
        setTimeout(function() {
            closeSuccessModal();
        }, 5000);
    }
    @endif
});

function closeSuccessModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.style.opacity = '0';
        modal.style.transition = 'opacity 0.3s ease-out';
        setTimeout(function() {
            modal.style.display = 'none';
            // Remove success message from URL
            if (window.history.replaceState) {
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        }, 300);
    }
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('successModal');
    if (modal && event.target === modal) {
        closeSuccessModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeSuccessModal();
    }
});

function shareEvent() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $event->title }}',
            text: '{{ $event->description }}',
            url: window.location.href
        }).catch(console.error);
    } else {
        // Fallback: Copy to clipboard
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('Event link copied to clipboard!');
        }).catch(() => {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = window.location.href;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('Event link copied to clipboard!');
        });
    }
}
</script>
<style>
@keyframes bounce-in {
    0% {
        transform: scale(0.3);
        opacity: 0;
    }
    50% {
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}
.animate-bounce-in {
    animation: bounce-in 0.5s ease-out;
}
</style>
@endpush
@endsection

