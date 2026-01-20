@extends('layouts.app')

@section('title', 'Our History - ICCR Tanzania')
@section('description', 'Learn about the history and journey of ICCR Tanzania - From humble beginnings to a nationwide movement.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[50vh] bg-gradient-to-br from-indigo-900 via-blue-900 to-purple-900 text-white py-20">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Our History</h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
            A journey of faith, growth, and transformation
        </p>
    </div>
</section>

<!-- Timeline Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-12">
            @php
                $timeline = [
                    ['year' => '2010', 'title' => 'Foundation', 'description' => 'ICCR Tanzania was founded with a vision to unite Catholic students in colleges and higher education institutions through the Charismatic Renewal movement.'],
                    ['year' => '2015', 'title' => 'Expansion', 'description' => 'The movement expanded to over 20 universities and colleges across Tanzania, establishing regional chapters and strengthening the network.'],
                    ['year' => '2018', 'title' => 'Graduate Network', 'description' => 'The Graduate Network was launched to support alumni in maintaining their spiritual life and professional growth after graduation.'],
                    ['year' => '2020', 'title' => 'Digital Transformation', 'description' => 'Embracing technology, ICCR launched online resources, virtual events, and digital platforms to reach more students and graduates.'],
                    ['year' => '2025', 'title' => 'Today', 'description' => 'ICCR Tanzania continues to grow, impacting thousands of lives through spiritual formation, community service, and professional development programs.'],
                ];
            @endphp
            @foreach($timeline as $item)
            <div class="flex gap-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                        {{ $item['year'] }}
                    </div>
                </div>
                <div class="flex-1 bg-gray-50 rounded-xl p-6 border-2 border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $item['title'] }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $item['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

