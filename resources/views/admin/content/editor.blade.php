@extends('layouts.admin')

@section('title', 'Content Editor')

@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Content</h1>
                <p class="text-sm text-gray-500">Create or update your page content.</p>
            </div>
            <div class="flex gap-3">
                <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition">
                    Save Draft
                </button>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-sm">
                    Publish
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Editor Area -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title Input -->
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Page Title</label>
                    <input type="text" placeholder="Enter title here..." class="w-full text-xl font-bold px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none placeholder-gray-300">
                    <div class="mt-2 text-xs text-gray-500">Slug: <span class="font-mono bg-gray-100 px-1 py-0.5 rounded">/enter-title-here</span></div>
                </div>

                <!-- Rich Text Editor -->
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="border-b border-gray-200 bg-gray-50 px-4 py-3">
                        <label class="text-sm font-medium text-gray-700">Content</label>
                    </div>
                    <!-- Quill Container -->
                    <div id="editor-container" class="h-96 text-lg"></div>
                </div>
            </div>

            <!-- Sidebar settings -->
            <div class="space-y-6">
                <!-- Status Card -->
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-4">Publishing</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Status</label>
                            <select class="w-full border-gray-200 rounded-lg text-sm focus:ring-indigo-500">
                                <option>Published</option>
                                <option>Draft</option>
                                <option>Archived</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Visibility</label>
                            <select class="w-full border-gray-200 rounded-lg text-sm focus:ring-indigo-500">
                                <option>Public</option>
                                <option>Private</option>
                                <option>Password Protected</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Publish Date</label>
                            <input type="date" class="w-full border-gray-200 rounded-lg text-sm focus:ring-indigo-500">
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-4">Featured Image</h3>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:bg-gray-50 transition cursor-pointer">
                        <i class="ph ph-image text-3xl text-gray-400 mb-2"></i>
                        <p class="text-sm text-gray-500">Click to upload or drag and drop</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor-container', {
                theme: 'snow',
                placeholder: 'Write your masterpiece...',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'color': [] }, { 'background': [] }],
                        ['link', 'image'],
                        ['clean']
                    ]
                }
            });
        });
    </script>
    <style>
        .ql-toolbar { border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 1px solid #e5e7eb !important; background: #f9fafb; }
        .ql-container { border: none !important; font-family: 'Inter', sans-serif; }
        .ql-editor { padding: 1.5rem; }
    </style>
    @endpush
@endsection
