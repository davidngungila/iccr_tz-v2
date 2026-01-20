@extends('admin.layout')

@section('title', 'Add Media')
@section('subtitle', 'Add media from URL or Cloudinary')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Add Media</h1>
    <p class="text-gray-600 mt-2">Add media from external URL or Cloudinary link</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.media.store') }}" method="POST">
        @csrf
        
        <div class="mb-6">
            <label for="url" class="block text-sm font-medium text-gray-700 mb-2">Media URL *</label>
            <input type="url" id="url" name="url" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                   placeholder="https://cloudinary.com/... or https://example.com/image.jpg">
            <p class="mt-1 text-sm text-gray-500">Enter Cloudinary URL or external media link</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Media Type *</label>
                <select id="type" name="type" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                    <option value="document">Document (PDF)</option>
                </select>
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <input type="text" id="category" name="category"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="hero, gallery, etc.">
            </div>
        </div>

        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
            <input type="text" id="title" name="title"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea id="description" name="description" rows="3"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
        </div>

        <div class="flex items-center pt-4">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" checked
                       class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <span class="ml-2 text-sm text-gray-700">Active</span>
            </label>
        </div>

        <div class="flex items-center gap-4 mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                Add Media
            </button>
            <a href="{{ route('admin.media') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </div>
    </form>
</div>
@endsection
