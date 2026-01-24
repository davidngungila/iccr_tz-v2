@extends('admin.layout')

@section('title', 'Edit Team Member - ' . $teamMember->name . ' - ICCR Admin')

@section('content')
<div class="p-6 md:p-8">
    <div class="mb-8">
        <a href="{{ route('admin.team') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 mb-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Team
        </a>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Team Member: {{ $teamMember->name }}</h1>
        <p class="text-gray-600">Update leadership profile information</p>
    </div>

    <form action="{{ route('admin.team.update', $teamMember->id) }}" method="POST" class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 md:p-8">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $teamMember->name) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Title/Position</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $teamMember->title) }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="e.g., National Coordinator">
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                    <input type="text" id="role" name="role" value="{{ old('role', $teamMember->role) }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="e.g., Programs Director">
                    @error('role')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Display Order</label>
                    <input type="number" id="order" name="order" value="{{ old('order', $teamMember->order) }}" min="0" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    @error('order')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="bio" class="block text-sm font-semibold text-gray-700 mb-2">Biography</label>
                <textarea id="bio" name="bio" rows="4" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="Brief biography about the team member...">{{ old('bio', $teamMember->bio) }}</textarea>
                @error('bio')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="photo" class="block text-sm font-semibold text-gray-700 mb-2">Photo URL</label>
                <input type="url" id="photo" name="photo" value="{{ old('photo', $teamMember->photo) }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="https://example.com/photo.jpg">
                <p class="text-xs text-gray-500 mt-1">Enter a URL to the team member's photo (or use Cloudinary)</p>
                @error('photo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $teamMember->email) }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone', $teamMember->phone) }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    @error('phone')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <div class="flex items-center gap-3">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }} class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <label for="is_active" class="text-sm text-gray-700">Active (visible on website)</label>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-6 border-t-2 border-gray-200">
                <a href="{{ route('admin.team') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl">
                    Update Member
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

