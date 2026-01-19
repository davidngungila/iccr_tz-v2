@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Settings</h1>
            <p class="text-sm text-gray-500">Manage general site configuration and preferences.</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden divide-y divide-gray-100">
            <!-- General Settings -->
            <div class="p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="ph ph-globe text-indigo-600"></i> General Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Site Title</label>
                        <input type="text" value="ICCR Tanzania" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contact Email</label>
                        <input type="email" value="info@icccr.or.tz" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                        <textarea rows="3" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">Inter-Colleges Catholic Charismatic Renewal Tanzania.</textarea>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="ph ph-share-network text-indigo-600"></i> Social Media Links
                </h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-8 flex justify-center"><i class="ph ph-facebook-logo text-2xl text-blue-600"></i></div>
                        <input type="text" placeholder="Facebook URL" class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-8 flex justify-center"><i class="ph ph-instagram-logo text-2xl text-pink-600"></i></div>
                        <input type="text" placeholder="Instagram URL" class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                    <div class="flex items-center gap-4">
                         <div class="w-8 flex justify-center"><i class="ph ph-youtube-logo text-2xl text-red-600"></i></div>
                        <input type="text" placeholder="YouTube Channel URL" class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="p-4 bg-gray-50 flex justify-end gap-3">
                <button class="px-4 py-2 text-gray-600 hover:text-gray-800 font-medium">Cancel</button>
                <button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium shadow-sm transition-colors">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
@endsection
