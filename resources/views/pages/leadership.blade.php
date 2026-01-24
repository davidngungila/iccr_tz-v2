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
        @php
            $leaders = \App\Models\TeamMember::where('is_active', true)
                ->orderBy('order')
                ->orderBy('name')
                ->get();
            
            $gradients = [
                'from-indigo-500 to-blue-600',
                'from-purple-500 to-pink-600',
                'from-green-500 to-teal-600',
                'from-yellow-500 to-orange-600',
                'from-blue-500 to-cyan-600',
                'from-pink-500 to-rose-600',
            ];
        @endphp
        
        @if($leaders->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($leaders as $index => $leader)
            @php
                $initials = strtoupper(substr($leader->name, 0, 1) . (strpos($leader->name, ' ') !== false ? substr($leader->name, strpos($leader->name, ' ') + 1, 1) : ''));
                $gradient = $gradients[$index % count($gradients)];
            @endphp
            <div class="bg-white rounded-2xl p-8 shadow-lg border-2 border-gray-100 hover:border-purple-300 hover:shadow-2xl transition-all duration-300 text-center">
                @if($leader->photo)
                <div class="w-32 h-32 rounded-full mx-auto mb-6 overflow-hidden shadow-lg">
                    <img src="{{ $leader->photo }}" alt="{{ $leader->name }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="w-32 h-32 bg-gradient-to-br {{ $gradient }} rounded-full flex items-center justify-center text-white font-bold text-3xl mx-auto mb-6 shadow-lg">
                    {{ $initials }}
                </div>
                @endif
                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $leader->name }}</h3>
                @if($leader->title)
                <p class="text-purple-600 font-semibold mb-3">{{ $leader->title }}</p>
                @endif
                @if($leader->role)
                <p class="text-gray-600 text-sm mb-4">{{ $leader->role }}</p>
                @endif
                @if($leader->bio)
                <p class="text-gray-600 leading-relaxed mb-6">{{ $leader->bio }}</p>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-gray-600 text-lg">No leadership members available at this time.</p>
        </div>
        @endif
    </div>
</section>
@endsection


