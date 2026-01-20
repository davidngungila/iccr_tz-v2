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

            <!-- Copyright -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">©</span>
                    Copyright Text
                </h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Copyright Text</label>
                    <input type="text" name="footer_copyright_text" value="{{ old('footer_copyright_text', $settings['copyright_text']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="© 2024 ICCR Tanzania. All rights reserved.">
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

