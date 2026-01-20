@extends('layouts.app')

@section('title', 'Graduate Community - ICCR Tanzania')
@section('description', 'Join the ICCR Tanzania Graduate Community - A network of Catholic professionals and leaders.')

@section('content')
<!-- Hero Section - Advanced -->
<section class="relative min-h-[60vh] h-[60vh] max-h-[700px] overflow-hidden">
    <div class="relative h-full bg-gradient-to-br from-indigo-900 via-blue-900 to-purple-900">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <!-- Background Image with Blend Mode -->
        <img src="{{ asset('images/11.jpg') }}" alt="ICCR Graduates" class="w-full h-full object-cover object-center mix-blend-overlay opacity-30">
        
        <div class="absolute inset-0 flex items-center justify-center py-8">
            <div class="text-center text-white px-4 sm:px-6 lg:px-8 z-10 max-w-5xl w-full">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full text-sm font-semibold mb-6 border border-white/20 animate-fade-in-up">
                    <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span class="tracking-wide uppercase">ICCR Professional Network</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 drop-shadow-2xl leading-tight">
                    Faith in the <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-orange-300 to-yellow-300">Marketplace</span>
                </h1>
                
                <p class="text-lg sm:text-xl md:text-2xl font-light mb-6 drop-shadow-lg text-blue-100 max-w-2xl mx-auto">
                    Empowering Catholic professionals to lead with integrity, serve with compassion, and transform society through the Gospel.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-5 justify-center items-center mt-8">
                    <a href="#join" class="group bg-white text-indigo-900 px-8 py-4 rounded-xl font-bold text-lg hover:bg-blue-50 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center gap-2">
                        <span>Join the Network</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="#benefits" class="group bg-white/10 backdrop-blur-md border md:border-2 border-white/30 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/20 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                        Explore Benefits
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Decorative Wave -->
    <div class="absolute bottom-0 left-0 right-0 z-20">
        <svg class="w-full h-16 md:h-24 text-gray-50" fill="currentColor" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,100 350,0 600,50 C850,100 1050,0 1200,50 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- Stats Section - Advanced -->
<section class="py-12 bg-gray-50 relative -mt-10 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:divide-x divide-gray-100">
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-indigo-600 mb-2 group-hover:scale-110 transition-transform duration-300">500+</div>
                    <div class="text-sm md:text-base font-semibold text-gray-600 uppercase tracking-wider">Registered Alumni</div>
                </div>
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-purple-600 mb-2 group-hover:scale-110 transition-transform duration-300">20+</div>
                    <div class="text-sm md:text-base font-semibold text-gray-600 uppercase tracking-wider">Industries</div>
                </div>
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2 group-hover:scale-110 transition-transform duration-300">15+</div>
                    <div class="text-sm md:text-base font-semibold text-gray-600 uppercase tracking-wider">Mentorship Pairs</div>
                </div>
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-green-600 mb-2 group-hover:scale-110 transition-transform duration-300">Weekly</div>
                    <div class="text-sm md:text-base font-semibold text-gray-600 uppercase tracking-wider">Networking Events</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Purpose -->
<section class="py-24 bg-white relative overflow-hidden">
    <!-- Background Blobs -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-700 rounded-full text-sm font-bold mb-6 border border-indigo-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Our Purpose</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 mb-6">
                Why Join the <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Graduate Community?</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                To sustain the spiritual fire experienced in college and channel it into impactful Christian leadership in society and the workplace.
            </p>
        </div>

        <div id="benefits" class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
            <!-- Card 1 -->
            <div class="group bg-gradient-to-b from-white to-indigo-50/30 p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 hover:border-indigo-200 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-indigo-700 transition-colors">Professional Networking</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Connect with fellow Catholic professionals across various industries, share opportunities, and build career-enhancing relationships rooted in shared values.
                </p>
                <a href="#" class="inline-flex items-center text-indigo-600 font-bold hover:text-indigo-800 transition-colors">
                    Learn more <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="group bg-gradient-to-b from-white to-purple-50/30 p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 hover:border-purple-200 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-purple-700 transition-colors">Spiritual Resilience</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Access resources and gatherings designed to help you maintain a vibrant spiritual life amidst the challenges and busyness of the professional world.
                </p>
                <a href="#" class="inline-flex items-center text-purple-600 font-bold hover:text-purple-800 transition-colors">
                    View Resources <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="group bg-gradient-to-b from-white to-green-50/30 p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 hover:border-green-200 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-green-700 transition-colors">Impact & Service</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Collaborate on impactful projects that give back to the community, support student chapters, and advance the mission of the Church in Tanzania.
                </p>
                <a href="#" class="inline-flex items-center text-green-600 font-bold hover:text-green-800 transition-colors">
                    Get Involved <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Open Gate Event Section -->
<section class="py-20 bg-gradient-to-br from-indigo-50 via-purple-50 to-blue-50 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border-2 border-indigo-100">
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full text-sm font-bold mb-6 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Recent Event</span>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Open Gate</span> Event
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    A powerful gathering that brought together graduates and students for spiritual renewal, networking, and fellowship.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-2xl p-6 mb-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                                09-12
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-gray-900">January 2025</div>
                                <div class="text-gray-600">4 Days of Transformation</div>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            The Open Gate event was a remarkable experience that opened doors for graduates to reconnect with their spiritual roots, network with fellow professionals, and be equipped for impactful service in their communities.
                        </p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Spiritual renewal sessions</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Professional networking opportunities</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Workshops on faith in the workplace</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Fellowship and community building</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl p-8 text-white shadow-2xl">
                        <h3 class="text-2xl font-bold mb-4">Event Highlights</h3>
                        <div class="space-y-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                                <div class="font-bold text-lg mb-1">Day 1-2: Spiritual Foundation</div>
                                <p class="text-white/90 text-sm">Deep worship, prayer, and teaching sessions to strengthen our spiritual foundation.</p>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                                <div class="font-bold text-lg mb-1">Day 3: Professional Development</div>
                                <p class="text-white/90 text-sm">Workshops on integrating faith with professional life and career growth.</p>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                                <div class="font-bold text-lg mb-1">Day 4: Networking & Commissioning</div>
                                <p class="text-white/90 text-sm">Networking sessions and commissioning service to send graduates into their communities.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section - Advanced -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                </svg>
                <span>Graduate Testimonials</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                What Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-orange-600">Graduates Say</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Stories of transformation, growth, and impact from our graduate community
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $graduateTestimonials = [
                    [
                        'name' => 'Dr. Anna Mwangi',
                        'profession' => 'Medical Doctor',
                        'university' => 'University of Dar es Salaam',
                        'initials' => 'AM',
                        'gradient' => 'from-green-400 to-blue-500',
                        'text' => 'ICCR Graduate Network has been instrumental in helping me maintain my spiritual life while serving in the medical field. The Open Gate event was a powerful reminder of my calling to serve with compassion and faith.',
                        'year' => 'Class of 2018'
                    ],
                    [
                        'name' => 'Eng. John Kimario',
                        'profession' => 'Civil Engineer',
                        'university' => 'Dodoma University',
                        'initials' => 'JK',
                        'gradient' => 'from-blue-400 to-green-500',
                        'text' => 'The networking opportunities through ICCR have opened doors I never imagined. Connecting with fellow Catholic professionals has enriched both my career and spiritual journey. The community support is incredible.',
                        'year' => 'Class of 2019'
                    ],
                    [
                        'name' => 'Dr. Sarah Mwambene',
                        'profession' => 'Lecturer',
                        'university' => 'Mwanza University',
                        'initials' => 'SM',
                        'gradient' => 'from-purple-400 to-pink-500',
                        'text' => 'As an educator, being part of ICCR Graduate Network has helped me integrate my faith into my teaching. The mentorship program connected me with students, and I\'ve seen incredible transformation in their lives.',
                        'year' => 'Class of 2017'
                    ],
                    [
                        'name' => 'Mr. Peter Mwanga',
                        'profession' => 'Business Consultant',
                        'university' => 'Arusha University',
                        'initials' => 'PM',
                        'gradient' => 'from-green-400 to-blue-500',
                        'text' => 'The Open Gate event was life-changing! It rekindled my passion for serving God in the marketplace. The workshops on faith and work have transformed how I approach my business and serve my clients.',
                        'year' => 'Class of 2020'
                    ],
                    [
                        'name' => 'Dr. Grace Kipanga',
                        'profession' => 'Lawyer',
                        'university' => 'Mbeya University',
                        'initials' => 'GK',
                        'gradient' => 'from-blue-400 to-green-500',
                        'text' => 'ICCR has provided a platform where I can be both a professional and a faithful Catholic. The spiritual resilience resources have been crucial in maintaining my faith while navigating the legal profession.',
                        'year' => 'Class of 2019'
                    ],
                    [
                        'name' => 'Eng. David Joseph',
                        'profession' => 'IT Professional',
                        'university' => 'Moshi University',
                        'initials' => 'DJ',
                        'gradient' => 'from-indigo-400 to-purple-500',
                        'text' => 'Joining the graduate network was the best decision after graduation. The community projects have allowed me to use my skills to serve others, and the fellowship has kept me grounded in my faith journey.',
                        'year' => 'Class of 2021'
                    ],
                    [
                        'name' => 'Ms. Mary Mwangi',
                        'profession' => 'Social Worker',
                        'university' => 'University of Dar es Salaam',
                        'initials' => 'MM',
                        'gradient' => 'from-pink-400 to-red-500',
                        'text' => 'The impact and service opportunities through ICCR have aligned perfectly with my career in social work. Working with student chapters has been fulfilling, and I\'ve seen many lives transformed through our collective efforts.',
                        'year' => 'Class of 2018'
                    ],
                ];
            @endphp
            
            @foreach($graduateTestimonials as $testimonial)
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center gap-1 mb-4 text-yellow-400">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">
                    "{{ $testimonial['text'] }}"
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $testimonial['gradient'] }} rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                        {{ $testimonial['initials'] }}
                    </div>
                    <div class="flex-1">
                        <div class="font-bold text-gray-900">{{ $testimonial['name'] }}</div>
                        <div class="text-sm text-gray-600 font-medium">{{ $testimonial['profession'] }}</div>
                        <div class="text-xs text-gray-500">{{ $testimonial['university'] }} • {{ $testimonial['year'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Membership Benefits - Detailed -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold mb-6 border border-indigo-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span>Exclusive Benefits</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                What You Get as a <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Member</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Comprehensive support for your professional and spiritual journey
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Benefit 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:border-indigo-300 hover:shadow-2xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Professional Networking</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-indigo-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Monthly networking events across Tanzania</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-indigo-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Industry-specific professional groups</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-indigo-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Access to exclusive job opportunities</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-indigo-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Career mentorship programs</span>
                    </li>
                </ul>
            </div>

            <!-- Benefit 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:border-purple-300 hover:shadow-2xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Spiritual Resources</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Weekly online prayer sessions</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Monthly spiritual formation workshops</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Access to digital library of resources</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Annual retreats and conferences</span>
                    </li>
                </ul>
            </div>

            <!-- Benefit 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:border-green-300 hover:shadow-2xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Community Impact</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Volunteer opportunities in community projects</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Support student chapters nationwide</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Leadership development programs</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Recognition and awards for service</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- How to Join Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-bold mb-6 border border-green-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                <span>Get Started</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                How to <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Join</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Simple steps to become part of our growing community
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg">1</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Register Online</h3>
                <p class="text-gray-600">Fill out the membership registration form with your details and professional information.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg">2</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Verification</h3>
                <p class="text-gray-600">Our team will verify your graduation details and ICCR membership during college.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg">3</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Welcome Package</h3>
                <p class="text-gray-600">Receive your welcome package with resources, network access, and event calendar.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-yellow-600 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg">4</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Start Connecting</h3>
                <p class="text-gray-600">Attend your first event, join a regional chapter, and begin networking with fellow graduates.</p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="https://wa.me/255123456789?text=I%20want%20to%20join%20Graduate%20Community" target="_blank" class="inline-flex items-center gap-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span>Join via WhatsApp</span>
            </a>
        </div>
    </div>
</section>

<!-- Regional Chapters -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-bold mb-6 border border-blue-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Regional Presence</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Active <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Chapters</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Connect with graduates in your region
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $chapters = [
                    ['name' => 'Dar es Salaam', 'members' => '150+', 'color' => 'from-blue-500 to-cyan-600'],
                    ['name' => 'Arusha', 'members' => '80+', 'color' => 'from-green-500 to-emerald-600'],
                    ['name' => 'Mwanza', 'members' => '95+', 'color' => 'from-purple-500 to-pink-600'],
                    ['name' => 'Dodoma', 'members' => '70+', 'color' => 'from-indigo-500 to-blue-600'],
                    ['name' => 'Mbeya', 'members' => '60+', 'color' => 'from-orange-500 to-red-600'],
                    ['name' => 'Moshi', 'members' => '45+', 'color' => 'from-teal-500 to-cyan-600'],
                ];
            @endphp
            @foreach($chapters as $chapter)
            <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-gray-100 hover:border-blue-300 hover:shadow-2xl transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-900">{{ $chapter['name'] }}</h3>
                    <div class="w-12 h-12 bg-gradient-to-br {{ $chapter['color'] }} rounded-lg flex items-center justify-center text-white font-bold shadow-lg">
                        {{ substr($chapter['name'], 0, 1) }}
                    </div>
                </div>
                <div class="flex items-center gap-2 text-gray-600 mb-4">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="font-semibold">{{ $chapter['members'] }} Members</span>
                </div>
                <p class="text-gray-600 text-sm mb-4">Regular monthly meetings and networking events</p>
                <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors text-sm">
                    Contact Chapter Leader →
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-bold mb-6 border border-yellow-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Common Questions</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-orange-600">Questions</span>
            </h2>
        </div>

        <div class="space-y-6">
            @php
                $faqs = [
                    [
                        'question' => 'Who can join the ICCR Graduate Network?',
                        'answer' => 'Any graduate who was an active member of ICCR during their college years can join. We welcome professionals from all fields and industries who share our Catholic values and commitment to service.'
                    ],
                    [
                        'question' => 'Is there a membership fee?',
                        'answer' => 'No, membership in the ICCR Graduate Network is completely free. We believe in making this community accessible to all graduates regardless of their financial situation.'
                    ],
                    [
                        'question' => 'How often are events held?',
                        'answer' => 'We organize monthly networking events in major cities, quarterly spiritual formation workshops, and annual conferences. Regional chapters also host their own regular gatherings.'
                    ],
                    [
                        'question' => 'Can I join if I live outside Tanzania?',
                        'answer' => 'Yes! We have members across the globe. While most events are in Tanzania, we offer online participation options and have international chapters in development.'
                    ],
                    [
                        'question' => 'What support is available for new graduates?',
                        'answer' => 'New graduates receive mentorship matching, career guidance, access to job opportunities, and integration into regional chapters. We also provide resources for transitioning from student to professional life.'
                    ],
                    [
                        'question' => 'How do I update my contact information?',
                        'answer' => 'You can update your information through our online portal or by contacting your regional chapter leader. Keeping your information current ensures you receive all event invitations and resources.'
                    ],
                ];
            @endphp
            @foreach($faqs as $faq)
            <div class="bg-gray-50 rounded-xl p-6 border-2 border-gray-100 hover:border-indigo-200 transition-all duration-300">
                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-start gap-3">
                    <svg class="w-6 h-6 text-indigo-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ $faq['question'] }}</span>
                </h3>
                <p class="text-gray-600 ml-9 leading-relaxed">{{ $faq['answer'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact/Join CTA -->
<section id="join" class="py-20 bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-600 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Join Our Community?</h2>
        <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
            Connect with us today and become part of a network that's transforming lives and communities across Tanzania.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/255123456789?text=I%20want%20to%20join%20Graduate%20Community" target="_blank" class="bg-white text-indigo-600 px-8 py-4 rounded-xl font-bold text-lg hover:bg-indigo-50 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span>Join via WhatsApp</span>
            </a>
            <a href="{{ route('contact') }}" class="bg-white/10 backdrop-blur-md border-2 border-white/40 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/20 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection

