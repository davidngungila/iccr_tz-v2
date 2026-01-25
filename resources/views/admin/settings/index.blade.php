@extends('admin.layout')

@section('title', 'Settings')
@section('subtitle', 'Website settings and configuration')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Settings</h1>
    <p class="text-gray-600 mt-2">Configure website settings, theme, and preferences</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        
        <div class="space-y-8">
            <!-- General Settings -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">⚙️</span>
                    General Settings
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Website Name</label>
                        <input type="text" name="website_name" value="{{ old('website_name', $settings['website_name']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Language</label>
                        <select name="website_language" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            <option value="en" {{ $settings['language'] === 'en' ? 'selected' : '' }}>English</option>
                            <option value="sw" {{ $settings['language'] === 'sw' ? 'selected' : '' }}>Swahili</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Timezone</label>
                        <select name="website_timezone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            <option value="Africa/Dar_es_Salaam" {{ $settings['timezone'] === 'Africa/Dar_es_Salaam' ? 'selected' : '' }}>Africa/Dar es Salaam</option>
                            <option value="UTC">UTC</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Branding -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">🎨</span>
                    Branding
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Website Logo URL</label>
                        <input type="url" name="website_logo" value="{{ old('website_logo', $settings['website_logo']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="https://cloudinary.com/...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Favicon URL</label>
                        <input type="url" name="favicon" value="{{ old('favicon', $settings['favicon']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="https://cloudinary.com/...">
                    </div>
                </div>
            </div>

            <!-- Theme Colors -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">🌈</span>
                    Theme Colors
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary Color</label>
                        <input type="color" name="theme_primary_color" value="{{ old('theme_primary_color', $settings['primary_color']) }}"
                               class="w-full h-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Color</label>
                        <input type="color" name="theme_secondary_color" value="{{ old('theme_secondary_color', $settings['secondary_color']) }}"
                               class="w-full h-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                </div>
            </div>

            <!-- Maintenance Mode -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-2xl">🔧</span>
                    Maintenance Mode
                </h2>
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="maintenance_mode" value="1" {{ $settings['maintenance_mode'] === '1' ? 'checked' : '' }}
                               class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <span class="ml-2 text-sm text-gray-700">Enable Maintenance Mode</span>
                    </label>
                    <p class="mt-1 text-sm text-gray-500">When enabled, only admins can access the website</p>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 mt-8 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-8 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold">
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection



