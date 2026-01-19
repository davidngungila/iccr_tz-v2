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
                
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 drop-shadow-2xl leading-tight">
                    Faith in the <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-orange-300 to-yellow-300">Marketplace</span>
                </h1>
                
                <h2 class="text-xl sm:text-2xl md:text-3xl font-light mb-8 drop-shadow-lg text-blue-100 max-w-3xl mx-auto leading-normal">
                    Empowering Catholic professionals to lead with integrity, serve with compassion, and transform society through the Gospel.
                </h2>
                
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

<!-- Call to Action -->
<section id="join" class="py-24 bg-gradient-to-br from-teal-900 via-emerald-900 to-teal-900 text-white relative overflow-hidden">
    <!-- Decorative Shapes -->
    <div class="absolute inset-0 bg-grid-white/[0.05] bg-[length:20px_20px]"></div>
    <div class="absolute top-0 right-0 w-80 h-80 bg-emerald-500 rounded-full mix-blend-overlay filter blur-[100px] opacity-20"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-cyan-500 rounded-full mix-blend-overlay filter blur-[100px] opacity-20"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-8 tracking-tight">Ready to Reconnect?</h2>
        <p class="text-xl md:text-2xl text-teal-100 mb-12 leading-relaxed font-light">
            Your journey didn't end at graduation. Join the <span class="font-bold text-white">ICCR Tanzania Graduate Network</span> today and take your place in our growing family.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="https://wa.me/255123456789?text=I%20want%20to%20join%20Graduate%20Community" target="_blank" class="flex items-center justify-center gap-3 bg-white text-teal-900 px-8 py-5 rounded-xl font-bold text-lg hover:bg-teal-50 transition-all duration-300 shadow-xl hover:shadow-2xl shadow-emerald-900/20 transform hover:-translate-y-1">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                Join via WhatsApp
            </a>
            <a href="{{ route('contact') }}" class="flex items-center justify-center gap-3 bg-transparent border-2 border-white/30 text-white px-8 py-5 rounded-xl font-bold text-lg hover:bg-white/10 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Contact Us
            </a>
        </div>
        
        <p class="mt-8 text-sm text-emerald-200 opacity-60">
            Join over 1,000 graduates making a difference across Tanzania.
        </p>
    </div>
</section>

@endsection
