@extends('admin.layout')

@section('title', 'Homepage Management')
@section('subtitle', 'Manage homepage sections and content')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Homepage Management</h1>
    <p class="text-gray-600 mt-2">Edit hero section, about, vision, mission, and more</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.homepage.update') }}" method="POST">
        @csrf
        
        <!-- Hero Section -->
        <div class="mb-12 pb-8 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
                Hero Section
            </h2>
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="hero_title" class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" id="hero_title" name="homepage_hero_title" value="{{ old('homepage_hero_title', $settings['hero_title']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Welcome to ICCR Tanzania">
                </div>
                
                <div>
                    <label for="hero_subtitle" class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <textarea id="hero_subtitle" name="homepage_hero_subtitle" rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Your subtitle text here">{{ old('homepage_hero_subtitle', $settings['hero_subtitle']) }}</textarea>
                </div>
                
                <div>
                    <label for="hero_image" class="block text-sm font-medium text-gray-700 mb-2">Hero Image URL</label>
                    <input type="url" id="hero_image" name="homepage_hero_image" value="{{ old('homepage_hero_image', $settings['hero_image']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="https://example.com/image.jpg">
                    <p class="mt-1 text-sm text-gray-500">Enter Cloudinary URL or external image link</p>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="mb-12 pb-8 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                About Section
            </h2>
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="about_title" class="block text-sm font-medium text-gray-700 mb-2">About Title</label>
                    <input type="text" id="about_title" name="homepage_about_title" value="{{ old('homepage_about_title', $settings['about_title']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                
                <div>
                    <label for="about_content" class="block text-sm font-medium text-gray-700 mb-2">About Content</label>
                    <div id="about_editor" style="height: 300px;"></div>
                    <textarea name="homepage_about_content" id="about_content" class="hidden">{{ old('homepage_about_content', $settings['about_content']) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Vision & Mission -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Vision
                </h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="vision_title" class="block text-sm font-medium text-gray-700 mb-2">Vision Title</label>
                        <input type="text" id="vision_title" name="homepage_vision_title" value="{{ old('homepage_vision_title', $settings['vision_title']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="vision_content" class="block text-sm font-medium text-gray-700 mb-2">Vision Content</label>
                        <textarea id="vision_content" name="homepage_vision_content" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('homepage_vision_content', $settings['vision_content']) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Mission
                </h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="mission_title" class="block text-sm font-medium text-gray-700 mb-2">Mission Title</label>
                        <input type="text" id="mission_title" name="homepage_mission_title" value="{{ old('homepage_mission_title', $settings['mission_title']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="mission_content" class="block text-sm font-medium text-gray-700 mb-2">Mission Content</label>
                        <textarea id="mission_content" name="homepage_mission_content" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('homepage_mission_content', $settings['mission_content']) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition font-semibold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save Homepage Settings
            </button>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    var aboutQuill = new Quill('#about_editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

    // Set initial content
    @if(old('homepage_about_content', $settings['about_content']))
        aboutQuill.root.innerHTML = {!! json_encode(old('homepage_about_content', $settings['about_content'])) !!};
    @endif

    aboutQuill.on('text-change', function() {
        document.getElementById('about_content').value = aboutQuill.root.innerHTML;
    });

    // Update hidden field before form submit
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('about_content').value = aboutQuill.root.innerHTML;
    });
</script>
@endpush
@endsection

