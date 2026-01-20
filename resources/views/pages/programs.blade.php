@extends('layouts.app')

@section('title', 'Programs & Initiatives - ICCR Tanzania')
@section('description', 'Explore our comprehensive programs designed to support spiritual growth, professional development, and community impact.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[50vh] bg-gradient-to-br from-indigo-900 via-blue-900 to-purple-900 text-white py-20">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Programs & Initiatives</h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
            Comprehensive programs designed to support your growth and impact
        </p>
    </div>
</section>

<!-- Programs Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @php
                $programs = [
                    ['title' => 'Mentorship Program', 'description' => 'Connect with experienced professionals who guide your career and spiritual journey. Monthly one-on-one sessions, career advice, and spiritual direction.', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'from-blue-500 to-cyan-600', 'features' => ['One-on-one mentorship', 'Career guidance', 'Spiritual direction', 'Networking opportunities']],
                    ['title' => 'Career Development', 'description' => 'Workshops, seminars, and resources to advance your professional skills and opportunities. Industry-specific training and job placement support.', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'color' => 'from-green-500 to-emerald-600', 'features' => ['Professional workshops', 'Skill development', 'Job opportunities', 'Industry connections']],
                    ['title' => 'Spiritual Formation', 'description' => 'Regular retreats, prayer sessions, and spiritual growth opportunities. Deepen your faith and maintain spiritual resilience in professional life.', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'color' => 'from-purple-500 to-pink-600', 'features' => ['Monthly retreats', 'Prayer sessions', 'Bible studies', 'Spiritual resources']],
                    ['title' => 'Community Service', 'description' => 'Impact projects that serve communities and advance the mission of the Church. Volunteer opportunities and service initiatives across Tanzania.', 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9', 'color' => 'from-orange-500 to-red-600', 'features' => ['Volunteer projects', 'Community outreach', 'Service initiatives', 'Impact programs']],
                ];
            @endphp
            @foreach($programs as $program)
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:border-blue-300 hover:shadow-2xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br {{ $program['color'] }} rounded-xl flex items-center justify-center mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $program['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $program['title'] }}</h3>
                <p class="text-gray-600 leading-relaxed mb-6">{{ $program['description'] }}</p>
                <ul class="space-y-2 mb-6">
                    @foreach($program['features'] as $feature)
                    <li class="flex items-center gap-2 text-gray-600">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors inline-flex items-center gap-2">
                    Learn More
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

