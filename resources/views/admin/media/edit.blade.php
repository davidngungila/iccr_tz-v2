@extends('admin.layout')

@section('title', 'Edit Media')
@section('subtitle', 'Update media information')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Edit Media</h1>
    <p class="text-gray-600 mt-2">Update media information and settings</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.media.update', $media) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label for="url" class="block text-sm font-medium text-gray-700 mb-2">Media URL *</label>
            <input type="url" id="url" name="url" value="{{ old('url', $media->url) }}" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $media->title) }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea id="description" name="description" rows="3"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $media->description) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category', $media->category) }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="flex items-center pt-4">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $media->is_active) ? 'checked' : '' }}
                       class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <span class="ml-2 text-sm text-gray-700">Active</span>
            </label>
        </div>

        <div class="flex items-center gap-4 mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                Update Media
            </button>
            <a href="{{ route('admin.media') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </div>
    </form>
</div>
@endsection
