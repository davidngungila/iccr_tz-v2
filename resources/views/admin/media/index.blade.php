@extends('admin.layout')

@section('title', 'Media Library')
@section('subtitle', 'Manage images, videos, and documents')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Media Library</h1>
        <p class="text-gray-600 mt-2">Manage all media files (images, videos, documents)</p>
    </div>
    <a href="{{ route('admin.media.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Media
    </a>
</div>

<!-- Upload Section -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-6">
    <h2 class="text-xl font-bold text-gray-900 mb-4">Upload New Media</h2>
    <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700 mb-2">File *</label>
                <input type="file" id="file" name="file" required accept="image/*,video/*,.pdf"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label for="upload_title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" id="upload_title" name="title"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label for="upload_category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <input type="text" id="upload_category" name="category"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition font-semibold">
            Upload to Cloudinary
        </button>
    </form>
</div>

<!-- Media Grid -->
<div class="bg-white rounded-xl shadow-lg p-6">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($media as $item)
            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                @if($item->type === 'image')
                    <img src="{{ $item->url }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                @elseif($item->type === 'video')
                    <div class="w-full h-48 bg-gray-900 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                @else
                    <div class="w-full h-48 bg-red-100 flex items-center justify-center">
                        <svg class="w-16 h-16 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                @endif
                <div class="p-3">
                    <h3 class="font-semibold text-sm text-gray-900 truncate">{{ $item->title ?? 'Untitled' }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ ucfirst($item->type) }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <a href="{{ route('admin.media.edit', $item) }}" class="text-blue-600 hover:text-blue-900 text-xs">Edit</a>
                        <form action="{{ route('admin.media.delete', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this media?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 text-xs">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-gray-600">
                No media files yet. Upload your first file!
            </div>
        @endforelse
    </div>
    
    <div class="mt-6">
        {{ $media->links() }}
    </div>
</div>
@endsection
