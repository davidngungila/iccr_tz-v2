@extends('layouts.app')

@section('title', 'Partnerships - ICCR Tanzania')
@section('description', 'Our strategic partnerships with organizations, institutions, and communities that support our mission.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[50vh] bg-gradient-to-br from-indigo-900 via-blue-900 to-purple-900 text-white py-20">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Our Partnerships</h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
            Strategic partnerships that amplify our impact
        </p>
    </div>
</section>

<!-- Partners Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We collaborate with various organizations, institutions, and communities to expand our reach and impact across Tanzania and beyond.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $partners = [
                    ['name' => 'Catholic Church Tanzania', 'type' => 'Religious Institution', 'description' => 'Official partnership with the Catholic Church in Tanzania for spiritual guidance and support.'],
                    ['name' => 'Higher Education Institutions', 'type' => 'Academic', 'description' => 'Collaborations with universities and colleges across Tanzania to support student chapters.'],
                    ['name' => 'Community Organizations', 'type' => 'NGO', 'description' => 'Partnerships with local NGOs for community service projects and social impact initiatives.'],
                    ['name' => 'Professional Associations', 'type' => 'Professional', 'description' => 'Connections with professional bodies to provide career development opportunities for graduates.'],
                    ['name' => 'International Networks', 'type' => 'Global', 'description' => 'Partnerships with international Catholic Charismatic Renewal networks for global collaboration.'],
                    ['name' => 'Corporate Partners', 'type' => 'Business', 'description' => 'Strategic partnerships with businesses that support our programs and provide opportunities for graduates.'],
                ];
            @endphp
            @foreach($partners as $partner)
            <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-gray-100 hover:border-indigo-300 hover:shadow-2xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg">
                    {{ substr($partner['name'], 0, 2) }}
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $partner['name'] }}</h3>
                <p class="text-indigo-600 font-semibold text-sm mb-3">{{ $partner['type'] }}</p>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $partner['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection



