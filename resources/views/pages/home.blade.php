@extends('layouts.app')

@section('title', 'Home - ICCR Tanzania')
@section('description', 'Inter-Colleges Catholic Charismatic Renewal Tanzania - Uniting Catholic students through the Holy Spirit')

@section('content')
<!-- Hero Carousel Section -->
<section class="relative min-h-[70vh] h-[70vh] max-h-[900px] overflow-hidden">
    <!-- Carousel Container -->
    <div id="heroCarousel" class="relative h-full w-full">
        @php
            use App\Models\Setting;
            use App\Models\CarouselSlide;
            $slides = CarouselSlide::where('is_active', true)->orderBy('order')->orderBy('created_at', 'asc')->get();
        @endphp
        
        @forelse($slides as $index => $slide)
        <div class="carousel-slide {{ $slide->animation_type }} absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
            @php
                // Convert Tailwind color classes to RGB values for inline styles
                $gradientColors = [
                    'green-600' => 'rgb(22, 163, 74)',
                    'blue-600' => 'rgb(37, 99, 235)',
                    'green-800' => 'rgb(22, 101, 52)',
                    'red-600' => 'rgb(220, 38, 38)',
                    'purple-600' => 'rgb(147, 51, 234)',
                    'red-800' => 'rgb(153, 27, 27)',
                ];
                $fromColor = $gradientColors[$slide->gradient_from] ?? $gradientColors['green-600'];
                $viaColor = $gradientColors[$slide->gradient_via] ?? $gradientColors['blue-600'];
                $toColor = $gradientColors[$slide->gradient_to] ?? $gradientColors['green-800'];
            @endphp
            <div class="relative h-full" style="background: linear-gradient(to bottom right, {{ $fromColor }}, {{ $viaColor }}, {{ $toColor }});">
                <div class="absolute inset-0 bg-black {{ $slide->is_urgent ? 'opacity-30' : 'opacity-40' }}"></div>
                <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 flex items-center justify-center py-8 md:py-12">
                    <div class="text-center text-white px-4 sm:px-6 lg:px-8 z-10 max-w-5xl w-full">
                        @if($slide->is_urgent && $slide->urgent_badge_text)
                        <div class="inline-block mb-4 px-4 py-2 bg-red-600 rounded-full animate-pulse">
                            <span class="text-sm md:text-base font-bold">{{ $slide->urgent_badge_text }}</span>
                        </div>
                        @endif
                        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-6xl font-bold mb-3 md:mb-4 drop-shadow-lg leading-tight {{ $slide->is_urgent ? '' : 'whitespace-nowrap' }}">
                            {{ $slide->title }}
                        </h1>
                        @if($slide->subtitle)
                        <p class="text-lg sm:text-xl md:text-2xl lg:text-3xl mb-4 md:mb-6 {{ $slide->is_urgent ? 'text-yellow-200' : 'text-blue-100' }} drop-shadow-md font-semibold px-4">
                            {{ $slide->subtitle }}
                        </p>
                        @endif
                        @if($slide->description)
                        <p class="text-base sm:text-lg md:text-xl mb-6 md:mb-8 text-white drop-shadow-md px-4 max-w-4xl mx-auto leading-relaxed">
                            {{ $slide->description }}
                        </p>
                        @endif
                        @if($slide->button_1_text || $slide->button_2_text)
                        <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center items-center mb-8 sm:mb-12 md:mb-16 relative z-10">
                            @if($slide->button_1_text)
                            <a href="{{ $slide->button_1_url ?? '#' }}" class="inline-block {{ $slide->is_urgent ? 'bg-yellow-500 text-red-900 hover:bg-yellow-400 border-2 border-yellow-300' : 'bg-white text-green-600 hover:bg-green-50 border-2 border-transparent hover:border-green-200' }} px-4 md:px-6 py-2 md:py-3 rounded-lg font-semibold text-sm md:text-base transition shadow-lg hover:shadow-xl transform hover:scale-105 min-w-[140px] text-center">
                                {{ $slide->button_1_text }}
                            </a>
                            @endif
                            @if($slide->button_2_text)
                            <a href="{{ $slide->button_2_url ?? '#' }}" class="inline-block {{ $slide->is_urgent ? 'bg-white text-red-600 hover:bg-red-50 border-2 border-white' : 'bg-green-700 text-white hover:bg-green-800 border-2 border-white hover:border-green-300' }} px-4 md:px-6 py-2 md:py-3 rounded-lg font-semibold text-sm md:text-base transition shadow-lg hover:shadow-xl transform hover:scale-105 min-w-[140px] text-center">
                                {{ $slide->button_2_text }}
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Default slide if no slides exist -->
        <div class="carousel-slide slide-fade absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100">
            <div class="relative h-full bg-gradient-to-br from-green-600 via-blue-600 to-green-800">
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div class="absolute inset-0 flex items-center justify-center py-8 md:py-12">
                    <div class="text-center text-white px-4 sm:px-6 lg:px-8 z-10 max-w-5xl w-full">
                        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4 drop-shadow-lg leading-tight">
                            Welcome to ICCR Tanzania
                        </h1>
                        <p class="text-base sm:text-lg md:text-xl lg:text-2xl mb-4 md:mb-6 text-blue-100 drop-shadow-md px-4 leading-relaxed">
                            Uniting Catholic students across Tanzania<br>
                            through the Holy Spirit in prayer, worship, and fellowship
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Carousel Navigation Arrows -->
    <button id="prevBtn" class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 z-50 bg-white/30 hover:bg-white/40 text-white p-3 sm:p-4 rounded-full transition-all duration-300 backdrop-blur-md border-2 border-white/50 hover:border-white/70 shadow-2xl hover:shadow-2xl pointer-events-auto hover:scale-110" aria-label="Previous slide" style="z-index: 50 !important;">
        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button id="nextBtn" class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 z-50 bg-white/30 hover:bg-white/40 text-white p-3 sm:p-4 rounded-full transition-all duration-300 backdrop-blur-md border-2 border-white/50 hover:border-white/70 shadow-2xl hover:shadow-2xl pointer-events-auto hover:scale-110" aria-label="Next slide" style="z-index: 50 !important;">
        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    <!-- Carousel Indicators -->
    @if($slides->count() > 0)
    <div class="absolute bottom-6 sm:bottom-8 md:bottom-12 left-1/2 transform -translate-x-1/2 z-50 flex items-center justify-center space-x-2 sm:space-x-3 px-4 py-2.5 bg-black/50 backdrop-blur-md rounded-full pointer-events-auto shadow-2xl" style="z-index: 50 !important;">
        @foreach($slides as $index => $slide)
        <button class="carousel-indicator transition-all duration-300 focus:outline-none {{ $index === 0 ? 'text-white scale-125 opacity-100' : 'text-white/60 hover:text-white/90 scale-100 opacity-80' }} shadow-sm cursor-pointer px-1" data-slide="{{ $index }}" aria-label="Go to slide {{ $index + 1 }}" title="Slide {{ $index + 1 }}">
            <svg class="w-3 h-3 sm:w-4 sm:h-4 drop-shadow-md" fill="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
            </svg>
        </button>
        @endforeach
    </div>
    @endif
</section>


<!-- Welcome Section - Advanced Design -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side - Main Content -->
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <span>Welcome to Our Community</span>
                </div>
                
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                    Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">ICCR Tanzania</span>
                </h2>
                
                <div class="space-y-4 text-lg text-gray-700 leading-relaxed">
                    <p class="text-xl font-medium text-gray-800">
                        Welcome to the Inter-Colleges Catholic Charismatic Renewal Tanzania (ICCR).
                    </p>
                    <p>
                        We unite students from colleges and higher education institutions in spiritual life through the Charismatic Renewal movement.
                    </p>
                </div>
                
                <div class="pt-4">
                    <a href="{{ route('about') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                        <span>Learn More About Us</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Right Side - Feature Cards -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 hover:shadow-xl transition hover:border-blue-200 group">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">View Our Events</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Discover upcoming spiritual gatherings, retreats, and conferences across Tanzania.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 hover:shadow-xl transition hover:border-purple-200 group">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Join Campus Chapters</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Connect with your local chapter and become part of our vibrant community.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 hover:shadow-xl transition hover:border-green-200 group">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Spiritual Services</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Participate in prayer meetings, Bible studies, and spiritual formation programs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Stats Section -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-white rounded-xl shadow-md border-2 border-gray-100 hover:shadow-lg transition">
                <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">50+</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Campus Chapters</div>
            </div>
            <div class="text-center p-6 bg-white rounded-xl shadow-md border-2 border-gray-100 hover:shadow-lg transition">
                <div class="text-3xl md:text-4xl font-bold text-purple-600 mb-2">1000+</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Active Members</div>
            </div>
            <div class="text-center p-6 bg-white rounded-xl shadow-md border-2 border-gray-100 hover:shadow-lg transition">
                <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">20+</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Events Yearly</div>
            </div>
            <div class="text-center p-6 bg-white rounded-xl shadow-md border-2 border-gray-100 hover:shadow-lg transition">
                <div class="text-3xl md:text-4xl font-bold text-indigo-600 mb-2">6</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Regions</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Events Section - Advanced Design -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-20 right-10 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Upcoming Events</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Featured <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Events</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Join us for these upcoming spiritual gatherings
            </p>
        </div>
        
        <!-- Events Slider Container -->
        <div class="relative">
            <!-- Slider Wrapper -->
            <div class="events-slider-container overflow-hidden relative">
                <div id="events-slider-track" class="flex transition-transform duration-500 ease-in-out">
                    @forelse($featuredEvents as $index => $event)
                    @php
                        $colors = [
                            ['from-green-500', 'via-green-600', 'to-blue-600', 'text-green-600', 'bg-green-600', 'hover:bg-green-700', 'border-green-300'],
                            ['from-blue-500', 'via-blue-600', 'to-indigo-600', 'text-blue-600', 'bg-blue-600', 'hover:bg-blue-700', 'border-blue-300'],
                            ['from-yellow-500', 'via-orange-600', 'to-yellow-600', 'text-yellow-600', 'bg-yellow-600', 'hover:bg-yellow-700', 'border-yellow-300'],
                            ['from-teal-500', 'via-cyan-600', 'to-teal-600', 'text-teal-600', 'bg-teal-600', 'hover:bg-teal-700', 'border-teal-300'],
                            ['from-purple-500', 'via-pink-600', 'to-purple-600', 'text-purple-600', 'bg-purple-600', 'hover:bg-purple-700', 'border-purple-300'],
                            ['from-orange-500', 'via-red-600', 'to-orange-600', 'text-orange-600', 'bg-orange-600', 'hover:bg-orange-700', 'border-orange-300'],
                        ];
                        $colorSet = $colors[$index % count($colors)];
                    @endphp
                    <div class="events-slide flex-shrink-0 w-full md:w-1/2 lg:w-1/3 px-3">
                        @php
                            $gradientColors = [
                                ['from' => '#10b981', 'to' => '#3b82f6'],
                                ['from' => '#3b82f6', 'to' => '#6366f1'],
                                ['from' => '#f59e0b', 'to' => '#f97316'],
                                ['from' => '#14b8a6', 'to' => '#06b6d4'],
                                ['from' => '#a855f7', 'to' => '#ec4899'],
                                ['from' => '#f97316', 'to' => '#ef4444'],
                            ];
                            $gradient = $gradientColors[$index % count($gradientColors)];
                            $textColor = $index % 2 == 0 ? '#10b981' : '#3b82f6';
                            $bgColor = $index % 2 == 0 ? '#10b981' : '#3b82f6';
                        @endphp
                        <div class="group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 h-full">
                            <div class="relative h-48 overflow-hidden" style="background: linear-gradient(to bottom right, {{ $gradient['from'] }}, {{ $gradient['to'] }});">
                                @if($event->banner_image)
                                    <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-full h-full object-cover object-center">
                                @endif
                                <div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-30 transition"></div>
                                <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold">{{ ucfirst($event->status) }}</div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
                                    <div class="text-5xl font-bold mb-1 drop-shadow-lg">{{ $event->start_date->format('d') }}</div>
                                    <div class="text-lg font-semibold drop-shadow-md">{{ $event->start_date->format('F Y') }}</div>
                        </div>
                                <div class="absolute bottom-0 left-0 right-0 h-16" style="background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);"></div>
                    </div>
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-2">
                                    @if($event->location)
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" style="color: {{ $textColor }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span class="text-xs text-gray-500 font-medium">{{ $event->location }}</span>
                                    </div>
                                    @endif
                                    <div class="flex items-center gap-1" style="color: {{ $textColor }};">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="text-xs font-semibold">{{ $event->start_date->format('M d') }}</span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2 transition leading-tight">{{ $event->title }}</h3>
                                <p class="text-xs text-gray-600 mb-3 leading-relaxed line-clamp-2">{{ $event->description ?: \Illuminate\Support\Str::limit(strip_tags($event->content ?? ''), 100) }}</p>
                                <a href="{{ route('events') }}" class="inline-flex items-center gap-1 px-3 py-2 text-white rounded-lg text-xs font-semibold transition shadow-md hover:shadow-lg w-full justify-center" style="background-color: {{ $bgColor }};">
                                    <span>Learn More</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                </div>
                    @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-600 text-lg">No featured events at the moment. Check back soon!</p>
                                </div>
                    @endforelse
                </div>
                    </div>
                    
            <!-- Navigation Arrows -->
            <button id="events-slider-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-8 z-10 w-12 h-12 bg-white rounded-full shadow-xl flex items-center justify-center hover:bg-gray-50 transition border-2 border-gray-200 hover:border-green-500">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="events-slider-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-8 z-10 w-12 h-12 bg-white rounded-full shadow-xl flex items-center justify-center hover:bg-gray-50 transition border-2 border-gray-200 hover:border-green-500">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <!-- Slider Dots -->
            <div id="events-slider-dots" class="flex justify-center gap-2 mt-8">
                <!-- Dots will be generated by JavaScript -->
            </div>
        </div>
                    
        <!-- View All Events Button -->
        <div class="text-center mt-12">
            <a href="{{ route('events') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-xl font-bold text-lg hover:from-green-700 hover:to-blue-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105 border-2 border-transparent hover:border-white/20">
                <span>View All Events</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Ministries & Programs Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-green-100 to-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <span>Our Ministries</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Ministries & Programs</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Discover the various ways we serve and grow together in faith
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="group bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6 shadow-lg border-2 border-blue-100 hover:shadow-2xl hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition">Prayer Ministry</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Weekly prayer meetings and intercessory prayer groups</p>
            </div>

            <div class="group bg-gradient-to-br from-purple-50 to-white rounded-2xl p-6 shadow-lg border-2 border-purple-100 hover:shadow-2xl hover:border-purple-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition">Worship Ministry</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Praise and worship teams leading in spirit-filled gatherings</p>
            </div>

            <div class="group bg-gradient-to-br from-green-50 to-white rounded-2xl p-6 shadow-lg border-2 border-green-100 hover:shadow-2xl hover:border-green-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-600 transition">Evangelization</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Sharing the Gospel and reaching out to fellow students</p>
            </div>

            <div class="group bg-gradient-to-br from-orange-50 to-white rounded-2xl p-6 shadow-lg border-2 border-orange-100 hover:shadow-2xl hover:border-orange-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition">Community Service</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Serving our communities through acts of love and compassion</p>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('ministries') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-xl font-bold text-lg hover:from-green-700 hover:to-blue-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                <span>Explore All Ministries</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>
                </div>
</section>

<!-- Campus Chapters Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-purple-50 relative overflow-hidden">
    <div class="absolute top-20 left-10 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 right-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>Campus Chapters</span>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    Find Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Campus Chapter</span>
                </h2>
                <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                    With over 50 campus chapters across Tanzania, there's a community near you. Each chapter provides a space for prayer, fellowship, and spiritual growth tailored to your campus environment.
                </p>
                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-1">Weekly Meetings</h3>
                            <p class="text-gray-600">Regular prayer and fellowship gatherings on your campus</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-1">Leadership Opportunities</h3>
                            <p class="text-gray-600">Develop your leadership skills through chapter leadership roles</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-1">Regional Events</h3>
                            <p class="text-gray-600">Connect with other chapters at regional gatherings and conferences</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('ministries') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                    <span>Find Your Chapter</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <div class="relative">
                <div class="bg-white rounded-2xl p-8 shadow-2xl border-2 border-indigo-100">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center p-6 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-xl">
                            <div class="text-4xl font-bold text-indigo-700 mb-2">50+</div>
                            <div class="text-sm font-semibold text-indigo-800">Campus Chapters</div>
                        </div>
                        <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl">
                            <div class="text-4xl font-bold text-purple-700 mb-2">6</div>
                            <div class="text-sm font-semibold text-purple-800">Regions</div>
                    </div>
                        <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl">
                            <div class="text-4xl font-bold text-blue-700 mb-2">1000+</div>
                            <div class="text-sm font-semibold text-blue-800">Active Members</div>
                </div>
                        <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-xl">
                            <div class="text-4xl font-bold text-green-700 mb-2">20+</div>
                            <div class="text-sm font-semibold text-green-800">Events/Year</div>
                        </div>
                    </div>
                </div>
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
                What Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-orange-600">Members Say</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Stories of transformation and growth from our community
            </p>
                    </div>
                    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl transition-all duration-300">
                <div class="flex items-center gap-1 mb-4 text-yellow-400">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">
                    "ICCR has transformed my spiritual life. The prayer meetings and fellowship have deepened my relationship with God and connected me with amazing brothers and sisters in faith."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                        JM
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">John Mwangi</div>
                        <div class="text-sm text-gray-600">University of Dar es Salaam</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl transition-all duration-300">
                <div class="flex items-center gap-1 mb-4 text-yellow-400">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">
                    "Being part of this community has given me purpose and direction. The leadership training and spiritual formation have equipped me to serve others with love and compassion."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center text-white font-bold">
                        SK
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Sarah Kimario</div>
                        <div class="text-sm text-gray-600">Dodoma University</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl transition-all duration-300">
                <div class="flex items-center gap-1 mb-4 text-yellow-400">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">
                    "The retreats and spiritual camps have been life-changing. I've learned so much about prayer, worship, and living out my faith in practical ways. This community is truly a blessing."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                        PM
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Peter Mwambene</div>
                        <div class="text-sm text-gray-600">Mwanza University</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News & Updates Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-green-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <span>News & Updates</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Recent <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">News</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Stay updated with our latest announcements and stories
            </p>
        </div>
        
        <!-- News Grid - Display All Items -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $news = [
                    ['title' => 'Open Gate Camp Success', 'date' => 'March 20, 2025', 'category' => 'Events', 'excerpt' => 'Over 200 students gathered for the Open Gate Camp in Moshi & Arusha, experiencing powerful worship and spiritual growth.', 'image' => '01.jpg'],
                    ['title' => 'New Campus Chapter Launched', 'date' => 'March 15, 2025', 'category' => 'Campus', 'excerpt' => 'We\'re excited to announce the launch of our new campus chapter at Arusha University, bringing our total to 51 chapters.', 'image' => '02.jpg'],
                    ['title' => 'Perfect Vision Event Announced', 'date' => 'March 5, 2025', 'category' => 'Events', 'excerpt' => 'Save the date! Perfect Vision event is coming to Mbeya on April 22, 2025. Registration opens soon.', 'image' => '03.jpg'],
                    ['title' => 'Leadership Training Program', 'date' => 'March 10, 2025', 'category' => 'Programs', 'excerpt' => 'Applications are now open for our annual leadership training program. Develop your leadership skills and serve your community.', 'image' => '04.jpg'],
                    ['title' => 'Usiku wa Sifa Recording Released', 'date' => 'February 28, 2025', 'category' => 'Media', 'excerpt' => 'Watch the full recording of our powerful Night of Praise event from Dar es Salaam. Available now on YouTube.', 'image' => '05.jpg'],
                    ['title' => 'Media Team Recruitment', 'date' => 'February 25, 2025', 'category' => 'Opportunities', 'excerpt' => 'We\'re looking for talented photographers and videographers to join our media team. Apply now!', 'image' => '06.jpg'],
                    ['title' => 'Annual Report Released', 'date' => 'February 20, 2025', 'category' => 'Resources', 'excerpt' => 'Our 2024 annual report is now available. Read about our achievements and impact across Tanzania.', 'image' => '07.jpg'],
                    ['title' => 'Regional Conference Success', 'date' => 'February 15, 2025', 'category' => 'Events', 'excerpt' => 'Regional conference brought together over 500 students from across Tanzania for worship and fellowship.', 'image' => '08.jpg'],
                    ['title' => 'Prayer Retreat Highlights', 'date' => 'February 10, 2025', 'category' => 'Retreats', 'excerpt' => 'Highlights from our recent prayer retreat are now available. Experience the powerful moments of worship and prayer.', 'image' => '09.jpg'],
                ];
            @endphp
            
            @foreach($news as $index => $item)
            <div class="group bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-green-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-48 bg-gradient-to-br from-green-500 via-blue-500 to-green-600 overflow-hidden">
                    <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-semibold text-green-600">{{ $item['category'] }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        <span>{{ $item['date'] }}</span>
                        </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition">{{ $item['title'] }}</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">{{ $item['excerpt'] }}</p>
                    <a href="{{ route('media') }}" class="inline-flex items-center gap-2 text-green-600 hover:text-green-700 font-semibold text-sm">
                        <span>Read More</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('media') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-xl font-bold text-lg hover:from-green-700 hover:to-blue-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                <span>View All News</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>
                </div>
</section>

<!-- Video Gallery Slider Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-green-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-red-100 text-red-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
                <span>Video Gallery</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Featured <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Videos</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Watch our latest worship sessions, events, and ministry content
            </p>
        </div>
        
        <!-- Video Slider Container -->
        <div class="relative">
            <div id="video-slider" class="overflow-hidden">
                <div id="video-slider-track" class="flex transition-transform duration-500 ease-in-out" style="transform: translateX(0px);">
                    @if(isset($home_videos) && count($home_videos) > 0)
                        @foreach($home_videos as $video)
                        <div class="video-slide flex-shrink-0 w-full md:w-1/2 lg:w-1/3 px-4">
                            <div class="group bg-white rounded-xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-2xl hover:border-green-300 transition-all duration-300">
                                <div class="relative aspect-video bg-black">
                                    <iframe 
                                        class="w-full h-full" 
                                        src="https://www.youtube.com/embed/{{ $video['video_id'] }}?rel=0&modestbranding=1" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen
                                        loading="lazy">
                                    </iframe>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-base font-bold text-gray-900 mb-1 group-hover:text-green-600 transition line-clamp-2">{{ $video['title'] ?? 'Video' }}</h3>
                                    <p class="text-xs text-gray-600 line-clamp-2">{{ $video['description'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Placeholder videos if none available -->
                        @for($i = 0; $i < 6; $i++)
                        <div class="video-slide flex-shrink-0 w-full md:w-1/2 lg:w-1/3 px-4">
                            <div class="group bg-white rounded-xl shadow-lg border-2 border-gray-100 overflow-hidden">
                                <div class="relative aspect-video bg-gradient-to-br from-green-600 to-blue-600">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-base font-bold text-gray-900 mb-1">Video Coming Soon</h3>
                                    <p class="text-xs text-gray-600">Check back soon for new content</p>
                                </div>
                            </div>
                        </div>
                        @endfor
                    @endif
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <button id="video-slider-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-white rounded-full p-3 shadow-lg hover:shadow-xl transition z-10 border-2 border-gray-200 hover:border-green-500">
                <svg class="w-6 h-6 text-gray-700 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="video-slider-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-white rounded-full p-3 shadow-lg hover:shadow-xl transition z-10 border-2 border-gray-200 hover:border-green-500">
                <svg class="w-6 h-6 text-gray-700 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
        
        <!-- Dots Indicator -->
        <div id="video-slider-dots" class="flex justify-center gap-2 mt-8">
            <!-- Dots will be generated by JavaScript -->
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('media') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-xl font-bold text-lg hover:from-green-700 hover:to-blue-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                <span>View All Videos</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Quick Links Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <a href="{{ route('get-involved') }}" class="group bg-gradient-to-br from-blue-50 to-purple-50 rounded-lg p-8 hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-green-600 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Join Us</h3>
                <p class="text-gray-600">Become part of our community and grow in faith together</p>
            </a>

            <a href="{{ route('events') }}" class="group bg-gradient-to-br from-purple-50 to-pink-50 rounded-lg p-8 hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Recent Events</h3>
                <p class="text-gray-600">Stay updated with our latest spiritual gatherings and activities</p>
            </a>

            <a href="{{ route('ministries') }}" class="group bg-gradient-to-br from-green-50 to-blue-50 rounded-lg p-8 hover:shadow-lg transition">
                <div class="w-16 h-16 bg-green-600 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Campus Chapters</h3>
                <p class="text-gray-600">Find your campus chapter and connect with fellow students</p>
            </a>
        </div>
    </div>
</section>

<!-- Sponsors Section - Moving Animation -->
<section class="py-16 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span>Our Partners & Sponsors</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Partners</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                We are grateful for the support of our partners and sponsors
            </p>
        </div>
        
        <!-- Moving Sponsors Container -->
        <div class="relative overflow-hidden">
            <div class="sponsors-track flex gap-8 items-center">
                <!-- First set of sponsors -->
                <div class="sponsors-slide flex gap-8 items-center flex-shrink-0">
                    @php
                        $sponsors = [
                            [
                                'name' => 'Catholic Diocese of Dar es Salaam',
                                'icon' => 'church'
                            ],
                            [
                                'name' => 'Tanzania Episcopal Conference',
                                'icon' => 'users'
                            ],
                            [
                                'name' => 'Catholic Charismatic Renewal Tanzania',
                                'icon' => 'sparkles'
                            ],
                            [
                                'name' => 'University of Dar es Salaam',
                                'icon' => 'academic-cap'
                            ],
                            [
                                'name' => 'St. Joseph University',
                                'icon' => 'academic-cap'
                            ],
                            [
                                'name' => 'Tumaini University',
                                'icon' => 'academic-cap'
                            ],
                            [
                                'name' => 'Marian University',
                                'icon' => 'academic-cap'
                            ],
                            [
                                'name' => 'St. Augustine University',
                                'icon' => 'academic-cap'
                            ],
                        ];
                        
                        $iconPaths = [
                            'church' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                            'users' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                            'sparkles' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z',
                            'academic-cap' => 'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z'
                        ];
                    @endphp
                    
                    @foreach($sponsors as $index => $sponsor)
                    <div class="sponsor-item flex-shrink-0 w-48 h-32 bg-white rounded-xl shadow-md border-2 border-gray-100 hover:shadow-xl hover:border-green-300 transition-all duration-300 flex items-center justify-center p-4">
                        <div class="text-center w-full">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-500 rounded-xl flex items-center justify-center mb-3 mx-auto hover:scale-110 transition">
                                @if($sponsor['icon'] === 'church')
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                @elseif($sponsor['icon'] === 'users')
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                @elseif($sponsor['icon'] === 'sparkles')
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                @elseif($sponsor['icon'] === 'academic-cap')
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                    </svg>
                                @endif
                            </div>
                            <p class="text-xs font-semibold text-gray-700 line-clamp-2 leading-tight">{{ $sponsor['name'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Duplicate set for seamless loop -->
                <div class="sponsors-slide flex gap-8 items-center flex-shrink-0" aria-hidden="true">
                    @foreach($sponsors as $index => $sponsor)
                    <div class="sponsor-item flex-shrink-0 w-48 h-32 bg-white rounded-xl shadow-md border-2 border-gray-100 hover:shadow-xl hover:border-green-300 transition-all duration-300 flex items-center justify-center p-4">
                        <div class="text-center w-full">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-500 rounded-xl flex items-center justify-center mb-3 mx-auto hover:scale-110 transition">
                                @if($sponsor['icon'] === 'church')
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                @elseif($sponsor['icon'] === 'users')
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                @elseif($sponsor['icon'] === 'sparkles')
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                @elseif($sponsor['icon'] === 'academic-cap')
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                    </svg>
                                @endif
                            </div>
                            <p class="text-xs font-semibold text-gray-700 line-clamp-2 leading-tight">{{ $sponsor['name'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<style>
    /* Sponsors Moving Animation */
    .sponsors-track {
        animation: scrollSponsors 30s linear infinite;
        width: fit-content;
    }
    
    @keyframes scrollSponsors {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }
    
    .sponsors-track:hover {
        animation-play-state: paused;
    }
    
    /* Animation styles for different slide movements */
    .slide-fade {
        animation: fadeIn 1s ease-in-out;
    }
    
    .slide-left {
        animation: slideFromLeft 1s ease-in-out;
    }
    
    .slide-right {
        animation: slideFromRight 1s ease-in-out;
    }
    
    .slide-zoom {
        animation: zoomIn 1s ease-in-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    @keyframes slideFromLeft {
        from {
            opacity: 0;
            transform: translateX(-100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideFromRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes zoomIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .carousel-slide {
        transition: opacity 1s ease-in-out, transform 1s ease-in-out;
        z-index: 1;
    }
    
    .carousel-slide.opacity-0 {
        opacity: 0;
        pointer-events: none;
        z-index: 1;
    }
    
    .carousel-slide.opacity-100 {
        opacity: 1;
        pointer-events: auto;
        z-index: 10;
    }
    
    /* Ensure navigation buttons are always visible */
    #prevBtn, #nextBtn {
        z-index: 50 !important;
        position: absolute !important;
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    /* Ensure indicators are always visible */
    .carousel-indicator {
        display: block !important;
        visibility: visible !important;
        min-width: 16px !important;
        min-height: 16px !important;
    }
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-indicator');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentSlide = 0;
    let autoSlideInterval;

    function showSlide(index) {
        // Hide all slides and reset animations
        slides.forEach((slide, i) => {
            if (i === index) {
                // Show current slide with animation
                slide.style.opacity = '1';
                slide.style.zIndex = '10';
                slide.style.pointerEvents = 'auto';
                
                // Trigger animation by removing and re-adding animation class
                const animationClass = slide.classList[1]; // Get the animation class (slide-fade, slide-left, etc.)
                slide.classList.remove(animationClass);
                void slide.offsetWidth; // Force reflow
                slide.classList.add(animationClass);
            } else {
                // Hide other slides
                slide.style.opacity = '0';
                slide.style.zIndex = '1';
                slide.style.pointerEvents = 'none';
            }
        });

        // Update indicators - ensure all dots are visible
        indicators.forEach((indicator, i) => {
            // Ensure indicator is visible
            indicator.style.display = 'block';
            indicator.style.visibility = 'visible';
            indicator.style.minWidth = '16px';
            indicator.style.minHeight = '16px';
            
            if (i === index) {
                // Active indicator - fully visible and larger
                indicator.style.opacity = '1';
                indicator.style.transform = 'scale(1.25)';
                indicator.classList.add('text-white');
                indicator.classList.remove('text-white/60');
            } else {
                // Inactive indicators - visible but dimmed
                indicator.style.opacity = '0.7';
                indicator.style.transform = 'scale(1)';
                indicator.classList.add('text-white/60');
                indicator.classList.remove('text-white');
            }
            // Ensure no background/border colors interfere with SVG icons
            indicator.style.backgroundColor = 'transparent';
            indicator.style.borderColor = 'transparent';
            indicator.classList.remove('ring-2', 'ring-white/70', 'active', 'border-white/70');
        });

        currentSlide = index;
    }

    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }

    function prevSlide() {
        const prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    // Ensure buttons are always visible
    if (nextBtn) {
        nextBtn.style.display = 'block';
        nextBtn.style.visibility = 'visible';
        nextBtn.style.opacity = '1';
        nextBtn.style.zIndex = '50';
    nextBtn.addEventListener('click', () => {
        nextSlide();
        stopAutoSlide();
        startAutoSlide();
    });
    }

    if (prevBtn) {
        prevBtn.style.display = 'block';
        prevBtn.style.visibility = 'visible';
        prevBtn.style.opacity = '1';
        prevBtn.style.zIndex = '50';
    prevBtn.addEventListener('click', () => {
        prevSlide();
        stopAutoSlide();
        startAutoSlide();
    });
    }
    
    // Ensure indicators container is visible
    const indicatorsContainer = document.querySelector('.carousel-indicator')?.parentElement;
    if (indicatorsContainer) {
        indicatorsContainer.style.display = 'flex';
        indicatorsContainer.style.visibility = 'visible';
        indicatorsContainer.style.zIndex = '50';
    }

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showSlide(index);
            stopAutoSlide();
            startAutoSlide();
        });
    });

    // Pause on hover
    const carousel = document.getElementById('heroCarousel');
    carousel.addEventListener('mouseenter', stopAutoSlide);
    carousel.addEventListener('mouseleave', startAutoSlide);

    // Start auto-slide
    startAutoSlide();
});

// Video Slider Functionality
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('video-slider-track');
    const prevBtn = document.getElementById('video-slider-prev');
    const nextBtn = document.getElementById('video-slider-next');
    const dotsContainer = document.getElementById('video-slider-dots');
    
    if (!slider || !prevBtn || !nextBtn) return;
    
    const slides = slider.querySelectorAll('.video-slide');
    const totalSlides = slides.length;
    const slidesPerView = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 768 ? 2 : 1;
    const totalPages = Math.ceil(totalSlides / slidesPerView);
    let currentPage = 0;
    
    // Calculate slide width based on viewport
    function getSlideWidth() {
        if (window.innerWidth >= 1024) return 33.333; // 3 slides
        if (window.innerWidth >= 768) return 50; // 2 slides
        return 100; // 1 slide
    }
    
    // Create dots
    for (let i = 0; i < totalPages; i++) {
        const dot = document.createElement('button');
        dot.className = `w-3 h-3 rounded-full transition ${i === 0 ? 'bg-green-600' : 'bg-gray-300'}`;
        dot.addEventListener('click', () => goToPage(i));
        dotsContainer.appendChild(dot);
    }
    
    function updateSlider() {
        const slideWidth = getSlideWidth();
        const translateX = -(currentPage * slideWidth);
        slider.style.transform = `translateX(${translateX}%)`;
        
        // Update dots
        const dots = dotsContainer.querySelectorAll('button');
        dots.forEach((dot, index) => {
            if (index === currentPage) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-green-600');
            } else {
                dot.classList.remove('bg-green-600');
                dot.classList.add('bg-gray-300');
            }
        });
    }
    
    function goToPage(page) {
        if (page < 0) page = totalPages - 1;
        if (page >= totalPages) page = 0;
        currentPage = page;
        updateSlider();
    }
    
    function nextPage() {
        goToPage(currentPage + 1);
    }
    
    function prevPage() {
        goToPage(currentPage - 1);
    }
    
    nextBtn.addEventListener('click', nextPage);
    prevBtn.addEventListener('click', prevPage);
    
    // Auto-play slider
    let autoPlayInterval = setInterval(nextPage, 5000);
    
    // Pause on hover
    const sliderContainer = document.getElementById('video-slider');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
        sliderContainer.addEventListener('mouseleave', () => {
            autoPlayInterval = setInterval(nextPage, 5000);
        });
    }
    
    // Handle window resize
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            currentPage = 0;
            updateSlider();
        }, 250);
    });
    
    // Initialize
    updateSlider();
});

// Sponsors Animation - Ensure continuous scroll
document.addEventListener('DOMContentLoaded', function() {
    const sponsorsTrack = document.querySelector('.sponsors-track');
    if (sponsorsTrack) {
        // The CSS animation handles the movement
        // This ensures it works on all browsers
        sponsorsTrack.style.animation = 'scrollSponsors 30s linear infinite';
    }
});

// Events Slider Functionality
document.addEventListener('DOMContentLoaded', function() {
    const sliderTrack = document.getElementById('events-slider-track');
    const prevBtn = document.getElementById('events-slider-prev');
    const nextBtn = document.getElementById('events-slider-next');
    const dotsContainer = document.getElementById('events-slider-dots');
    
    if (!sliderTrack || !prevBtn || !nextBtn) return;
    
    const slides = sliderTrack.querySelectorAll('.events-slide');
    const totalSlides = slides.length;
    
    // Determine slides per view based on screen size
    function getSlidesPerView() {
        if (window.innerWidth >= 1024) return 3; // lg: 3 slides
        if (window.innerWidth >= 768) return 2;  // md: 2 slides
        return 1; // sm: 1 slide
    }
    
    let slidesPerView = getSlidesPerView();
    let totalPages = Math.ceil(totalSlides / slidesPerView);
    let currentPage = 0;
    
    // Create dots
    function createDots() {
        dotsContainer.innerHTML = '';
        for (let i = 0; i < totalPages; i++) {
            const dot = document.createElement('button');
            dot.className = `w-3 h-3 rounded-full transition-all ${i === 0 ? 'bg-green-600 w-8' : 'bg-gray-300'}`;
            dot.addEventListener('click', () => goToPage(i));
            dotsContainer.appendChild(dot);
        }
    }
    
    // Update slider position
    function updateSlider() {
        const slideWidth = 100 / slidesPerView;
        const translateX = -(currentPage * slideWidth);
        sliderTrack.style.transform = `translateX(${translateX}%)`;
        
        // Update dots
        const dots = dotsContainer.querySelectorAll('button');
        dots.forEach((dot, index) => {
            if (index === currentPage) {
                dot.classList.remove('bg-gray-300', 'w-3');
                dot.classList.add('bg-green-600', 'w-8');
            } else {
                dot.classList.remove('bg-green-600', 'w-8');
                dot.classList.add('bg-gray-300', 'w-3');
            }
        });
    }
    
    // Navigate to specific page
    function goToPage(page) {
        currentPage = Math.max(0, Math.min(page, totalPages - 1));
        updateSlider();
    }
    
    // Next page
    function nextPage() {
        currentPage = (currentPage + 1) % totalPages;
        updateSlider();
    }
    
    // Previous page
    function prevPage() {
        currentPage = (currentPage - 1 + totalPages) % totalPages;
        updateSlider();
    }
    
    // Event listeners
    nextBtn.addEventListener('click', nextPage);
    prevBtn.addEventListener('click', prevPage);
    
    // Auto-play slider
    let autoPlayInterval = setInterval(nextPage, 5000);
    
    // Pause on hover
    const sliderContainer = document.querySelector('.events-slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
        sliderContainer.addEventListener('mouseleave', () => {
            autoPlayInterval = setInterval(nextPage, 5000);
        });
    }
    
    // Handle window resize
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            slidesPerView = getSlidesPerView();
            totalPages = Math.ceil(totalSlides / slidesPerView);
            currentPage = 0;
            createDots();
            updateSlider();
        }, 250);
    });
    
    // Initialize
    createDots();
    updateSlider();
});

</script>
@endpush
@endsection

