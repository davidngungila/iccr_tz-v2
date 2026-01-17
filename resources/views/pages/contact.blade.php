@extends('layouts.app')

@section('title', 'Contact Us - ICCR Tanzania')
@section('description', 'Get in touch with ICCR Tanzania - Contact information, office locations, and contact form')

@section('content')
<!-- Hero Section - Advanced -->
<section class="relative min-h-[50vh] h-[50vh] max-h-[600px] overflow-hidden">
    <div class="relative h-full bg-gradient-to-br from-green-600 via-blue-600 to-green-700">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="{{ asset('images/07.jpg') }}" alt="Contact Us" class="w-full h-full object-cover object-center">
        <div class="absolute inset-0 flex items-center justify-center py-8">
            <div class="text-center text-white px-4 sm:px-6 lg:px-8 z-10 max-w-5xl w-full">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Get in Touch</span>
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 drop-shadow-2xl leading-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">Contact Us</span>
                </h1>
                <p class="text-sm sm:text-base md:text-lg text-blue-100 mb-6 leading-relaxed max-w-3xl mx-auto drop-shadow-md">
                    We'd Love to Hear from You
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

<!-- Contact Information Section - Advanced -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                <span>Contact Information</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Get in <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Touch</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Reach out to us through any of these channels
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Email Card -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg border-2 border-blue-100 hover:shadow-2xl hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">Email</h3>
                <p class="text-gray-600 mb-2 font-medium">General Inquiries</p>
                <a href="mailto:info@icccr.or.tz" class="text-blue-600 hover:text-blue-800 font-semibold transition">info@icccr.or.tz</a>
                <p class="text-gray-500 text-sm mt-4">We respond within 24-48 hours</p>
            </div>
            
            <!-- Phone Card -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg border-2 border-purple-100 hover:shadow-2xl hover:border-purple-400 transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition">Phone</h3>
                <p class="text-gray-600 mb-2 font-medium">Call Us</p>
                <a href="tel:+255123456789" class="text-purple-600 hover:text-purple-800 font-semibold transition">+255 123 456 789</a>
                <p class="text-gray-500 text-sm mt-4">Mon-Fri: 8:00 AM - 5:00 PM</p>
            </div>
            
            <!-- Location Card -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg border-2 border-green-100 hover:shadow-2xl hover:border-green-400 transition-all duration-300 transform hover:-translate-y-2 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition">Location</h3>
                <p class="text-gray-600 mb-2 font-medium">Main Office</p>
                <p class="text-green-600 font-semibold">Dar es Salaam, Tanzania</p>
                <p class="text-gray-500 text-sm mt-4">Visit us during office hours</p>
            </div>
        </div>
    </div>
</section>

<!-- Office Hours & Departments Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Office Hours -->
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 shadow-lg border-2 border-blue-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Office Hours</h3>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                        <span class="font-semibold text-gray-700">Monday - Friday</span>
                        <span class="text-gray-600">8:00 AM - 5:00 PM</span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                        <span class="font-semibold text-gray-700">Saturday</span>
                        <span class="text-gray-600">9:00 AM - 1:00 PM</span>
                    </div>
                    <div class="flex justify-between items-center py-3">
                        <span class="font-semibold text-gray-700">Sunday</span>
                        <span class="text-gray-600">Closed</span>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                    <p class="text-sm text-gray-600">
                        <span class="font-semibold text-blue-700">Note:</span> For urgent matters outside office hours, please email us and we'll respond as soon as possible.
                    </p>
                </div>
            </div>
            
            <!-- Departments -->
            <div class="bg-gradient-to-br from-purple-50 to-white rounded-2xl p-8 shadow-lg border-2 border-purple-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Contact by Department</h3>
                </div>
                <div class="space-y-4">
                    <div class="p-4 bg-white rounded-lg border border-purple-100 hover:border-purple-300 transition">
                        <h4 class="font-bold text-gray-900 mb-1">General Inquiries</h4>
                        <p class="text-sm text-gray-600 mb-2">info@icccr.or.tz</p>
                        <p class="text-xs text-gray-500">For general questions and information</p>
                    </div>
                    <div class="p-4 bg-white rounded-lg border border-purple-100 hover:border-purple-300 transition">
                        <h4 class="font-bold text-gray-900 mb-1">Events & Registration</h4>
                        <p class="text-sm text-gray-600 mb-2">events@icccr.or.tz</p>
                        <p class="text-xs text-gray-500">For event inquiries and registrations</p>
                    </div>
                    <div class="p-4 bg-white rounded-lg border border-purple-100 hover:border-purple-300 transition">
                        <h4 class="font-bold text-gray-900 mb-1">Media & Communications</h4>
                        <p class="text-sm text-gray-600 mb-2">media@icccr.or.tz</p>
                        <p class="text-xs text-gray-500">For media inquiries and press releases</p>
                    </div>
                    <div class="p-4 bg-white rounded-lg border border-purple-100 hover:border-purple-300 transition">
                        <h4 class="font-bold text-gray-900 mb-1">Campus Chapters</h4>
                        <p class="text-sm text-gray-600 mb-2">chapters@icccr.or.tz</p>
                        <p class="text-xs text-gray-500">For campus chapter inquiries</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Regional Contacts Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-purple-50 relative overflow-hidden">
    <div class="absolute top-20 left-10 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 right-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Regional Contacts</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Regional <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Offices</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Connect with our regional coordinators across Tanzania
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-indigo-300 transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Dar es Salaam</h3>
                </div>
                <p class="text-gray-600 text-sm mb-3">Main Regional Office</p>
                <p class="text-indigo-600 font-semibold text-sm">coordinator.dsm@icccr.or.tz</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-indigo-300 transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Dodoma</h3>
                </div>
                <p class="text-gray-600 text-sm mb-3">Central Region</p>
                <p class="text-purple-600 font-semibold text-sm">coordinator.dodoma@icccr.or.tz</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-indigo-300 transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Mwanza</h3>
                </div>
                <p class="text-gray-600 text-sm mb-3">Lake Zone</p>
                <p class="text-green-600 font-semibold text-sm">coordinator.mwanza@icccr.or.tz</p>
        </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-indigo-300 transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Arusha</h3>
                </div>
                <p class="text-gray-600 text-sm mb-3">Northern Region</p>
                <p class="text-blue-600 font-semibold text-sm">coordinator.arusha@icccr.or.tz</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-indigo-300 transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Mbeya</h3>
                </div>
                <p class="text-gray-600 text-sm mb-3">Southern Highlands</p>
                <p class="text-orange-600 font-semibold text-sm">coordinator.mbeya@icccr.or.tz</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100 hover:shadow-2xl hover:border-indigo-300 transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Tanga</h3>
                </div>
                <p class="text-gray-600 text-sm mb-3">Coastal Region</p>
                <p class="text-pink-600 font-semibold text-sm">coordinator.tanga@icccr.or.tz</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section - Advanced -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                <span>Send a Message</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Send Us a <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Message</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Fill out the form below and we'll get back to you as soon as possible
            </p>
        </div>
        
        <div class="bg-white rounded-2xl p-8 md:p-12 shadow-2xl border-2 border-gray-100">
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" placeholder="John Doe">
                    </div>
                <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" placeholder="john@example.com">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" placeholder="+255 123 456 789">
                </div>
                <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject *</label>
                        <select id="subject" name="subject" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition">
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="events">Events & Registration</option>
                            <option value="chapters">Campus Chapters</option>
                            <option value="media">Media & Communications</option>
                            <option value="volunteer">Volunteer Opportunities</option>
                            <option value="donation">Donations</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message *</label>
                    <textarea id="message" name="message" rows="6" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" placeholder="Tell us how we can help you..."></textarea>
                </div>
                
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="consent" name="consent" required class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="consent" class="text-sm text-gray-600">
                        I agree to the <a href="{{ route('privacy') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Privacy Policy</a> and consent to being contacted by ICCR Tanzania.
                    </label>
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-blue-600 text-white px-8 py-4 rounded-lg font-bold text-lg hover:from-blue-700 hover:to-purple-700 transition shadow-xl hover:shadow-2xl transform hover:scale-105">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Social Media Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <div class="absolute top-20 right-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                </svg>
                <span>Connect With Us</span>
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Follow Us on <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-orange-600">Social Media</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Stay updated with our latest news, events, and activities
            </p>
        </div>
        
        <div class="flex justify-center items-center gap-6">
            <a href="#" class="group w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center text-white shadow-lg hover:shadow-2xl transition transform hover:scale-110 hover:rotate-12" aria-label="Facebook">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                </svg>
            </a>
            <a href="#" class="group w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center text-white shadow-lg hover:shadow-2xl transition transform hover:scale-110 hover:rotate-12" aria-label="YouTube">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            </a>
            <a href="#" class="group w-20 h-20 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 rounded-2xl flex items-center justify-center text-white shadow-lg hover:shadow-2xl transition transform hover:scale-110 hover:rotate-12" aria-label="Instagram">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.996 1.336c.748.748 1.336 1.644 1.336 2.996 0 .854-.217 1.363-.465 2.427-.047 1.024-.06 1.379-.06 3.808 0 2.43-.013 2.784-.06 3.808-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.336 1.996c-.748.748-1.644 1.336-2.996 1.336-.854 0-1.363-.217-2.427-.465-1.024-.047-1.379-.06-3.808-.06-2.43 0-2.784.013-3.808.06-1.064.049-1.791.218-2.427.465a4.902 4.902 0 01-1.996-1.336c-.748-.748-1.336-1.644-1.336-2.996 0-.854.217-1.363.465-2.427.047-1.024.06-1.379.06-3.808 0-2.43-.013-2.784-.06-3.808a6.919 6.919 0 00-.465-2.427 4.902 4.902 0 011.336-1.996c.748-.748 1.644-1.336 2.996-1.336.854 0 1.363.217 2.427.465 1.024.047 1.379.06 3.808.06zm0-2c-2.5 0-2.884.013-3.926.06-1.11.05-1.87.22-2.536.453a6.99 6.99 0 00-2.852 1.857A6.99 6.99 0 001.44 5.45c-.233.666-.403 1.426-.453 2.536-.047 1.042-.06 1.426-.06 3.926 0 2.5.013 2.884.06 3.926.05 1.11.22 1.87.453 2.536a6.99 6.99 0 001.857 2.852 6.99 6.99 0 002.852 1.857c.666.233 1.426.403 2.536.453 1.042.047 1.426.06 3.926.06 2.5 0 2.884-.013 3.926-.06 1.11-.05 1.87-.22 2.536-.453a6.99 6.99 0 002.852-1.857 6.99 6.99 0 001.857-2.852c.233-.666.403-1.426.453-2.536.047-1.042.06-1.426.06-3.926 0-2.5-.013-2.884-.06-3.926a6.919 6.919 0 00-.453-2.536 6.99 6.99 0 00-1.857-2.852A6.99 6.99 0 0018.777.453C18.111.22 17.351.05 16.241 0 15.199-.013 14.815 0 12.315 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12.315 16a4 4 0 110-8 4 4 0 010 8zm6.407-10.844a1.44 1.44 0 11-2.881 0 1.44 1.44 0 012.881 0z"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection
