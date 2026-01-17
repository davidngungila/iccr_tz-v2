@extends('layouts.app')

@section('title', 'Ministries - ICCR Tanzania')
@section('description', 'Explore the various ministries and programs offered by ICCR Tanzania')

@section('content')
<!-- Hero Section - Advanced -->
<section class="relative min-h-[60vh] h-[60vh] max-h-[700px] overflow-hidden">
    <div class="relative h-full bg-gradient-to-br from-green-600 via-blue-600 to-green-700">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="{{ asset('images/01.jpg') }}" alt="ICCR Ministries" class="w-full h-full object-cover object-center">
        <div class="absolute inset-0 flex items-center justify-center py-8">
            <div class="text-center text-white px-4 sm:px-6 lg:px-8 z-10 max-w-5xl w-full">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>Our Ministries</span>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-4 drop-shadow-2xl leading-tight">
                    Serving with <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-blue-300">Purpose</span>
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto leading-relaxed drop-shadow-lg">
                    Discover diverse ministries empowering students to grow in faith, serve communities, and lead with purpose across Tanzania
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-16 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600 mb-2">8</div>
                <div class="text-gray-600 font-semibold">Active Ministries</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600 mb-2">51+</div>
                <div class="text-gray-600 font-semibold">Campus Chapters</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600 mb-2">5000+</div>
                <div class="text-gray-600 font-semibold">Active Members</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600 mb-2">100+</div>
                <div class="text-gray-600 font-semibold">Events Annually</div>
            </div>
        </div>
    </div>
</section>

<!-- Prayer & Worship Ministry -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-purple-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="lg:flex lg:items-center lg:gap-12 mb-16">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-700 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                    <span>Prayer & Worship</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Prayer & Worship <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">Ministry</span>
                </h2>
                <p class="text-xl text-gray-700 leading-relaxed mb-6">
                    The heart of our spiritual life, creating sacred spaces for students to encounter God through various forms of prayer and worship. We foster deep, transformative experiences that strengthen faith and build community.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="flex items-start gap-3 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                        <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Weekly Prayer Meetings</h4>
                            <p class="text-sm text-gray-600">Regular gatherings for intercession, praise, and spiritual fellowship</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                        <div class="flex-shrink-0 w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Praise & Worship Sessions</h4>
                            <p class="text-sm text-gray-600">Dynamic worship experiences with contemporary and traditional music</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                        <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Eucharistic Adoration</h4>
                            <p class="text-sm text-gray-600">Time spent in quiet prayer before the Blessed Sacrament</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                        <div class="flex-shrink-0 w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Charismatic Prayer Groups</h4>
                            <p class="text-sm text-gray-600">Small groups focused on the gifts and fruits of the Holy Spirit</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold text-lg hover:from-purple-700 hover:to-pink-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <span>Join This Ministry</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
            <div class="lg:w-1/2">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="relative h-64 rounded-2xl overflow-hidden shadow-xl group">
                            <img src="{{ asset('images/02.jpg') }}" alt="Prayer Meeting" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="font-bold text-lg">Prayer Gathering</h3>
                            </div>
                        </div>
                        <div class="relative h-48 rounded-2xl overflow-hidden shadow-xl group">
                            <img src="{{ asset('images/03.jpg') }}" alt="Worship" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="font-bold">Adoration</h3>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4 pt-8">
                        <div class="relative h-48 rounded-2xl overflow-hidden shadow-xl group">
                            <img src="{{ asset('images/04.jpg') }}" alt="Worship Team" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="font-bold">Worship Team</h3>
                            </div>
                        </div>
                        <div class="relative h-64 rounded-2xl overflow-hidden shadow-xl group">
                            <img src="{{ asset('images/05.jpg') }}" alt="Praise Session" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="font-bold text-lg">Praise Session</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Evangelization Ministry -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="lg:flex lg:items-center lg:gap-12 lg:flex-row-reverse mb-16">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-700 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    <span>Evangelization</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Evangelization <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-600">Ministry</span>
                </h2>
                <p class="text-xl text-gray-700 leading-relaxed mb-6">
                    Equipping students to share the Good News of Jesus Christ with peers, families, and communities. Through comprehensive training and outreach programs, we prepare effective witnesses of faith.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="flex items-start gap-3 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition border-2 border-blue-50">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Evangelization Workshops</h4>
                            <p class="text-sm text-gray-600">Training on how to share faith effectively and respectfully</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition border-2 border-blue-50">
                        <div class="flex-shrink-0 w-12 h-12 bg-cyan-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Campus Outreach</h4>
                            <p class="text-sm text-gray-600">Organized activities to reach out to fellow students</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition border-2 border-blue-50">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Mission Trips</h4>
                            <p class="text-sm text-gray-600">Short-term mission opportunities in local communities</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-white rounded-xl shadow-md hover:shadow-lg transition border-2 border-blue-50">
                        <div class="flex-shrink-0 w-12 h-12 bg-cyan-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Faith Sharing Groups</h4>
                            <p class="text-sm text-gray-600">Small groups for sharing testimonies and faith experiences</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl font-bold text-lg hover:from-blue-700 hover:to-cyan-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <span>Join This Ministry</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
            <div class="lg:w-1/2">
                <div class="relative h-[600px] rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/06.jpg') }}" alt="Evangelization" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                        <h3 class="text-3xl font-bold mb-3">Sharing the Good News</h3>
                        <p class="text-lg text-blue-100">Empowering students to be witnesses of Christ in their communities</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Formation & Education Ministry -->
<section class="py-20 bg-gradient-to-br from-green-50 via-white to-emerald-50 relative overflow-hidden">
    <div class="absolute top-20 left-10 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="lg:flex lg:items-center lg:gap-12 mb-16">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-green-100 to-emerald-100 text-green-700 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span>Formation & Education</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Formation & Education <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-600">Ministry</span>
                </h2>
                <p class="text-xl text-gray-700 leading-relaxed mb-6">
                    Comprehensive spiritual and intellectual formation to help students grow in understanding of the Catholic faith. Through structured programs, we deepen knowledge of Scripture, Church teachings, and Charismatic Renewal.
                </p>
                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500">
                        <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Bible Study Groups</h4>
                            <p class="text-gray-600">Regular study of Scripture with guided discussions and reflection</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-emerald-500">
                        <div class="flex-shrink-0 w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Catechetical Programs</h4>
                            <p class="text-gray-600">Teaching on Catholic doctrine, traditions, and sacraments</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500">
                        <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Theological Seminars</h4>
                            <p class="text-gray-600">In-depth exploration of theological topics and Church history</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-emerald-500">
                        <div class="flex-shrink-0 w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Charismatic Renewal Formation</h4>
                            <p class="text-gray-600">Understanding the history, spirituality, and gifts of the Renewal</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-xl font-bold text-lg hover:from-green-700 hover:to-emerald-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <span>Join This Ministry</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
            <div class="lg:w-1/2">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="relative h-56 rounded-2xl overflow-hidden shadow-xl group">
                            <img src="{{ asset('images/07.jpg') }}" alt="Bible Study" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="font-bold">Bible Study</h3>
                            </div>
                        </div>
                        <div class="relative h-48 rounded-2xl overflow-hidden shadow-xl group">
                            <img src="{{ asset('images/08.jpg') }}" alt="Seminar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="font-bold">Seminar</h3>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4 pt-12">
                        <div class="relative h-48 rounded-2xl overflow-hidden shadow-xl group">
                            <img src="{{ asset('images/09.jpg') }}" alt="Formation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="font-bold">Formation</h3>
                            </div>
                        </div>
                        <div class="relative h-56 rounded-2xl overflow-hidden shadow-xl group">
                            <img src="{{ asset('images/10.jpg') }}" alt="Education" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="font-bold">Education</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Service Ministry -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute bottom-20 right-10 w-64 h-64 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="lg:flex lg:items-center lg:gap-12 lg:flex-row-reverse mb-16">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-700 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span>Social Service</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Social Service <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Ministry</span>
                </h2>
                <p class="text-xl text-gray-700 leading-relaxed mb-6">
                    Putting faith into action by serving the poor, marginalized, and vulnerable. We demonstrate Christ's love through acts of charity, compassion, and service to those in need.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="p-5 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl shadow-md hover:shadow-lg transition border-2 border-indigo-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900">Community Outreach</h4>
                        </div>
                        <p class="text-sm text-gray-600">Visiting and assisting families in need with essential support</p>
                    </div>
                    <div class="p-5 bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl shadow-md hover:shadow-lg transition border-2 border-purple-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900">Hospital Visits</h4>
                        </div>
                        <p class="text-sm text-gray-600">Praying with and comforting the sick and their families</p>
                    </div>
                    <div class="p-5 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl shadow-md hover:shadow-lg transition border-2 border-indigo-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900">Charity Drives</h4>
                        </div>
                        <p class="text-sm text-gray-600">Collecting and distributing food, clothing, and essentials</p>
                    </div>
                    <div class="p-5 bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl shadow-md hover:shadow-lg transition border-2 border-purple-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900">Care Facilities</h4>
                        </div>
                        <p class="text-sm text-gray-600">Regular visits and support to orphanages and elderly care</p>
                    </div>
                </div>
                <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-bold text-lg hover:from-indigo-700 hover:to-purple-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <span>Join This Ministry</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
            <div class="lg:w-1/2">
                <div class="relative h-[600px] rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/11.jpg') }}" alt="Social Service" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                        <h3 class="text-3xl font-bold mb-3">Serving with Love</h3>
                        <p class="text-lg text-indigo-100">Making a tangible difference in the lives of those in need</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- All Ministries Grid -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <span>All Ministries</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Complete <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Ministry</span> Overview
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Each ministry plays a vital role in our mission to unite, nurture, develop, and serve. Find the one that resonates with your calling.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="group bg-white p-6 rounded-2xl shadow-lg border-2 border-purple-100 hover:border-purple-300 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-pink-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition">Prayer & Worship</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Encounter God through prayer and worship experiences</p>
            </div>

            <div class="group bg-white p-6 rounded-2xl shadow-lg border-2 border-blue-100 hover:border-blue-300 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition">Evangelization</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Share the Good News with others in your community</p>
            </div>

            <div class="group bg-white p-6 rounded-2xl shadow-lg border-2 border-green-100 hover:border-green-300 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-600 transition">Formation & Education</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Grow in knowledge and understanding of the faith</p>
            </div>

            <div class="group bg-white p-6 rounded-2xl shadow-lg border-2 border-indigo-100 hover:border-indigo-300 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">Social Service</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Serve those in need with love and compassion</p>
            </div>

            <div class="group bg-white p-6 rounded-2xl shadow-lg border-2 border-yellow-100 hover:border-yellow-300 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-yellow-600 transition">Youth & Campus</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Connect with students on your campus</p>
            </div>

            <div class="group bg-white p-6 rounded-2xl shadow-lg border-2 border-pink-100 hover:border-pink-300 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-100 to-rose-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-pink-600 transition">Music & Creative Arts</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Use your talents to glorify God</p>
            </div>

            <div class="group bg-white p-6 rounded-2xl shadow-lg border-2 border-red-100 hover:border-red-300 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-red-100 to-orange-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-red-600 transition">Leadership Development</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Grow as a leader and make an impact</p>
            </div>

            <div class="group bg-white p-6 rounded-2xl shadow-lg border-2 border-teal-100 hover:border-teal-300 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-100 to-cyan-100 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-teal-600 transition">Media & Communications</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Share stories and document our journey</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-br from-green-600 via-blue-600 to-green-700 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <img src="{{ asset('images/01.jpg') }}" alt="Get Involved" class="absolute inset-0 w-full h-full object-cover opacity-20">
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 drop-shadow-2xl">
            Ready to Get <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-blue-300">Involved?</span>
        </h2>
        <p class="text-xl md:text-2xl text-blue-100 mb-10 leading-relaxed drop-shadow-lg">
            Join one of our ministries and discover how you can use your gifts and talents to serve God and others. Together, we can make a lasting impact.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('get-involved') }}" class="inline-flex items-center justify-center gap-3 px-10 py-5 bg-white text-green-600 rounded-xl font-bold text-lg hover:bg-green-50 transition shadow-2xl hover:shadow-3xl transform hover:scale-105">
                <span>Get Involved Today</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-3 px-10 py-5 bg-green-700 text-white rounded-xl font-bold text-lg hover:bg-green-800 transition shadow-2xl hover:shadow-3xl transform hover:scale-105 border-2 border-white/30">
                <span>Contact Us</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection
