@extends('admin.layout')

@section('title', 'Edit Page Content')
@section('subtitle', 'Edit content for: ' . $pageName)

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Edit {{ ucfirst($pageName) }} Page</h1>
    <p class="text-gray-600 mt-2">Edit the content sections of this page</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.pages.update-content', $pageName) }}" method="POST">
        @csrf
        
        @php
            use App\Models\Setting;
        @endphp
        
        @if($pageName === 'about')
            <!-- About Page Sections -->
            <div class="space-y-8">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', Setting::get('about_hero_title', 'About ICCR Tanzania')) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <textarea name="hero_subtitle" rows="2"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">{{ old('hero_subtitle', Setting::get('about_hero_subtitle', '')) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Main Content</label>
                    <div id="content_editor" style="height: 400px;"></div>
                    <textarea name="main_content" id="main_content" class="hidden">{{ old('main_content', Setting::get('about_main_content', '')) }}</textarea>
                </div>
            </div>
        @elseif($pageName === 'ministries')
            <!-- Ministries Page Sections -->
            <div class="space-y-8">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', Setting::get('ministries_hero_title', 'Our Ministries')) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Description</label>
                    <textarea name="hero_description" rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">{{ old('hero_description', Setting::get('ministries_hero_description', '')) }}</textarea>
                </div>
            </div>
        @else
            <!-- Generic Page Content -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Page Content</label>
                <div id="content_editor" style="height: 500px;"></div>
                <textarea name="page_content" id="page_content" class="hidden">{{ old('page_content', Setting::get($pageName . '_content', '')) }}</textarea>
            </div>
        @endif

        <div class="flex items-center gap-4 mt-8 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-8 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold">
                Save Content
            </button>
            <a href="{{ route('admin.pages') }}" class="text-gray-600 hover:text-gray-900">Back to Pages</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    var quill = new Quill('#content_editor', {
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

    const contentField = document.getElementById('main_content') || document.getElementById('page_content');
    if (contentField && contentField.value) {
        quill.root.innerHTML = contentField.value;
    }

    quill.on('text-change', function() {
        if (contentField) {
            contentField.value = quill.root.innerHTML;
        }
    });

    document.querySelector('form').addEventListener('submit', function() {
        if (contentField) {
            contentField.value = quill.root.innerHTML;
        }
    });
</script>
@endpush
@endsection

