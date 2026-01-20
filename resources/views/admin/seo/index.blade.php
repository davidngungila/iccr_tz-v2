@extends('admin.layout')

@section('title', 'SEO & Analytics')
@section('subtitle', 'Manage SEO settings and analytics')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">SEO & Analytics</h1>
    <p class="text-gray-600 mt-2">Configure SEO settings, meta tags, and analytics</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.seo.update') }}" method="POST">
        @csrf
        
        <div class="space-y-8">
            <!-- Default Meta Tags -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">🔍</span>
                    Default Meta Tags
                </h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Default Meta Title</label>
                        <input type="text" name="seo_meta_default_title" value="{{ old('seo_meta_default_title', $settings['meta_default_title']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="ICCR Tanzania - Inter-Colleges Catholic Charismatic Renewal">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Default Meta Description</label>
                        <textarea name="seo_meta_default_description" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                  placeholder="Default description for pages without specific meta description">{{ old('seo_meta_default_description', $settings['meta_default_description']) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Open Graph Image</label>
                        <input type="url" name="seo_og_image" value="{{ old('seo_og_image', $settings['og_image']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="https://example.com/og-image.jpg">
                        <p class="mt-1 text-sm text-gray-500">Image for social media sharing (1200x630px recommended)</p>
                    </div>
                </div>
            </div>

            <!-- Google Analytics -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">📊</span>
                    Google Analytics
                </h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Google Analytics Code (G-XXXXXXXXXX)</label>
                    <input type="text" name="seo_google_analytics" value="{{ old('seo_google_analytics', $settings['google_analytics']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="G-XXXXXXXXXX">
                    <p class="mt-1 text-sm text-gray-500">Enter your Google Analytics tracking ID</p>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 mt-8 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-8 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold">
                Save SEO Settings
            </button>
        </div>
    </form>
</div>
@endsection

