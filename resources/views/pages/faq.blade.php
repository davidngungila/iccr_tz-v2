@extends('layouts.app')

@section('title', 'FAQ - ICCR Tanzania')
@section('description', 'Frequently asked questions about ICCR Tanzania - Membership, events, and participation')

@section('content')
<!-- Hero Section - Advanced -->
<section class="relative min-h-[50vh] h-[50vh] max-h-[600px] overflow-hidden">
    <div class="relative h-full bg-gradient-to-br from-green-600 via-blue-600 to-green-700">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="{{ asset('images/11.jpg') }}" alt="ICCR FAQ" class="w-full h-full object-cover object-center">
        <div class="absolute inset-0 flex items-center justify-center py-8">
            <div class="text-center text-white px-4 sm:px-6 lg:px-8 z-10 max-w-5xl w-full">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Frequently Asked Questions</span>
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 drop-shadow-2xl leading-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">FAQ</span>
                </h1>
                <p class="text-sm sm:text-base md:text-lg text-blue-100 mb-6 leading-relaxed max-w-3xl mx-auto drop-shadow-md">
                    Find Answers to Your Questions
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

<!-- FAQ Categories Section -->
<section class="py-12 bg-white border-b-2 border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="faq-filter-btn active px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-md hover:shadow-lg transform hover:scale-105" data-category="all">
                All Questions
            </button>
            <button class="faq-filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-category="membership">
                Membership
            </button>
            <button class="faq-filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-category="events">
                Events
            </button>
            <button class="faq-filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-category="ministries">
                Ministries
            </button>
            <button class="faq-filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition" data-category="general">
                General
            </button>
        </div>
    </div>
</section>

<!-- FAQ Section - Advanced -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="space-y-6" id="faq-container">
            <!-- FAQ Item 1 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-green-300 transition-all duration-300" data-category="membership">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Who can join ICCR?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed">
                            Any Catholic student who is enrolled in a college or higher education institution in Tanzania can join ICCR. We welcome all students who are interested in growing in their faith through the Charismatic Renewal movement. Whether you're a first-year student or a graduate student, you're welcome to be part of our community.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-blue-300 transition-all duration-300" data-category="events">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">How can I participate in events?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed mb-4">
                            First, join your campus chapter. Then, you can register for events through our website. Simply visit the Events page, find the event you're interested in, and click "Register Now" to sign up. For major events, we recommend registering early as spaces may be limited.
                        </p>
                        <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                            <p class="text-sm text-gray-700">
                                <strong>Tip:</strong> Follow us on social media to get notified about new events and early registration opportunities.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-purple-300 transition-all duration-300" data-category="general">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Do I need to have spiritual gifts to participate?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed">
                            No, you don't need to have any special spiritual gifts to participate. Every student can join and learn. We believe that everyone has something to contribute, and we provide a supportive environment for spiritual growth and development. The Holy Spirit works in different ways with different people, and we welcome you regardless of where you are in your spiritual journey.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-indigo-300 transition-all duration-300" data-category="membership">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Are there financial contributions required?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed">
                            Financial contributions are voluntary and are used to support national and campus events, as well as various services. There is no mandatory membership fee, but donations are appreciated to help us continue our mission. Some special events or training programs may have a minimal registration fee to cover materials and meals, which will be clearly stated during registration.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-teal-300 transition-all duration-300" data-category="ministries">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">What ministries can I serve in?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed mb-4">
                            You can serve in one of several ministries:
                        </p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start gap-2">
                                <span class="text-teal-600 font-bold">•</span>
                                <span><strong>Prayer Ministry:</strong> Leading prayer sessions and intercession</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-teal-600 font-bold">•</span>
                                <span><strong>Music Ministry:</strong> Worship and praise teams</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-teal-600 font-bold">•</span>
                                <span><strong>Evangelism Ministry:</strong> Sharing the Gospel and outreach</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-teal-600 font-bold">•</span>
                                <span><strong>Media Ministry:</strong> Content creation and communications</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-teal-600 font-bold">•</span>
                                <span><strong>Formation Ministry:</strong> Teaching and discipleship</span>
                            </li>
                        </ul>
                        <p class="text-gray-700 mt-4">You can indicate your preference when registering or speak with your chapter leader.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-orange-300 transition-all duration-300" data-category="events">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">How often are events held?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed mb-4">
                            We have regular prayer meetings every Saturday and Wednesday at campus chapters. Additionally, we organize major events throughout the year:
                        </p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start gap-2">
                                <span class="text-orange-600 font-bold">•</span>
                                <span><strong>Monthly:</strong> Night of Praise events in various regions</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-orange-600 font-bold">•</span>
                                <span><strong>Quarterly:</strong> Regional camps and retreats</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-orange-600 font-bold">•</span>
                                <span><strong>Annually:</strong> National conferences and leadership training</span>
                            </li>
                        </ul>
                        <p class="text-gray-700 mt-4">Check our Events page for the latest schedule and upcoming activities.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 7 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-pink-300 transition-all duration-300" data-category="membership">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Can I join if my campus doesn't have a chapter?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed mb-4">
                    Yes! If your campus doesn't have a chapter yet, you can still join and we can help you start one. Contact us through our Contact page, and we'll guide you through the process of establishing a new campus chapter.
                </p>
                        <div class="bg-pink-50 rounded-lg p-4 border-l-4 border-pink-500">
                            <p class="text-sm text-gray-700">
                                <strong>Starting a Chapter:</strong> We provide resources, training, and ongoing support to help you establish and grow a vibrant campus chapter at your institution.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 8 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-yellow-300 transition-all duration-300" data-category="events">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">What should I bring to events?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed mb-4">
                            For regular prayer meetings, just bring yourself and an open heart. For retreats and camps, we'll provide a detailed packing list when you register. Generally, you'll need:
                        </p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start gap-2">
                                <span class="text-yellow-600 font-bold">•</span>
                                <span>Comfortable clothing appropriate for the event</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-yellow-600 font-bold">•</span>
                                <span>A Bible for study and reflection</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-yellow-600 font-bold">•</span>
                                <span>A notebook and pen for taking notes</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-yellow-600 font-bold">•</span>
                                <span>Personal items for overnight events (toiletries, sleeping bag, etc.)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 9 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-cyan-300 transition-all duration-300" data-category="general">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">How do I stay updated with ICCR activities?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed mb-4">
                            There are several ways to stay connected:
                        </p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start gap-2">
                                <span class="text-cyan-600 font-bold">•</span>
                                <span><strong>Website:</strong> Check our website regularly for updates and announcements</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-cyan-600 font-bold">•</span>
                                <span><strong>Social Media:</strong> Follow us on Facebook, Instagram, and YouTube</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-cyan-600 font-bold">•</span>
                                <span><strong>Newsletter:</strong> Subscribe to our email newsletter for regular updates</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-cyan-600 font-bold">•</span>
                                <span><strong>Campus Chapter:</strong> Attend your local chapter meetings for local updates</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 10 -->
            <div class="faq-item bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-emerald-300 transition-all duration-300" data-category="general">
                <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Can alumni or non-students participate?</h3>
                    </div>
                    <svg class="w-6 h-6 text-gray-500 faq-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-6">
                    <div class="pl-16">
                        <p class="text-gray-700 leading-relaxed">
                            While our primary focus is on college and university students, we welcome alumni and young professionals to participate in certain events and activities. Alumni often serve as mentors, speakers, or volunteers. Some events may have specific eligibility requirements, which will be clearly stated during registration. Contact us if you're interested in getting involved as an alumnus or supporter.
                </p>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>

        <!-- Still Have Questions Section -->
<section class="py-20 bg-gradient-to-br from-green-600 via-blue-600 to-green-700 relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 md:p-12 border-2 border-white/20">
            <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Still Have Questions?</h2>
            <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
                We're here to help! Get in touch with us and we'll be happy to answer any questions you may have.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-green-600 rounded-xl font-bold text-lg hover:bg-green-50 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Contact Us</span>
                </a>
                <a href="{{ route('get-involved') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white/20 backdrop-blur-sm text-white border-2 border-white/30 rounded-xl font-bold text-lg hover:bg-white/30 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    <span>Join Us</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function toggleFaq(button) {
    const faqItem = button.closest('.faq-item');
    const answer = faqItem.querySelector('.faq-answer');
    const icon = button.querySelector('.faq-icon');
    
    // Close all other FAQs
    document.querySelectorAll('.faq-item').forEach(item => {
        if (item !== faqItem) {
            item.querySelector('.faq-answer').classList.add('hidden');
            item.querySelector('.faq-icon').classList.remove('rotate-180');
            item.classList.remove('border-green-500');
        }
    });
    
    // Toggle current FAQ
    answer.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
    faqItem.classList.toggle('border-green-500');
}

// FAQ Filter Functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.faq-filter-btn');
    const faqItems = document.querySelectorAll('.faq-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
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
            
            // Filter FAQs
            faqItems.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
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
});
</script>
@endpush
