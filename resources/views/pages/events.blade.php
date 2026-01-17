@extends('layouts.app')

@section('title', 'Events - ICCR Tanzania')
@section('description', 'Upcoming and past events of ICCR Tanzania including Night of Praise, spiritual camps, and prayer retreats')

@section('content')
<!-- Hero Section - Advanced -->
<section class="relative min-h-[50vh] h-[50vh] max-h-[600px] overflow-hidden">
    <div class="relative h-full bg-gradient-to-br from-green-600 via-blue-600 to-green-700">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="{{ asset('images/09.jpg') }}" alt="ICCR Events" class="w-full h-full object-cover object-center">
        <div class="absolute inset-0 flex items-center justify-center py-8">
            <div class="text-center text-white px-4 sm:px-6 lg:px-8 z-10 max-w-5xl w-full">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Upcoming Events</span>
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 drop-shadow-2xl leading-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">Events</span>
                </h1>
                <p class="text-sm sm:text-base md:text-lg text-blue-100 mb-6 leading-relaxed max-w-3xl mx-auto drop-shadow-md">
                    Join Us for Spiritual Growth and Fellowship
                </p>
            </div>
        </div>
    </div>
    <!-- Decorative Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg class="w-full h-12 text-white" fill="currentColor" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,100 350,0 600,50 C850,100 1050,0 1200,50 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- Event Statistics Section -->
<section class="py-16 bg-gradient-to-br from-green-600 via-blue-600 to-green-700 relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-white/10 backdrop-blur-md rounded-xl border-2 border-white/20">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">50+</div>
                <div class="text-sm md:text-base text-green-100 font-medium">Events This Year</div>
            </div>
            <div class="text-center p-6 bg-white/10 backdrop-blur-md rounded-xl border-2 border-white/20">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">2000+</div>
                <div class="text-sm md:text-base text-green-100 font-medium">Participants</div>
            </div>
            <div class="text-center p-6 bg-white/10 backdrop-blur-md rounded-xl border-2 border-white/20">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">15+</div>
                <div class="text-sm md:text-base text-green-100 font-medium">Campus Chapters</div>
            </div>
            <div class="text-center p-6 bg-white/10 backdrop-blur-md rounded-xl border-2 border-white/20">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">12</div>
                <div class="text-sm md:text-base text-green-100 font-medium">Regions Covered</div>
            </div>
        </div>
    </div>
</section>

<!-- Event Categories Filter Section -->
<section class="py-12 bg-white border-b-2 border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="view-toggle-btn active px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-md hover:shadow-lg transform hover:scale-105" data-view="list">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                List View
            </button>
            <button class="view-toggle-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-view="calendar">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Calendar View
            </button>
        </div>
        <div class="flex flex-wrap justify-center gap-4 mt-4">
            <button class="event-filter-btn active px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-md hover:shadow-lg transform hover:scale-105" data-filter="all">
                All Events
            </button>
            <button class="event-filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-filter="worship">
                Worship & Praise
            </button>
            <button class="event-filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-filter="retreat">
                Retreats
            </button>
            <button class="event-filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-filter="conference">
                Conferences
            </button>
            <button class="event-filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-filter="training">
                Training & Workshops
            </button>
            <button class="event-filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-filter="fellowship">
                Fellowship
            </button>
        </div>
    </div>
</section>

<!-- Calendar View Section -->
<section id="calendar-view" class="hidden py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Event <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Calendar</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                View all upcoming events in calendar format
            </p>
        </div>

        <!-- Calendar Navigation -->
        <div class="flex items-center justify-between mb-8 bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
            <button id="prev-month" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <h3 id="calendar-month-year" class="text-2xl md:text-3xl font-bold text-gray-900"></h3>
            <button id="next-month" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        <!-- Calendar Grid -->
        <div class="bg-white rounded-2xl shadow-xl border-2 border-gray-100 overflow-hidden">
            <!-- Calendar Header -->
            <div class="grid grid-cols-7 bg-gradient-to-r from-green-600 to-blue-600 text-white">
                <div class="p-4 text-center font-bold text-sm md:text-base">Sun</div>
                <div class="p-4 text-center font-bold text-sm md:text-base">Mon</div>
                <div class="p-4 text-center font-bold text-sm md:text-base">Tue</div>
                <div class="p-4 text-center font-bold text-sm md:text-base">Wed</div>
                <div class="p-4 text-center font-bold text-sm md:text-base">Thu</div>
                <div class="p-4 text-center font-bold text-sm md:text-base">Fri</div>
                <div class="p-4 text-center font-bold text-sm md:text-base">Sat</div>
            </div>
            <!-- Calendar Days -->
            <div id="calendar-days" class="grid grid-cols-7 gap-1 p-2 bg-gray-50">
                <!-- Calendar days will be populated by JavaScript -->
            </div>
        </div>

        <!-- Event Legend -->
        <div class="mt-8 bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
            <h4 class="text-xl font-bold text-gray-900 mb-4">Event Types</h4>
            <div class="flex flex-wrap gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-blue-500"></div>
                    <span class="text-gray-700">Worship & Praise</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-purple-500"></div>
                    <span class="text-gray-700">Retreats</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-orange-500"></div>
                    <span class="text-gray-700">Conferences</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-teal-500"></div>
                    <span class="text-gray-700">Training & Workshops</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events Section - Advanced -->
<section id="list-view" class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Upcoming Events</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Upcoming <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Events</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Mark your calendar and join us for these upcoming gatherings
            </p>
        </div>
        
        <div class="space-y-8" id="events-container">
            <!-- Event 1 -->
            <div class="event-item group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-1" data-category="worship">
                <div class="md:flex">
                    <div class="md:w-1/3 relative h-64 md:h-auto bg-gradient-to-br from-blue-500 to-purple-600 overflow-hidden">
                        <img src="{{ asset('images/03.jpg') }}" alt="Night of Praise" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                        <div class="absolute inset-0 bg-black opacity-30"></div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white z-10">
                            <div class="text-6xl font-bold mb-2 drop-shadow-lg">25</div>
                            <div class="text-2xl font-semibold drop-shadow-md">January</div>
                            <div class="text-xl mt-2 drop-shadow-md">2026</div>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                                Upcoming
                            </div>
                    </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition">Night of Praise</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
                            Join us for an evening of powerful worship, prayer, and fellowship. This event brings together students from across Tanzania for a night of praise and spiritual renewal.
                        </p>
                        <div class="flex flex-wrap gap-6 mb-6">
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Dar es Salaam
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                6:00 PM
                            </span>
                        </div>
                        <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                            <span>Register Now</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Event 2 -->
            <div class="event-item group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-purple-300 transition-all duration-300 transform hover:-translate-y-1" data-category="retreat">
                <div class="md:flex">
                    <div class="md:w-1/3 relative h-64 md:h-auto bg-gradient-to-br from-purple-500 to-pink-600 overflow-hidden">
                        <img src="{{ asset('images/04.jpg') }}" alt="Regional Spiritual Camp" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                        <div class="absolute inset-0 bg-black opacity-30"></div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white z-10">
                            <div class="text-6xl font-bold mb-2 drop-shadow-lg">10</div>
                            <div class="text-2xl font-semibold drop-shadow-md">February</div>
                            <div class="text-xl mt-2 drop-shadow-md">2026</div>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
                                Upcoming
                            </div>
                    </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4 group-hover:text-purple-600 transition">Regional Spiritual Camp</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
                            A multi-day spiritual camp focused on deepening your relationship with God through prayer, teaching, and fellowship. Open to all students from regional colleges.
                        </p>
                        <div class="flex flex-wrap gap-6 mb-6">
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Dodoma
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                3 Days
                            </span>
                        </div>
                        <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                            <span>Register Now</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Event 3 -->
            <div class="event-item group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-green-300 transition-all duration-300 transform hover:-translate-y-1" data-category="retreat">
                <div class="md:flex">
                    <div class="md:w-1/3 relative h-64 md:h-auto bg-gradient-to-br from-green-500 to-blue-600 overflow-hidden">
                        <img src="{{ asset('images/05.jpg') }}" alt="Saturday Prayer Retreat" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                        <div class="absolute inset-0 bg-black opacity-30"></div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white z-10">
                            <div class="text-6xl font-bold mb-2 drop-shadow-lg">1</div>
                            <div class="text-2xl font-semibold drop-shadow-md">March</div>
                            <div class="text-xl mt-2 drop-shadow-md">2026</div>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                                Upcoming
                            </div>
                    </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4 group-hover:text-green-600 transition">Saturday Prayer Retreat</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
                            A day-long prayer retreat focused on reflection, meditation, and spiritual growth. Perfect for those seeking a deeper connection with God.
                        </p>
                        <div class="flex flex-wrap gap-6 mb-6">
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Mwanza
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                9:00 AM - 5:00 PM
                            </span>
                        </div>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span>Register Now</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            <button class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 4 - Open Gate Camp -->
            <div class="event-item group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-orange-300 transition-all duration-300 transform hover:-translate-y-1" data-category="conference">
                <div class="md:flex">
                    <div class="md:w-1/3 relative h-64 md:h-auto bg-gradient-to-br from-orange-500 to-red-600 overflow-hidden">
                        <img src="{{ asset('images/06.jpg') }}" alt="Open Gate Camp" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                        <div class="absolute inset-0 bg-black opacity-30"></div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white z-10">
                            <div class="text-6xl font-bold mb-2 drop-shadow-lg">15</div>
                            <div class="text-2xl font-semibold drop-shadow-md">March</div>
                            <div class="text-xl mt-2 drop-shadow-md">2026</div>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm font-semibold">
                                Upcoming
                            </div>
                            <div class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                                Multi-Day
                            </div>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4 group-hover:text-orange-600 transition">Open Gate Camp - Moshi & Arusha</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
                            A transformative multi-day camp bringing together students from Moshi and Arusha regions. Experience powerful worship, inspiring teachings, and life-changing encounters with the Holy Spirit. This camp focuses on opening gates of breakthrough, healing, and spiritual renewal.
                        </p>
                        <div class="flex flex-wrap gap-6 mb-6">
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Moshi & Arusha
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                3 Days
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                500+ Expected
                            </span>
                        </div>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-lg font-semibold hover:from-orange-700 hover:to-red-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span>Register Now</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            <button class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 5 - Perfect Vision -->
            <div class="event-item group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-indigo-300 transition-all duration-300 transform hover:-translate-y-1" data-category="conference">
                <div class="md:flex">
                    <div class="md:w-1/3 relative h-64 md:h-auto bg-gradient-to-br from-indigo-500 to-purple-600 overflow-hidden">
                        <img src="{{ asset('images/07.jpg') }}" alt="Perfect Vision" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                        <div class="absolute inset-0 bg-black opacity-30"></div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white z-10">
                            <div class="text-6xl font-bold mb-2 drop-shadow-lg">5</div>
                            <div class="text-2xl font-semibold drop-shadow-md">April</div>
                            <div class="text-xl mt-2 drop-shadow-md">2026</div>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold">
                                Upcoming
                            </div>
                            <div class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
                                Conference
                            </div>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4 group-hover:text-indigo-600 transition">Perfect Vision - Mbeya</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
                            A powerful conference focused on gaining clarity in your spiritual journey and life purpose. Through dynamic worship, prophetic ministry, and practical teaching, discover God's perfect vision for your life. This event is designed to help you see clearly and walk confidently in your calling.
                        </p>
                        <div class="flex flex-wrap gap-6 mb-6">
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Mbeya
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                9:00 AM - 6:00 PM
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                All Ages
                            </span>
                        </div>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span>Register Now</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            <button class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 6 - Usiku wa Sifa -->
            <div class="event-item group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-yellow-300 transition-all duration-300 transform hover:-translate-y-1" data-category="worship">
                <div class="md:flex">
                    <div class="md:w-1/3 relative h-64 md:h-auto bg-gradient-to-br from-yellow-500 to-orange-600 overflow-hidden">
                        <img src="{{ asset('images/08.jpg') }}" alt="Usiku wa Sifa" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                        <div class="absolute inset-0 bg-black opacity-30"></div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white z-10">
                            <div class="text-6xl font-bold mb-2 drop-shadow-lg">20</div>
                            <div class="text-2xl font-semibold drop-shadow-md">May</div>
                            <div class="text-xl mt-2 drop-shadow-md">2026</div>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold">
                                Upcoming
                            </div>
                            <div class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm font-semibold">
                                Worship Night
                            </div>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4 group-hover:text-yellow-600 transition">Usiku wa Sifa - Dar es Salaam</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
                            Experience an unforgettable night of praise and worship in Dar es Salaam. Join hundreds of students as we lift our voices in unity, declaring God's goodness and faithfulness. This powerful worship night features anointed music, prophetic declarations, and an atmosphere charged with the presence of the Holy Spirit.
                        </p>
                        <div class="flex flex-wrap gap-6 mb-6">
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Dar es Salaam
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                7:00 PM - 11:00 PM
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                </svg>
                                Live Music
                            </span>
                        </div>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-yellow-600 to-orange-600 text-white rounded-lg font-semibold hover:from-yellow-700 hover:to-orange-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span>Register Now</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            <button class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 7 - NexGen Camp -->
            <div class="event-item group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-teal-300 transition-all duration-300 transform hover:-translate-y-1" data-category="training">
                <div class="md:flex">
                    <div class="md:w-1/3 relative h-64 md:h-auto bg-gradient-to-br from-teal-500 to-cyan-600 overflow-hidden">
                        <img src="{{ asset('images/09.jpg') }}" alt="NexGen Camp" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                        <div class="absolute inset-0 bg-black opacity-30"></div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white z-10">
                            <div class="text-6xl font-bold mb-2 drop-shadow-lg">10</div>
                            <div class="text-2xl font-semibold drop-shadow-md">June</div>
                            <div class="text-xl mt-2 drop-shadow-md">2026</div>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="px-3 py-1 bg-teal-100 text-teal-700 rounded-full text-sm font-semibold">
                                Upcoming
                            </div>
                            <div class="px-3 py-1 bg-cyan-100 text-cyan-700 rounded-full text-sm font-semibold">
                                Leadership Training
                            </div>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4 group-hover:text-teal-600 transition">NexGen Camp, Retreat & Leadership School - Dar es Salaam</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
                            A comprehensive leadership development program designed for the next generation of leaders. This intensive camp combines spiritual formation, practical leadership training, and strategic planning. Perfect for current and aspiring chapter leaders, ministry coordinators, and those called to serve in leadership roles.
                        </p>
                        <div class="flex flex-wrap gap-6 mb-6">
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Dar es Salaam
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                5 Days
                            </span>
                            <span class="flex items-center text-gray-600 text-base">
                                <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Certificate Program
                            </span>
                        </div>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg font-semibold hover:from-teal-700 hover:to-cyan-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span>Register Now</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            <button class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Past Events Gallery Section - Enhanced -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Past Events</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Past Events <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Gallery</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Memories and highlights from our previous gatherings
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Past Event 1 -->
            <div class="group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/06.jpg') }}" alt="Easter Conference 2025" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <div class="absolute top-4 left-4 px-3 py-1 bg-blue-600 text-white rounded-full text-xs font-semibold">
                        Conference
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-gray-600 font-medium">March 28-30, 2025</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">Easter Conference 2025</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        A powerful 3-day conference celebrating the resurrection of Christ with worship, teaching, and fellowship. Over 800 students gathered from across Tanzania.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Dar es Salaam</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span>800+ Participants</span>
                        </div>
                    </div>
                    <a href="{{ route('media') }}" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:text-blue-700 transition">
                        <span>View Gallery</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Past Event 2 -->
            <div class="group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-purple-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/07.jpg') }}" alt="Regional Spiritual Camp" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <div class="absolute top-4 left-4 px-3 py-1 bg-purple-600 text-white rounded-full text-xs font-semibold">
                        Retreat
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-gray-600 font-medium">February 15-17, 2025</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition">Regional Spiritual Camp</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        A transformative 3-day camp in Dodoma focusing on spiritual growth, prayer, and community building. Students experienced deep worship and powerful teachings.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Dodoma</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span>350+ Participants</span>
                        </div>
                    </div>
                    <a href="{{ route('media') }}" class="inline-flex items-center gap-2 text-purple-600 font-semibold hover:text-purple-700 transition">
                        <span>View Gallery</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Past Event 3 -->
            <div class="group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-green-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/08.jpg') }}" alt="Usiku wa Sifa" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <div class="absolute top-4 left-4 px-3 py-1 bg-green-600 text-white rounded-full text-xs font-semibold">
                        Worship Night
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-gray-600 font-medium">January 18, 2025</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition">Usiku wa Sifa - Dar es Salaam</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        An unforgettable night of praise and worship featuring powerful music, prophetic declarations, and an atmosphere charged with the Holy Spirit. Over 600 students attended.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Dar es Salaam</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span>600+ Participants</span>
                        </div>
                    </div>
                    <a href="{{ route('media') }}" class="inline-flex items-center gap-2 text-green-600 font-semibold hover:text-green-700 transition">
                        <span>View Gallery</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Past Event 4 -->
            <div class="group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-yellow-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/09.jpg') }}" alt="Leadership Training" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <div class="absolute top-4 left-4 px-3 py-1 bg-yellow-600 text-white rounded-full text-xs font-semibold">
                        Training
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-gray-600 font-medium">December 10-14, 2024</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-yellow-600 transition">Leadership Development Workshop</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        A comprehensive 5-day leadership training program for chapter leaders. Participants learned practical skills in ministry leadership, event planning, and discipleship.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Dar es Salaam</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span>120 Leaders</span>
                        </div>
                    </div>
                    <a href="{{ route('media') }}" class="inline-flex items-center gap-2 text-yellow-600 font-semibold hover:text-yellow-700 transition">
                        <span>View Gallery</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Past Event 5 -->
            <div class="group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-red-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/10.jpg') }}" alt="Fellowship Night" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <div class="absolute top-4 left-4 px-3 py-1 bg-red-600 text-white rounded-full text-xs font-semibold">
                        Fellowship
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-gray-600 font-medium">November 22, 2024</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition">Campus Fellowship Night</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        A vibrant evening of fellowship, games, and testimonies. Students from multiple campuses came together to build relationships and share their faith journeys.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Mwanza</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span>250+ Participants</span>
                        </div>
                    </div>
                    <a href="{{ route('media') }}" class="inline-flex items-center gap-2 text-red-600 font-semibold hover:text-red-700 transition">
                        <span>View Gallery</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Past Event 6 -->
            <div class="group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-indigo-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/11.jpg') }}" alt="Bible Study Conference" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <div class="absolute top-4 left-4 px-3 py-1 bg-indigo-600 text-white rounded-full text-xs font-semibold">
                        Conference
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-gray-600 font-medium">October 5-6, 2024</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition">Bible Study & Discipleship Conference</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        A 2-day conference focused on deepening biblical knowledge and discipleship skills. Featured workshops on Bible study methods, small group leadership, and spiritual mentoring.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-4">
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Mbeya</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span>400+ Participants</span>
                        </div>
                    </div>
                    <a href="{{ route('media') }}" class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:text-indigo-700 transition">
                        <span>View Gallery</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('media') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-bold text-lg hover:from-indigo-700 hover:to-purple-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105 border-2 border-transparent hover:border-white/20">
                <span>View More in Media Gallery</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Event Highlights Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-green-50 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
                <span>Why Attend Our Events</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Event <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Highlights</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Discover what makes our events special and transformative
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-green-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Powerful Worship</h3>
                <p class="text-gray-600 leading-relaxed">
                    Experience anointed worship sessions that usher you into the presence of God. Our worship teams lead with passion and excellence, creating an atmosphere where the Holy Spirit moves freely.
                </p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Inspiring Teaching</h3>
                <p class="text-gray-600 leading-relaxed">
                    Learn from experienced speakers and teachers who share practical wisdom and biblical insights. Our teachings are designed to equip you for spiritual growth and effective ministry.
                </p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-purple-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Rich Fellowship</h3>
                <p class="text-gray-600 leading-relaxed">
                    Connect with like-minded students from across Tanzania. Build lasting friendships, share experiences, and grow together in faith. Our events create a supportive community atmosphere.
                </p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-indigo-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Spiritual Breakthrough</h3>
                <p class="text-gray-600 leading-relaxed">
                    Experience God's power through prayer, prophetic ministry, and the moving of the Holy Spirit. Many have received healing, deliverance, and life-changing encounters at our events.
                </p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-teal-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Leadership Development</h3>
                <p class="text-gray-600 leading-relaxed">
                    Gain practical skills and insights for effective leadership in ministry and campus chapters. Our training programs equip you to serve and lead with excellence and integrity.
                </p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-orange-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Memorable Experiences</h3>
                <p class="text-gray-600 leading-relaxed">
                    Create lasting memories through engaging activities, fun games, and meaningful moments. Our events are designed to be both spiritually enriching and enjoyable experiences.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                </svg>
                <span>Testimonials</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                What <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-orange-600">Participants Say</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Stories of transformation from our events
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl p-8 shadow-lg border-2 border-green-100">
                <div class="flex items-center gap-1 mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">
                    "The Night of Praise event was absolutely life-changing! The worship was powerful, and I felt God's presence in a way I never had before. I left feeling refreshed and renewed in my faith."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        SM
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Sarah Mwanga</div>
                        <div class="text-sm text-gray-600">University of Dar es Salaam</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8 shadow-lg border-2 border-blue-100">
                <div class="flex items-center gap-1 mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">
                    "The Regional Spiritual Camp was exactly what I needed. The teachings were practical, the fellowship was amazing, and I made connections that will last a lifetime. Highly recommend!"
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        JK
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">John Kimario</div>
                        <div class="text-sm text-gray-600">Dodoma University</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-8 shadow-lg border-2 border-purple-100">
                <div class="flex items-center gap-1 mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">
                    "The NexGen Leadership School equipped me with skills I use every day in my chapter. The training was comprehensive, and the mentors were incredibly supportive. This program is a game-changer!"
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        AM
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Anna Mwangi</div>
                        <div class="text-sm text-gray-600">Mwanza Chapter Leader</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Event FAQ Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Frequently Asked Questions</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Event <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">FAQ</span>
            </h2>
        </div>
        
        <div class="space-y-4">
            <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-2">How do I register for an event?</h3>
                <p class="text-gray-600 leading-relaxed">
                    Registration is simple! Click the "Register Now" button on any event page, fill out the registration form, and you'll receive a confirmation email. For multi-day events, early registration is recommended as spaces fill up quickly.
                </p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Are events free to attend?</h3>
                <p class="text-gray-600 leading-relaxed">
                    Most of our events are free for students. Some special conferences or training programs may have a minimal registration fee to cover materials and meals. All fees are clearly stated on the event registration page.
                </p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-2">What should I bring to an event?</h3>
                <p class="text-gray-600 leading-relaxed">
                    We recommend bringing a Bible, notebook, pen, and an open heart ready to receive. For multi-day events, we'll provide a detailed packing list in your confirmation email. Don't forget to bring your enthusiasm and a friend!
                </p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Can I attend if I'm not a student?</h3>
                <p class="text-gray-600 leading-relaxed">
                    While our events are primarily designed for college students, we welcome alumni, young professionals, and anyone interested in growing in their faith. Some events may have specific age or status requirements, which will be clearly indicated.
                </p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-2">How can I stay updated about upcoming events?</h3>
                <p class="text-gray-600 leading-relaxed">
                    Follow us on social media, subscribe to our newsletter, or check our website regularly. You can also contact your local campus chapter coordinator for event announcements and updates.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Signup Section -->
<section class="py-20 bg-gradient-to-br from-green-600 via-blue-600 to-green-700 relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-6">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span>Stay Updated</span>
        </div>
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
            Never Miss an Event
        </h2>
        <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
            Subscribe to our newsletter and be the first to know about upcoming events, registration deadlines, and special announcements.
        </p>
        <form class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
            <input type="email" placeholder="Enter your email address" class="flex-1 px-6 py-4 bg-white/20 backdrop-blur-sm border-2 border-white/30 rounded-xl text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-white/50">
            <button type="submit" class="px-8 py-4 bg-white text-green-600 rounded-xl font-bold text-lg hover:bg-green-50 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                Subscribe
            </button>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Event Filter Functionality
    const filterButtons = document.querySelectorAll('.event-filter-btn');
    const eventItems = document.querySelectorAll('.event-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => {
                if (btn === this) {
                    btn.classList.remove('bg-gray-200', 'text-gray-700');
                    btn.classList.add('bg-gradient-to-r', 'from-green-600', 'to-blue-600', 'text-white');
                } else {
                    btn.classList.remove('bg-gradient-to-r', 'from-green-600', 'to-blue-600', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                }
            });
            
            // Filter events
            eventItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // View Toggle Functionality (List/Calendar)
    const viewToggleButtons = document.querySelectorAll('.view-toggle-btn');
    const listView = document.getElementById('events-container').closest('section');
    const calendarView = document.getElementById('calendar-view');
    
    viewToggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const view = this.getAttribute('data-view');
            
            // Update active button
            viewToggleButtons.forEach(btn => {
                if (btn === this) {
                    btn.classList.remove('bg-gray-200', 'text-gray-700');
                    btn.classList.add('bg-gradient-to-r', 'from-green-600', 'to-blue-600', 'text-white');
                } else {
                    btn.classList.remove('bg-gradient-to-r', 'from-green-600', 'to-blue-600', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                }
            });
            
            // Toggle views
            if (view === 'calendar') {
                listView.classList.add('hidden');
                calendarView.classList.remove('hidden');
                renderCalendar();
            } else {
                listView.classList.remove('hidden');
                calendarView.classList.add('hidden');
            }
        });
    });

    // Calendar Functionality
    let currentDate = new Date();
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    
    // Event data for calendar
    const events = [
        { date: new Date(2026, 0, 25), title: 'Night of Praise', category: 'worship', color: 'bg-blue-500' },
        { date: new Date(2026, 1, 10), title: 'Regional Spiritual Camp', category: 'retreat', color: 'bg-purple-500' },
        { date: new Date(2026, 2, 1), title: 'Saturday Prayer Retreat', category: 'retreat', color: 'bg-green-500' },
        { date: new Date(2026, 2, 15), title: 'Open Gate Camp', category: 'conference', color: 'bg-orange-500' },
        { date: new Date(2026, 3, 5), title: 'Perfect Vision', category: 'conference', color: 'bg-indigo-500' },
        { date: new Date(2026, 4, 20), title: 'Usiku wa Sifa', category: 'worship', color: 'bg-yellow-500' },
        { date: new Date(2026, 5, 10), title: 'NexGen Camp', category: 'training', color: 'bg-teal-500' },
    ];

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        
        // Update month/year display
        document.getElementById('calendar-month-year').textContent = `${monthNames[month]} ${year}`;
        
        // Get first day of month and number of days
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        
        // Clear calendar
        const calendarDays = document.getElementById('calendar-days');
        calendarDays.innerHTML = '';
        
        // Add empty cells for days before month starts
        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'p-2 min-h-[80px] bg-gray-50';
            calendarDays.appendChild(emptyCell);
        }
        
        // Add days of month
        for (let day = 1; day <= daysInMonth; day++) {
            const dayCell = document.createElement('div');
            dayCell.className = 'p-2 min-h-[80px] bg-white border border-gray-200 hover:bg-gray-50 transition';
            
            const dayNumber = document.createElement('div');
            dayNumber.className = 'font-bold text-gray-900 mb-1';
            dayNumber.textContent = day;
            dayCell.appendChild(dayNumber);
            
            // Add events for this day
            const dayEvents = events.filter(event => {
                return event.date.getFullYear() === year &&
                       event.date.getMonth() === month &&
                       event.date.getDate() === day;
            });
            
            dayEvents.forEach(event => {
                const eventDot = document.createElement('div');
                eventDot.className = `${event.color} text-white text-xs px-2 py-1 rounded mb-1 truncate cursor-pointer hover:opacity-80 transition`;
                eventDot.textContent = event.title;
                eventDot.title = event.title;
                dayCell.appendChild(eventDot);
            });
            
            calendarDays.appendChild(dayCell);
        }
    }

    // Calendar navigation
    document.getElementById('prev-month')?.addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    document.getElementById('next-month')?.addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });
});
</script>
@endpush
