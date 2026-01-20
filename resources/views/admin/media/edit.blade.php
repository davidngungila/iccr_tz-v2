@extends('admin.layout')

@section('title', 'Edit Media')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Edit Media</h1>
    <p class="text-gray-600 mt-2">Update media information</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Preview -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Preview</h2>
        @if($media->type === 'image')
            <img src="{{ $media->url }}" alt="{{ $media->title }}" class="w-full rounded-lg">
        @else
            <div class="w-full bg-gray-900 rounded-lg flex items-center justify-center h-64">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </div>
        @endif
        <div class="mt-4">
            <p class="text-sm text-gray-600">Type: <span class="font-semibold">{{ ucfirst($media->type) }}</span></p>
            @if($media->cloudinary_public_id)
                <p class="text-sm text-gray-600">Cloudinary ID: <span class="font-mono text-xs">{{ $media->cloudinary_public_id }}</span></p>
            @endif
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Edit Information</h2>
        <form action="{{ route('admin.media.update', $media) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL *</label>
                <input type="url" id="url" name="url" value="{{ old('url', $media->url) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $media->title) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $media->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <input type="text" id="category" name="category" value="{{ old('category', $media->category) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $media->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                    Update Media
                </button>
                <a href="{{ route('admin.media') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

