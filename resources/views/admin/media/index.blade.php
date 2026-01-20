@extends('admin.layout')

@section('title', 'Media Management')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Media Management</h1>
        <p class="text-gray-600 mt-2">Manage images and videos from Cloudinary</p>
    </div>
    <a href="{{ route('admin.media.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
        + Add Media
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse($media as $item)
        <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
            @if($item->type === 'image')
                <img src="{{ $item->url }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-900 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </div>
            @endif
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 mb-1">{{ $item->title ?? 'Untitled' }}</h3>
                <p class="text-sm text-gray-600 mb-2">{{ ucfirst($item->type) }} • {{ $item->category ?? 'Uncategorized' }}</p>
                <div class="flex items-center justify-between">
                    <span class="px-2 py-1 text-xs rounded {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $item->is_active ? 'Active' : 'Inactive' }}
                    </span>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.media.edit', $item) }}" class="text-blue-600 hover:text-blue-800 text-sm">Edit</a>
                        <form action="{{ route('admin.media.delete', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-600">No media found. Add your first media item!</p>
        </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $media->links() }}
</div>
@endsection

