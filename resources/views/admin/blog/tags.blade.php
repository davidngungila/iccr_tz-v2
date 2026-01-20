@extends('admin.layout')

@section('title', 'Blog Tags')
@section('subtitle', 'Manage blog post tags')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Blog Tags</h1>
        <p class="text-gray-600 mt-2">Organize your blog posts with tags</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Add Tag Form -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Add New Tag</h2>
        <form action="{{ route('admin.blog.tags.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Tag Name *</label>
                    <input type="text" id="name" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" id="slug" name="slug"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="auto-generated">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                    Add Tag
                </button>
            </div>
        </form>
    </div>

    <!-- Tags List -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">All Tags</h2>
        <div class="flex flex-wrap gap-2">
            @forelse($tags as $tag)
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                        {{ $tag->name }} ({{ $tag->posts_count }})
                    </span>
            @empty
                <p class="text-gray-600">No tags yet</p>
            @endforelse
        </div>
    </div>
</div>
@endsection

