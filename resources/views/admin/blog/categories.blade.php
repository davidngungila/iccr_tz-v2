@extends('admin.layout')

@section('title', 'Blog Categories')
@section('subtitle', 'Manage blog post categories')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Blog Categories</h1>
        <p class="text-gray-600 mt-2">Organize your blog posts with categories</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Add Category Form -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Add New Category</h2>
        <form action="{{ route('admin.blog.categories.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label>
                    <input type="text" id="name" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" id="slug" name="slug"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="auto-generated">
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                    Add Category
                </button>
            </div>
        </form>
    </div>

    <!-- Categories List -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">All Categories</h2>
        <div class="space-y-3">
            @forelse($categories as $category)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $category->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $category->description ?? 'No description' }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $category->posts_count }} posts</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 text-center py-4">No categories yet</p>
            @endforelse
        </div>
    </div>
</div>
@endsection

