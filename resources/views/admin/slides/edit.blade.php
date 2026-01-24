@extends('admin.layout')

@section('title', 'Edit Carousel Slide')
@section('subtitle', 'Update carousel slide details')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Edit Carousel Slide</h1>
    <p class="text-gray-600 mt-2">Update slide: {{ $slide->title }}</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.slides.update', $slide) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="space-y-8">
            <!-- Basic Information -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Basic Information</h2>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" name="title" value="{{ old('title', $slide->title) }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Unity in Faith">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $slide->subtitle) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Uniting Catholic students across Tanzania">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                  placeholder="Additional description text...">{{ old('description', $slide->description) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Image Upload -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Image</h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image URL *</label>
                    <input type="url" name="image_url" id="image_url" value="{{ old('image_url', $slide->image_url) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="https://res.cloudinary.com/... or https://example.com/image.jpg">
                    <p class="mt-2 text-sm text-gray-500">
                        Enter Cloudinary URL from <a href="https://cloudinary.com/users/login?RelayState=/app/c-ff9ffde98929eae2d0f0bf7c1b571e/assets/media_library/search" target="_blank" class="text-blue-600 hover:underline">Cloudinary Media Library</a> or any image URL
                    </p>
                    <div id="image_preview" class="mt-4">
                        <img id="preview_img" src="{{ $slide->image_url }}" alt="Preview" class="max-w-md h-48 rounded-lg shadow-lg">
                    </div>
                </div>
            </div>

            <!-- Animation & Styling -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Animation & Styling</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Animation Type *</label>
                        <select name="animation_type" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="slide-fade" {{ old('animation_type', $slide->animation_type) == 'slide-fade' ? 'selected' : '' }}>Fade In</option>
                            <option value="slide-left" {{ old('animation_type', $slide->animation_type) == 'slide-left' ? 'selected' : '' }}>Slide from Left</option>
                            <option value="slide-right" {{ old('animation_type', $slide->animation_type) == 'slide-right' ? 'selected' : '' }}>Slide from Right</option>
                            <option value="slide-zoom" {{ old('animation_type', $slide->animation_type) == 'slide-zoom' ? 'selected' : '' }}>Zoom In</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                        <input type="number" name="order" value="{{ old('order', $slide->order) }}" min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gradient From</label>
                        <input type="text" name="gradient_from" value="{{ old('gradient_from', $slide->gradient_from) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="green-600">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gradient Via</label>
                        <input type="text" name="gradient_via" value="{{ old('gradient_via', $slide->gradient_via) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="blue-600">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gradient To</label>
                        <input type="text" name="gradient_to" value="{{ old('gradient_to', $slide->gradient_to) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="green-800">
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Call-to-Action Buttons</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Button 1</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                                <input type="text" name="button_1_text" value="{{ old('button_1_text', $slide->button_1_text) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       placeholder="Join Us">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Button URL</label>
                                <input type="url" name="button_1_url" value="{{ old('button_1_url', $slide->button_1_url) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       placeholder="https://example.com">
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Button 2</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                                <input type="text" name="button_2_text" value="{{ old('button_2_text', $slide->button_2_text) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       placeholder="View Events">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Button URL</label>
                                <input type="url" name="button_2_url" value="{{ old('button_2_url', $slide->button_2_url) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       placeholder="https://example.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Urgent Badge -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Urgent Badge</h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <input type="checkbox" name="is_urgent" id="is_urgent" value="1" {{ old('is_urgent', $slide->is_urgent) ? 'checked' : '' }}
                               class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <label for="is_urgent" class="text-sm font-medium text-gray-700">
                            Show urgent badge (🔥 URGENT)
                        </label>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Custom Badge Text</label>
                        <input type="text" name="urgent_badge_text" value="{{ old('urgent_badge_text', $slide->urgent_badge_text) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="🔥 URGENT">
                    </div>
                </div>
            </div>

            <!-- Status -->
            <div>
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $slide->is_active) ? 'checked' : '' }}
                           class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <label for="is_active" class="text-sm font-medium text-gray-700">
                        Active (Show this slide on homepage)
                    </label>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 mt-8 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-8 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Update Slide
            </button>
            <a href="{{ route('admin.slides.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Image preview
    document.getElementById('image_url').addEventListener('input', function() {
        const url = this.value;
        const preview = document.getElementById('image_preview');
        const img = document.getElementById('preview_img');
        
        if (url && (url.startsWith('http://') || url.startsWith('https://'))) {
            img.src = url;
            preview.classList.remove('hidden');
        } else {
            preview.classList.add('hidden');
        }
    });
</script>
@endpush
@endsection

