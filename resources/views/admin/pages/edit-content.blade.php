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
        @elseif($pageName === 'graduate')
            <!-- Graduate Page Sections -->
            <div class="space-y-8">
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                    <h3 class="font-bold text-blue-900 mb-4">Hero Section</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                            <input type="text" name="hero_title" value="{{ old('hero_title', Setting::get('graduate_hero_title', 'Faith in the Marketplace')) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                            <textarea name="hero_subtitle" rows="2"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">{{ old('hero_subtitle', Setting::get('graduate_hero_subtitle', 'Empowering Catholic professionals to lead with integrity, serve with compassion, and transform society through the Gospel.')) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                    <h3 class="font-bold text-purple-900 mb-4">Mission & Purpose</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Purpose Description</label>
                        <div id="purpose_editor" style="height: 200px;"></div>
                        <textarea name="purpose_content" id="purpose_content" class="hidden">{{ old('purpose_content', Setting::get('graduate_purpose_content', 'To sustain the spiritual fire experienced in college and channel it into impactful Christian leadership in society and the workplace.')) }}</textarea>
                    </div>
                </div>

                <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                    <h3 class="font-bold text-green-900 mb-4">Benefits Section</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Benefits Description</label>
                        <div id="benefits_editor" style="height: 200px;"></div>
                        <textarea name="benefits_content" id="benefits_content" class="hidden">{{ old('benefits_content', Setting::get('graduate_benefits_content', '')) }}</textarea>
                    </div>
                </div>

                <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-200">
                    <h3 class="font-bold text-indigo-900 mb-4">How to Join Section</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Join Instructions</label>
                        <div id="join_editor" style="height: 200px;"></div>
                        <textarea name="join_content" id="join_content" class="hidden">{{ old('join_content', Setting::get('graduate_join_content', '')) }}</textarea>
                    </div>
                </div>

                <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                    <h3 class="font-bold text-yellow-900 mb-4">FAQ Section</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">FAQ Content (JSON format for questions/answers)</label>
                        <textarea name="faq_content" rows="10"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 font-mono text-sm">{{ old('faq_content', Setting::get('graduate_faq_content', '')) }}</textarea>
                        <p class="text-xs text-gray-500 mt-2">Enter FAQ items in JSON format or plain text</p>
                    </div>
                </div>
            </div>
        @elseif(in_array($pageName, ['leadership', 'history', 'programs', 'partnerships']))
            <!-- New Pages Sections -->
            <div class="space-y-8">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', Setting::get($pageName . '_hero_title', ucfirst($pageName))) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <textarea name="hero_subtitle" rows="2"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">{{ old('hero_subtitle', Setting::get($pageName . '_hero_subtitle', '')) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Main Content</label>
                    <div id="content_editor" style="height: 500px;"></div>
                    <textarea name="main_content" id="main_content" class="hidden">{{ old('main_content', Setting::get($pageName . '_main_content', '')) }}</textarea>
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
    // Initialize Quill editors
    const quillConfig = {
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
    };

    // Main content editor
    const contentEditor = document.getElementById('content_editor');
    if (contentEditor) {
        var quill = new Quill('#content_editor', quillConfig);
        const contentField = document.getElementById('main_content') || document.getElementById('page_content');
        if (contentField && contentField.value) {
            quill.root.innerHTML = contentField.value;
        }
        quill.on('text-change', function() {
            if (contentField) {
                contentField.value = quill.root.innerHTML;
            }
        });
    }

    // Graduate page specific editors
    @if($pageName === 'graduate')
    const purposeEditor = document.getElementById('purpose_editor');
    if (purposeEditor) {
        var quillPurpose = new Quill('#purpose_editor', quillConfig);
        const purposeField = document.getElementById('purpose_content');
        if (purposeField && purposeField.value) {
            quillPurpose.root.innerHTML = purposeField.value;
        }
        quillPurpose.on('text-change', function() {
            if (purposeField) {
                purposeField.value = quillPurpose.root.innerHTML;
            }
        });
    }

    const benefitsEditor = document.getElementById('benefits_editor');
    if (benefitsEditor) {
        var quillBenefits = new Quill('#benefits_editor', quillConfig);
        const benefitsField = document.getElementById('benefits_content');
        if (benefitsField && benefitsField.value) {
            quillBenefits.root.innerHTML = benefitsField.value;
        }
        quillBenefits.on('text-change', function() {
            if (benefitsField) {
                benefitsField.value = quillBenefits.root.innerHTML;
            }
        });
    }

    const joinEditor = document.getElementById('join_editor');
    if (joinEditor) {
        var quillJoin = new Quill('#join_editor', quillConfig);
        const joinField = document.getElementById('join_content');
        if (joinField && joinField.value) {
            quillJoin.root.innerHTML = joinField.value;
        }
        quillJoin.on('text-change', function() {
            if (joinField) {
                joinField.value = quillJoin.root.innerHTML;
            }
        });
    }
    @endif

    // Form submission handler
    document.querySelector('form').addEventListener('submit', function() {
        const contentField = document.getElementById('main_content') || document.getElementById('page_content');
        if (contentField && quill) {
            contentField.value = quill.root.innerHTML;
        }
        @if($pageName === 'graduate')
        const purposeField = document.getElementById('purpose_content');
        if (purposeField && quillPurpose) {
            purposeField.value = quillPurpose.root.innerHTML;
        }
        const benefitsField = document.getElementById('benefits_content');
        if (benefitsField && quillBenefits) {
            benefitsField.value = quillBenefits.root.innerHTML;
        }
        const joinField = document.getElementById('join_content');
        if (joinField && quillJoin) {
            joinField.value = quillJoin.root.innerHTML;
        }
        @endif
    });
</script>
@endpush
@endsection

