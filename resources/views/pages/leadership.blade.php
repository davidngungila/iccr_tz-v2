@extends('layouts.app')

@section('title', 'Leadership - ICCR Tanzania')
@section('description', 'Meet the leadership team of ICCR Tanzania - Committed to serving and growing our community.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[50vh] bg-gradient-to-br from-indigo-900 via-blue-900 to-purple-900 text-white py-20">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Our Leadership</h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
            Dedicated leaders committed to serving and growing our community
        </p>
    </div>
</section>

<!-- Leadership Team -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $leaders = [
                    ['name' => 'Dr. Michael Mwangi', 'role' => 'National Coordinator', 'bio' => 'Leading the national coordination of ICCR Tanzania with over 10 years of experience in Catholic ministry.', 'university' => 'University of Dar es Salaam', 'initials' => 'MM', 'gradient' => 'from-indigo-500 to-blue-600'],
                    ['name' => 'Eng. Sarah Kimario', 'role' => 'Programs Director', 'bio' => 'Oversees all programs and initiatives, ensuring quality and impact across all activities.', 'university' => 'Dodoma University', 'initials' => 'SK', 'gradient' => 'from-purple-500 to-pink-600'],
                    ['name' => 'Dr. John Mwambene', 'role' => 'Regional Coordinator', 'bio' => 'Coordinates regional activities and supports local chapters across Tanzania.', 'university' => 'Mwanza University', 'initials' => 'JM', 'gradient' => 'from-green-500 to-teal-600'],
                ];
            @endphp
            @foreach($leaders as $leader)
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:border-purple-300 hover:shadow-2xl transition-all duration-300 text-center">
                <div class="w-32 h-32 bg-gradient-to-br {{ $leader['gradient'] }} rounded-full flex items-center justify-center text-white font-bold text-3xl mx-auto mb-6 shadow-lg">
                    {{ $leader['initials'] }}
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $leader['name'] }}</h3>
                <p class="text-purple-600 font-semibold mb-3">{{ $leader['role'] }}</p>
                <p class="text-gray-600 text-sm mb-4">{{ $leader['university'] }}</p>
                <p class="text-gray-600 leading-relaxed mb-6">{{ $leader['bio'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

