@extends('layouts.app')

@section('title', 'About Us - ICCR Tanzania')
@section('description', 'Learn about ICCR Tanzania - Our vision, mission, values, history, and leadership team')

@section('content')
<!-- Hero Section - Advanced -->
<section class="relative min-h-[50vh] h-[50vh] max-h-[600px] overflow-hidden">
    <div class="relative h-full bg-gradient-to-br from-green-600 via-blue-600 to-green-700">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="{{ asset('images/11.jpg') }}" alt="ICCR Tanzania Community" class="w-full h-full object-cover object-center">
        <div class="absolute inset-0 flex items-center justify-center py-8">
            <div class="text-center text-white px-4 sm:px-6 lg:px-8 z-10 max-w-5xl w-full">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>About Our Community</span>
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 drop-shadow-2xl leading-tight">
                    About <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">ICCR Tanzania</span>
                </h1>
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold mb-4 drop-shadow-lg">
                    Building a Generation of Faithful Leaders
                </h2>
                <p class="text-sm sm:text-base md:text-lg text-blue-100 mb-6 leading-relaxed max-w-3xl mx-auto drop-shadow-md">
                    Uniting Catholic students across Tanzania through the Charismatic Renewal movement, fostering spiritual growth, genuine love, and evangelizing leadership in colleges and communities.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('get-involved') }}" class="inline-block bg-white text-blue-600 px-6 md:px-8 py-2.5 md:py-3 rounded-lg font-semibold text-sm md:text-base hover:bg-blue-50 transition shadow-xl hover:shadow-2xl transform hover:scale-105 border-2 border-transparent hover:border-blue-200 min-w-[160px] text-center">
                        Join Our Movement
                    </a>
                    <a href="{{ route('contact') }}" class="inline-block bg-transparent text-white border-2 border-white px-6 md:px-8 py-2.5 md:py-3 rounded-lg font-semibold text-sm md:text-base hover:bg-white/10 transition shadow-xl hover:shadow-2xl transform hover:scale-105 min-w-[160px] text-center">
                        Contact Us
                    </a>
                </div>
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

<!-- Quick Stats Section - Advanced -->
<section class="py-16 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="group text-center p-8 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl shadow-lg border-2 border-blue-200 hover:shadow-2xl hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="text-5xl md:text-6xl font-bold text-blue-700 mb-3 group-hover:scale-110 transition">50+</div>
                <div class="text-base md:text-lg text-blue-800 font-bold">Campus Chapters</div>
                <div class="mt-2 text-sm text-blue-600">Across Tanzania</div>
            </div>

            <div class="group text-center p-8 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl shadow-lg border-2 border-purple-200 hover:shadow-2xl hover:border-purple-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="text-5xl md:text-6xl font-bold text-purple-700 mb-3 group-hover:scale-110 transition">1000+</div>
                <div class="text-base md:text-lg text-purple-800 font-bold">Active Members</div>
                <div class="mt-2 text-sm text-purple-600">Growing Community</div>
            </div>

            <div class="group text-center p-8 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl shadow-lg border-2 border-green-200 hover:shadow-2xl hover:border-green-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="text-5xl md:text-6xl font-bold text-green-700 mb-3 group-hover:scale-110 transition">20+</div>
                <div class="text-base md:text-lg text-green-800 font-bold">Annual Events</div>
                <div class="mt-2 text-sm text-green-600">Spiritual Gatherings</div>
            </div>

            <div class="group text-center p-8 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl shadow-lg border-2 border-indigo-200 hover:shadow-2xl hover:border-indigo-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="text-5xl md:text-6xl font-bold text-indigo-700 mb-3 group-hover:scale-110 transition">6</div>
                <div class="text-base md:text-lg text-indigo-800 font-bold">Regions Served</div>
                <div class="mt-2 text-sm text-indigo-600">Nationwide Reach</div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Section - Advanced -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 left-10 w-72 h-72 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <span>Our Vision</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Vision</span>
            </h2>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="bg-white rounded-2xl p-8 shadow-xl border-2 border-gray-100 hover:shadow-2xl transition">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Empowered by the Holy Spirit</h3>
                            <p class="text-lg text-gray-700 leading-relaxed">
                                To build a generation of Catholic students with strong spiritual lives, genuine love, and evangelizing leadership in colleges and communities across Tanzania.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="space-y-6">
                <div class="bg-white rounded-2xl p-8 shadow-xl border-2 border-gray-100 hover:shadow-2xl transition">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">A Future of Faith</h3>
                            <p class="text-lg text-gray-700 leading-relaxed">
                                We envision a future where every Catholic student in Tanzania's higher education institutions is empowered by the Holy Spirit, living out their faith authentically, and leading with integrity and compassion in their academic and personal lives.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section - Advanced -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Our Mission</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Mission</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Our mission is to unite, nurture, develop, and serve—creating a vibrant community of faith-filled leaders.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="group bg-gradient-to-br from-blue-50 to-white p-8 rounded-2xl shadow-lg border-2 border-blue-100 hover:shadow-2xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">Unite Catholic Students</h3>
                        <p class="text-gray-700 leading-relaxed">
                            To unite Catholic students from all colleges and higher education institutions across Tanzania, creating a strong network of faith and fellowship.
                        </p>
                    </div>
                </div>
            </div>

            <div class="group bg-gradient-to-br from-purple-50 to-white p-8 rounded-2xl shadow-lg border-2 border-purple-100 hover:shadow-2xl hover:border-purple-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition">Nurture Spiritual Life</h3>
                        <p class="text-gray-700 leading-relaxed">
                            To grow spiritual life through prayer, worship, and the Charismatic Renewal movement, deepening students' relationship with God.
                        </p>
                    </div>
                </div>
            </div>

            <div class="group bg-gradient-to-br from-green-50 to-white p-8 rounded-2xl shadow-lg border-2 border-green-100 hover:shadow-2xl hover:border-green-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition">Develop Leadership</h3>
                        <p class="text-gray-700 leading-relaxed">
                            To develop leadership, formation, and evangelization within colleges and regions, empowering students to be agents of change.
                        </p>
                    </div>
                </div>
            </div>

            <div class="group bg-gradient-to-br from-orange-50 to-white p-8 rounded-2xl shadow-lg border-2 border-orange-100 hover:shadow-2xl hover:border-orange-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-orange-600 transition">Serve the Community</h3>
                        <p class="text-gray-700 leading-relaxed">
                            To serve the community through social and spiritual services, making a positive impact on society through acts of love and compassion.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values Section - Advanced -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-purple-50 relative overflow-hidden">
    <div class="absolute top-20 left-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 right-10 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
                <span>Our Values</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Our Core <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Values</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                The principles that guide everything we do
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            <div class="group text-center p-8 bg-white rounded-2xl shadow-lg border-2 border-blue-200 hover:shadow-2xl hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition">Unity</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Coming together as one body in Christ</p>
            </div>

            <div class="group text-center p-8 bg-white rounded-2xl shadow-lg border-2 border-red-200 hover:shadow-2xl hover:border-red-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-red-600 transition">Love</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Demonstrating Christ's love through compassion</p>
            </div>

            <div class="group text-center p-8 bg-white rounded-2xl shadow-lg border-2 border-purple-200 hover:shadow-2xl hover:border-purple-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition">Spirit & Renewal</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Embracing the Holy Spirit's work in our lives</p>
            </div>

            <div class="group text-center p-8 bg-white rounded-2xl shadow-lg border-2 border-green-200 hover:shadow-2xl hover:border-green-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-600 transition">Service</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Following Christ's example of humble service</p>
            </div>

            <div class="group text-center p-8 bg-white rounded-2xl shadow-lg border-2 border-yellow-200 hover:shadow-2xl hover:border-yellow-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-yellow-600 transition">Inspiring Leadership</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Empowering leaders who inspire others</p>
            </div>
        </div>
    </div>
</section>

<!-- History Section - Advanced Timeline -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Our Journey</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">History</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                A journey of faith, growth, and transformation across Tanzania's higher education landscape.
            </p>
        </div>
        
        <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-blue-500 via-purple-500 to-green-500 transform md:-translate-x-1/2"></div>
            
            <div class="space-y-12">
                <!-- Timeline Item 1 -->
                <div class="relative flex items-center">
                    <div class="flex-1 md:pr-8 md:text-right">
                        <div class="bg-white rounded-2xl p-8 shadow-xl border-2 border-blue-100 hover:shadow-2xl hover:border-blue-300 transition-all duration-300">
                            <div class="flex items-center gap-4 mb-4 md:justify-end">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">The Beginning</h3>
                            </div>
                            <p class="text-gray-700 leading-relaxed">
                                The Inter-Colleges Catholic Charismatic Renewal Tanzania was established to unite Catholic students who participate in the Charismatic Renewal movement across Tanzania's higher education institutions.
                            </p>
                        </div>
                    </div>
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-green-600 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>
                    <div class="flex-1 md:pl-8 hidden md:block"></div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="relative flex items-center">
                    <div class="flex-1 md:pr-8 hidden md:block"></div>
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-blue-600 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>
                    <div class="flex-1 md:pl-8">
                        <div class="bg-white rounded-2xl p-8 shadow-xl border-2 border-purple-100 hover:shadow-2xl hover:border-purple-300 transition-all duration-300">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Expansion Across Regions</h3>
                            </div>
                            <p class="text-gray-700 leading-relaxed">
                                We expanded our reach across six regions of Tanzania, establishing campus chapters and fostering spiritual formation, worship, and evangelization in colleges nationwide.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="relative flex items-center">
                    <div class="flex-1 md:pr-8 md:text-right">
                        <div class="bg-white rounded-2xl p-8 shadow-xl border-2 border-green-100 hover:shadow-2xl hover:border-green-300 transition-all duration-300">
                            <div class="flex items-center gap-4 mb-4 md:justify-end">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Community Impact</h3>
                            </div>
                            <p class="text-gray-700 leading-relaxed">
                                Our community has grown to over 1,000 active members across 50+ campus chapters, making a significant impact through spiritual services, social outreach, and leadership development.
                            </p>
                        </div>
                    </div>
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-green-600 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>
                    <div class="flex-1 md:pl-8 hidden md:block"></div>
                </div>

                <!-- Timeline Item 4 -->
                <div class="relative flex items-center">
                    <div class="flex-1 md:pr-8 hidden md:block"></div>
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-indigo-600 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>
                    <div class="flex-1 md:pl-8">
                        <div class="bg-white rounded-2xl p-8 shadow-xl border-2 border-indigo-100 hover:shadow-2xl hover:border-indigo-300 transition-all duration-300">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Continuing the Mission</h3>
                            </div>
                            <p class="text-gray-700 leading-relaxed">
                                Today, we continue to build a generation of Catholic students with strong spiritual lives, genuine love, and evangelizing leadership, contributing to the Church's mission in Tanzania and beyond.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Section - Advanced -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span>Our Team</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-orange-600">Leadership Team</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Dedicated individuals guiding our mission and vision forward
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($leaders as $leader)
            @php
                $colors = [
                    'blue' => ['from-blue-400', 'via-blue-500', 'to-purple-500', 'border-blue-100', 'hover:border-blue-400', 'text-blue-600', 'group-hover:text-blue-600'],
                    'purple' => ['from-purple-400', 'via-purple-500', 'to-pink-500', 'border-purple-100', 'hover:border-purple-400', 'text-purple-600', 'group-hover:text-purple-600'],
                    'green' => ['from-green-400', 'via-green-500', 'to-blue-500', 'border-green-100', 'hover:border-green-400', 'text-green-600', 'group-hover:text-green-600'],
                    'yellow' => ['from-yellow-400', 'via-yellow-500', 'to-orange-500', 'border-yellow-100', 'hover:border-yellow-400', 'text-yellow-600', 'group-hover:text-yellow-600'],
                    'indigo' => ['from-indigo-400', 'via-indigo-500', 'to-purple-500', 'border-indigo-100', 'hover:border-indigo-400', 'text-indigo-600', 'group-hover:text-indigo-600'],
                    'teal' => ['from-teal-400', 'via-teal-500', 'to-cyan-500', 'border-teal-100', 'hover:border-teal-400', 'text-teal-600', 'group-hover:text-teal-600'],
                ];
                $colorKeys = array_keys($colors);
                $colorIndex = ($loop->index) % count($colorKeys);
                $selectedColor = $colors[$colorKeys[$colorIndex]];
                $initials = implode('', array_map(function($word) { return strtoupper(substr($word, 0, 1)); }, explode(' ', $leader->name)));
            @endphp
            <div class="group text-center bg-white p-8 rounded-2xl shadow-lg border-2 {{ $selectedColor[3] }} hover:shadow-2xl {{ $selectedColor[4] }} transition-all duration-300 transform hover:-translate-y-2">
                @if($leader->photo)
                <div class="w-32 h-32 rounded-full mx-auto mb-6 overflow-hidden shadow-xl group-hover:scale-110 transition">
                    <img src="{{ $leader->photo }}" alt="{{ $leader->name }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="w-32 h-32 bg-gradient-to-br {{ $selectedColor[0] }} {{ $selectedColor[1] }} {{ $selectedColor[2] }} rounded-full mx-auto mb-6 flex items-center justify-center text-white text-3xl font-bold shadow-xl group-hover:scale-110 transition">
                    {{ $initials }}
                </div>
                @endif
                <h3 class="text-xl font-bold text-gray-900 mb-2 {{ $selectedColor[6] }} transition">{{ $leader->name }}</h3>
                <p class="{{ $selectedColor[5] }} font-semibold mb-3 text-lg">{{ $leader->title }}</p>
                @if($leader->role)
                <p class="text-gray-500 text-xs mb-2">{{ $leader->role }}</p>
                @endif
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{ $leader->bio }}
                </p>
                @if($leader->social_links && count($leader->social_links) > 0)
                <div class="flex justify-center gap-3 mt-4">
                    @if(isset($leader->social_links['facebook']))
                    <a href="{{ $leader->social_links['facebook'] }}" target="_blank" class="text-gray-400 hover:text-blue-600 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    @endif
                    @if(isset($leader->social_links['twitter']))
                    <a href="{{ $leader->social_links['twitter'] }}" target="_blank" class="text-gray-400 hover:text-blue-400 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    @endif
                    @if(isset($leader->social_links['instagram']))
                    <a href="{{ $leader->social_links['instagram'] }}" target="_blank" class="text-gray-400 hover:text-pink-600 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    @endif
                </div>
                @endif
            </div>
            @empty
            <div class="col-span-4 text-center py-12">
                <p class="text-gray-600">No leaders information available at this time.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Call to Action Section - Advanced -->
<section class="py-20 bg-gradient-to-br from-green-600 via-blue-600 to-green-700 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <img src="{{ asset('images/10.jpg') }}" alt="Join Us" class="absolute inset-0 w-full h-full object-cover opacity-20">
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-6">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            <span>Get Involved</span>
        </div>
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 drop-shadow-2xl">
            Join Us in Building a Better Future
        </h2>
        <p class="text-xl md:text-2xl text-blue-100 mb-10 leading-relaxed drop-shadow-md">
            Be part of a movement that's transforming lives and strengthening the Catholic community across Tanzania.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('get-involved') }}" class="inline-block bg-white text-blue-600 px-8 md:px-10 py-3 md:py-4 rounded-lg font-bold text-base md:text-lg hover:bg-blue-50 transition shadow-2xl hover:shadow-3xl transform hover:scale-105 border-2 border-transparent hover:border-blue-200 min-w-[180px] text-center">
                Get Involved
            </a>
            <a href="{{ route('events') }}" class="inline-block bg-transparent text-white border-2 border-white px-8 md:px-10 py-3 md:py-4 rounded-lg font-bold text-base md:text-lg hover:bg-white/10 transition shadow-2xl hover:shadow-3xl transform hover:scale-105 min-w-[180px] text-center">
                View Events
            </a>
        </div>
    </div>
</section>
@endsection
