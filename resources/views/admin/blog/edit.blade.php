@extends('admin.layout')

@section('title', 'Edit Blog Post')
@section('subtitle', 'Update blog post content')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Edit Blog Post</h1>
    <p class="text-gray-600 mt-2">Update blog post content and settings</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.blog.update', $blogPost) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title', $blogPost->title) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $blogPost->slug) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div class="mb-6">
            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
            <textarea id="excerpt" name="excerpt" rows="3"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
            <div id="editor" style="height: 500px;"></div>
            <textarea name="content" id="content" class="hidden" required>{{ old('content', $blogPost->content) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image URL</label>
                <input type="url" id="featured_image" name="featured_image" value="{{ old('featured_image', $blogPost->featured_image) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <select id="category_id" name="category_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $blogPost->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                <select id="status" name="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="draft" {{ old('status', $blogPost->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $blogPost->status) === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="scheduled" {{ old('status', $blogPost->status) === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>
            </div>

            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Published At</label>
                <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', $blogPost->published_at ? $blogPost->published_at->format('Y-m-d\TH:i') : '') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="flex items-center pt-8">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $blogPost->is_featured) ? 'checked' : '' }}
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Featured Post</span>
                </label>
            </div>
        </div>

        <div class="mb-6">
            <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
            <select id="tags" name="tags[]" multiple
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $selectedTags)) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $blogPost->meta_title) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                <textarea id="meta_description" name="meta_description" rows="2"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('meta_description', $blogPost->meta_description) }}</textarea>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                Update Post
            </button>
            <a href="{{ route('admin.blog.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'color': [] }, { 'background': [] }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    quill.root.innerHTML = {!! json_encode(old('content', $blogPost->content)) !!};

    quill.on('text-change', function() {
        document.getElementById('content').value = quill.root.innerHTML;
    });

    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('content').value = quill.root.innerHTML;
    });
</script>
@endpush
@endsection

