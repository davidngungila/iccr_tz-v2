@extends('admin.layout')

@section('title', 'Footer & Info')
@section('subtitle', 'Manage footer content and information')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Footer & Info</h1>
    <p class="text-gray-600 mt-2">Manage contact information, social media links, and footer content</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.footer.update') }}" method="POST">
        @csrf
        
        <div class="space-y-8">
            <!-- Contact Information -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">📞</span>
                    Contact Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="footer_contact_email" value="{{ old('footer_contact_email', $settings['contact_email']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                        <input type="text" name="footer_contact_phone" value="{{ old('footer_contact_phone', $settings['contact_phone']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <textarea name="footer_contact_address" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('footer_contact_address', $settings['contact_address']) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Social Media Links -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">🔗</span>
                    Social Media Links
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Facebook</label>
                        <input type="url" name="footer_social_facebook" value="{{ old('footer_social_facebook', $settings['social_facebook']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="https://facebook.com/...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">YouTube</label>
                        <input type="url" name="footer_social_youtube" value="{{ old('footer_social_youtube', $settings['social_youtube']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="https://youtube.com/...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                        <input type="url" name="footer_social_instagram" value="{{ old('footer_social_instagram', $settings['social_instagram']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="https://instagram.com/...">
                    </div>
                </div>
            </div>

            <!-- About Section -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">ℹ️</span>
                    About Section
                </h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Text</label>
                    <textarea name="footer_about_text" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('footer_about_text', $settings['about_text']) }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">This text appears in the footer about section</p>
                </div>
            </div>

            <!-- Additional Social Media -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">🔗</span>
                    Additional Social Media
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Twitter/X</label>
                        <input type="url" name="footer_social_twitter" value="{{ old('footer_social_twitter', $settings['social_twitter']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="https://twitter.com/...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn</label>
                        <input type="url" name="footer_social_linkedin" value="{{ old('footer_social_linkedin', $settings['social_linkedin']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="https://linkedin.com/...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">TikTok</label>
                        <input type="url" name="footer_social_tiktok" value="{{ old('footer_social_tiktok', $settings['social_tiktok']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="https://tiktok.com/...">
                    </div>
                </div>
            </div>

            <!-- WhatsApp Contact -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">💬</span>
                    WhatsApp Contact
                </h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">WhatsApp Number</label>
                    <input type="text" name="footer_contact_whatsapp" value="{{ old('footer_contact_whatsapp', $settings['contact_whatsapp']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="+255 123 456 789">
                    <p class="text-xs text-gray-500 mt-1">Include country code (e.g., +255)</p>
                </div>
            </div>

            <!-- Section Titles -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">📋</span>
                    Section Titles
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Quick Links Title</label>
                        <input type="text" name="footer_quick_links_title" value="{{ old('footer_quick_links_title', $settings['quick_links_title']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Resources Title</label>
                        <input type="text" name="footer_resources_title" value="{{ old('footer_resources_title', $settings['resources_title']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Legal Title</label>
                        <input type="text" name="footer_legal_title" value="{{ old('footer_legal_title', $settings['legal_title']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                </div>
            </div>

            <!-- Copyright & Footer Text -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">©</span>
                    Copyright & Footer Text
                </h2>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Copyright Text</label>
                        <input type="text" name="footer_copyright_text" value="{{ old('footer_copyright_text', $settings['copyright_text']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="© 2026 ICCR Tanzania. All rights reserved.">
                        <p class="text-xs text-gray-500 mt-1">Use {year} for dynamic year (e.g., © {year} ICCR Tanzania)</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">"Made with" Text</label>
                            <input type="text" name="footer_made_with_text" value="{{ old('footer_made_with_text', $settings['made_with_text']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Made with">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Community Text</label>
                            <input type="text" name="footer_community_text" value="{{ old('footer_community_text', $settings['community_text']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="for the community">
                        </div>
                        <div>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="footer_show_heart" value="1" {{ old('footer_show_heart', $settings['show_heart']) ? 'checked' : '' }}
                                       class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                <span class="text-sm font-medium text-gray-700">Show Heart Icon</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 mt-8 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-8 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold">
                Save Footer Settings
            </button>
        </div>
    </form>
</div>
@endsection

