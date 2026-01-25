@extends('layouts.app')

@section('title', 'Register for ' . $event->title . ' - ICCR Tanzania')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[40vh] h-[40vh] max-h-[500px] overflow-hidden">
    @if($event->banner_image)
    <div class="relative h-full">
        <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>
    @else
    <div class="relative h-full bg-gradient-to-br from-green-600 via-blue-600 to-green-800">
        <div class="absolute inset-0 bg-black opacity-50"></div>
    @endif
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 text-center">
                <div class="max-w-4xl mx-auto">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold text-white mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Event Registration</span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 drop-shadow-2xl leading-tight">
                        Register for {{ $event->title }}
                    </h1>
                    <p class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-6 leading-relaxed drop-shadow-lg max-w-3xl mx-auto">
                        {{ $event->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Registration Form Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-2xl border-2 border-gray-100 p-6 md:p-8 lg:p-12">
            @if(session('error'))
            <div class="mb-6 bg-red-50 border-2 border-red-200 rounded-lg p-4 text-red-700">
                {{ session('error') }}
            </div>
            @endif

            <form id="registrationForm" action="{{ route('event.register.store', $event->id) }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="full_name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        @error('full_name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="+255 123 456 789" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="campus" class="block text-sm font-semibold text-gray-700 mb-2">Campus/Institution</label>
                        <input type="text" id="campus" name="campus" value="{{ old('campus') }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="institution" class="block text-sm font-semibold text-gray-700 mb-2">Institution Name</label>
                        <input type="text" id="institution" name="institution" value="{{ old('institution') }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    </div>
                    <div>
                        <label for="year_of_study" class="block text-sm font-semibold text-gray-700 mb-2">Year of Study</label>
                        <select id="year_of_study" name="year_of_study" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                            <option value="">Select Year</option>
                            <option value="1st Year" {{ old('year_of_study') === '1st Year' ? 'selected' : '' }}>1st Year</option>
                            <option value="2nd Year" {{ old('year_of_study') === '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                            <option value="3rd Year" {{ old('year_of_study') === '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                            <option value="4th Year" {{ old('year_of_study') === '4th Year' ? 'selected' : '' }}>4th Year</option>
                            <option value="5th Year+" {{ old('year_of_study') === '5th Year+' ? 'selected' : '' }}>5th Year+</option>
                            <option value="Graduate" {{ old('year_of_study') === 'Graduate' ? 'selected' : '' }}>Graduate</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <label for="course" class="block text-sm font-semibold text-gray-700 mb-2">Course/Program</label>
                    <input type="text" id="course" name="course" value="{{ old('course') }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="accommodation_needed" class="block text-sm font-semibold text-gray-700 mb-2">Need Accommodation?</label>
                        <select id="accommodation_needed" name="accommodation_needed" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                            <option value="no" {{ old('accommodation_needed', 'no') === 'no' ? 'selected' : '' }}>No</option>
                            <option value="yes" {{ old('accommodation_needed') === 'yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                    <div>
                        <label for="transportation_needed" class="block text-sm font-semibold text-gray-700 mb-2">Need Transportation?</label>
                        <select id="transportation_needed" name="transportation_needed" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                            <option value="no" {{ old('transportation_needed', 'no') === 'no' ? 'selected' : '' }}>No</option>
                            <option value="yes" {{ old('transportation_needed') === 'yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <label for="dietary_restrictions" class="block text-sm font-semibold text-gray-700 mb-2">Dietary Restrictions</label>
                    <textarea id="dietary_restrictions" name="dietary_restrictions" rows="2" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="Any dietary restrictions or allergies?">{{ old('dietary_restrictions') }}</textarea>
                </div>
                
                <div>
                    <label for="special_requirements" class="block text-sm font-semibold text-gray-700 mb-2">Special Requirements</label>
                    <textarea id="special_requirements" name="special_requirements" rows="3" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="Any special requirements or accessibility needs?">{{ old('special_requirements') }}</textarea>
                </div>
                
                <div class="border-t-2 border-gray-200 pt-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Emergency Contact</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="emergency_contact_name" class="block text-sm font-semibold text-gray-700 mb-2">Contact Name</label>
                            <input type="text" id="emergency_contact_name" name="emergency_contact_name" value="{{ old('emergency_contact_name') }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        </div>
                        <div>
                            <label for="emergency_contact_phone" class="block text-sm font-semibold text-gray-700 mb-2">Contact Phone</label>
                            <input type="tel" id="emergency_contact_phone" name="emergency_contact_phone" value="{{ old('emergency_contact_phone') }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" class="flex-1 px-6 py-4 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-xl font-bold text-lg hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                        Submit Registration
                    </button>
                    <a href="{{ route('event.show', $event->slug) }}" class="px-6 py-4 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection


