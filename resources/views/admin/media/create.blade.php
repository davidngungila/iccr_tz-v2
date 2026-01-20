@extends('admin.layout')

@section('title', 'Add Media')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Add Media</h1>
    <p class="text-gray-600 mt-2">Upload files to Cloudinary or add external URLs</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Upload Form -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Upload File to Cloudinary</h2>
        <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-6">
                <label for="file" class="block text-sm font-medium text-gray-700 mb-2">File *</label>
                <input type="file" id="file" name="file" required accept="image/*,video/*"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="mt-1 text-sm text-gray-500">Max 10MB. Images: JPG, PNG, GIF, WEBP. Videos: MP4, MOV, AVI</p>
                @error('file')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="upload_title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" id="upload_title" name="title" value="{{ old('title') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-6">
                <label for="upload_description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="upload_description" name="description" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description') }}</textarea>
            </div>

            <div class="mb-6">
                <label for="upload_category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <input type="text" id="upload_category" name="category" value="{{ old('category') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="e.g., hero, gallery, testimonial">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                Upload to Cloudinary
            </button>
        </form>
    </div>

    <!-- External URL Form -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Add External URL</h2>
        <p class="text-sm text-gray-600 mb-4">Add a link to an image or video from Cloudinary or any external source</p>
        
        <form action="{{ route('admin.media.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL *</label>
                <input type="url" id="url" name="url" value="{{ old('url') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="https://res.cloudinary.com/...">
                <p class="mt-1 text-sm text-gray-500">Enter Cloudinary URL or any external image/video URL</p>
                @error('url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
                <select id="type" name="type" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="image" {{ old('type') === 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ old('type') === 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="url_title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" id="url_title" name="title" value="{{ old('title') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-6">
                <label for="url_description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="url_description" name="description" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description') }}</textarea>
            </div>

            <div class="mb-6">
                <label for="url_category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <input type="text" id="url_category" name="category" value="{{ old('category') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="e.g., hero, gallery, testimonial">
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-semibold">
                Add URL
            </button>
        </form>
    </div>
</div>

<div class="mt-6">
    <a href="{{ route('admin.media') }}" class="text-gray-600 hover:text-gray-900">← Back to Media</a>
</div>
@endsection

