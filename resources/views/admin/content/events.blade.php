@extends('layouts.admin')

@section('title', 'Manage Events')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Events</h1>
            <p class="text-sm text-gray-500">Manage upcoming and past events.</p>
        </div>
        <button class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-colors shadow-sm">
            <i class="ph ph-plus text-lg"></i>
            Create New Event
        </button>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <!-- Toolbar -->
        <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row gap-4 justify-between items-center bg-gray-50/50">
            <div class="relative w-full sm:w-72">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="ph ph-magnifying-glass text-gray-400"></i>
                </span>
                <input type="text" placeholder="Search events..." class="pl-10 pr-4 py-2 w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>Status: All</option>
                    <option>Upcoming</option>
                    <option>Past</option>
                </select>
            </div>
        </div>

        <!-- Events List -->
        <div class="divide-y divide-gray-100">
            <!-- Event Item 1 -->
            <div class="p-4 hover:bg-gray-50 transition-colors flex flex-col sm:flex-row items-center gap-4">
                <div class="h-16 w-16 rounded-lg bg-indigo-100 flex-shrink-0 flex flex-col items-center justify-center text-indigo-700">
                    <span class="text-xs font-bold uppercase">MAY</span>
                    <span class="text-xl font-bold">25</span>
                </div>
                <div class="flex-1 min-w-0 text-center sm:text-left">
                    <h3 class="text-base font-semibold text-gray-900">Karisma Katoliki 2025</h3>
                    <p class="text-sm text-gray-500 flex items-center justify-center sm:justify-start gap-2 mt-1">
                        <i class="ph ph-map-pin"></i> Msimbazi Center, Dar es Salaam
                        <span class="hidden sm:inline text-gray-300">|</span>
                        <i class="ph ph-clock"></i> 08:00 AM - 05:00 PM
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        Upcoming
                    </span>
                    <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors">
                        <i class="ph ph-pencil-simple text-xl"></i>
                    </button>
                    <button class="p-2 text-gray-400 hover:text-red-600 transition-colors">
                        <i class="ph ph-trash text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Event Item 2 -->
             <div class="p-4 hover:bg-gray-50 transition-colors flex flex-col sm:flex-row items-center gap-4">
                <div class="h-16 w-16 rounded-lg bg-gray-100 flex-shrink-0 flex flex-col items-center justify-center text-gray-500">
                    <span class="text-xs font-bold uppercase">APR</span>
                    <span class="text-xl font-bold">10</span>
                </div>
                <div class="flex-1 min-w-0 text-center sm:text-left">
                    <h3 class="text-base font-semibold text-gray-900">Easter Worship Night</h3>
                    <p class="text-sm text-gray-500 flex items-center justify-center sm:justify-start gap-2 mt-1">
                        <i class="ph ph-map-pin"></i> St. Peter's Church
                        <span class="hidden sm:inline text-gray-300">|</span>
                        <i class="ph ph-clock"></i> 07:00 PM
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                        Past
                    </span>
                    <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors">
                        <i class="ph ph-pencil-simple text-xl"></i>
                    </button>
                    <button class="p-2 text-gray-400 hover:text-red-600 transition-colors">
                        <i class="ph ph-trash text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-center">
            <button class="text-sm text-indigo-600 font-medium hover:underline">Load More Events</button>
        </div>
    </div>
@endsection
