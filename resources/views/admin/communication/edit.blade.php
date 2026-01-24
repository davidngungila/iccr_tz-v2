@extends('admin.layout')

@section('title', 'Edit Provider - ' . $provider->name . ' - ICCR Admin')

@section('content')
<div class="p-6 md:p-8">
    <div class="mb-8">
        <a href="{{ route('admin.communication') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 mb-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Providers
        </a>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Provider: {{ $provider->name }}</h1>
        <p class="text-gray-600">Update {{ $provider->type }} provider configuration</p>
    </div>

    <form action="{{ route('admin.communication.update', $provider->id) }}" method="POST" class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 md:p-8">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <!-- Basic Information -->
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-4">Basic Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Provider Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $provider->name) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label for="is_active" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                            <div class="flex items-center gap-3">
                                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $provider->is_active) ? 'checked' : '' }} class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                <label for="is_active" class="text-sm text-gray-700">Active</label>
                            </div>
                        </div>
                        <div>
                            <label for="is_primary" class="block text-sm font-semibold text-gray-700 mb-2">Set as Primary</label>
                            <div class="flex items-center gap-3">
                                <input type="checkbox" id="is_primary" name="is_primary" value="1" {{ old('is_primary', $provider->is_primary) ? 'checked' : '' }} class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                <label for="is_primary" class="text-sm text-gray-700">Use as primary {{ $provider->type }} provider</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($provider->type === 'sms')
            <!-- SMS Configuration -->
            <div class="border-t-2 border-gray-200 pt-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">SMS Configuration</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="sms_username" class="block text-sm font-semibold text-gray-700 mb-2">API Username (Optional)</label>
                        <input type="text" id="sms_username" name="sms_username" value="{{ old('sms_username', $provider->sms_username) }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        <p class="text-xs text-gray-500 mt-1">Optional: Used for Basic Auth (legacy API)</p>
                        @error('sms_username')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="sms_password" class="block text-sm font-semibold text-gray-700 mb-2">API Key / Bearer Token *</label>
                        <input type="text" id="sms_password" name="sms_password" value="{{ old('sms_password', $provider->sms_password ?? '') }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition font-mono text-sm" placeholder="Enter your Bearer token">
                        <p class="text-xs text-gray-500 mt-1">Required: Bearer token for API v2. Can be any alphanumeric string or special characters.</p>
                        <p class="text-xs text-yellow-600 mt-1">⚠️ Note: Token is visible for easier configuration. Enter your exact Bearer token as provided by your SMS service.</p>
                        @error('sms_password')
                            <p class="text-red-600 text-sm mt-1 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="sms_from" class="block text-sm font-semibold text-gray-700 mb-2">Sender ID *</label>
                        <input type="text" id="sms_from" name="sms_from" value="{{ old('sms_from', $provider->sms_from) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        @error('sms_from')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="sms_url" class="block text-sm font-semibold text-gray-700 mb-2">API URL *</label>
                        <input type="url" id="sms_url" name="sms_url" value="{{ old('sms_url', $provider->sms_url ?: 'https://messaging-service.co.tz/api/sms/v2/text/single') }}" required readonly class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 text-gray-600 cursor-not-allowed">
                        <p class="text-xs text-gray-500 mt-1">This URL is fixed and cannot be changed</p>
                        @error('sms_url')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            @else
            <!-- Email Configuration -->
            <div class="border-t-2 border-gray-200 pt-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Email Configuration</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="mail_host" class="block text-sm font-semibold text-gray-700 mb-2">SMTP Host *</label>
                        <input type="text" id="mail_host" name="mail_host" value="{{ old('mail_host', $provider->mail_host) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        @error('mail_host')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="mail_port" class="block text-sm font-semibold text-gray-700 mb-2">SMTP Port *</label>
                        <input type="number" id="mail_port" name="mail_port" value="{{ old('mail_port', $provider->mail_port) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        @error('mail_port')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="mail_encryption" class="block text-sm font-semibold text-gray-700 mb-2">Encryption *</label>
                        <select id="mail_encryption" name="mail_encryption" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                            <option value="tls" {{ old('mail_encryption', $provider->mail_encryption) === 'tls' ? 'selected' : '' }}>TLS</option>
                            <option value="ssl" {{ old('mail_encryption', $provider->mail_encryption) === 'ssl' ? 'selected' : '' }}>SSL</option>
                            <option value="none" {{ old('mail_encryption', $provider->mail_encryption) === 'none' ? 'selected' : '' }}>None</option>
                        </select>
                    </div>
                    <div>
                        <label for="mail_username" class="block text-sm font-semibold text-gray-700 mb-2">SMTP Username *</label>
                        <input type="text" id="mail_username" name="mail_username" value="{{ old('mail_username', $provider->mail_username) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        @error('mail_username')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="mail_password" class="block text-sm font-semibold text-gray-700 mb-2">SMTP Password *</label>
                        <input type="password" id="mail_password" name="mail_password" value="{{ old('mail_password', $provider->mail_password) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        <p class="text-xs text-gray-500 mt-1">Leave blank to keep current password</p>
                        @error('mail_password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="mail_from_address" class="block text-sm font-semibold text-gray-700 mb-2">From Email Address *</label>
                        <input type="email" id="mail_from_address" name="mail_from_address" value="{{ old('mail_from_address', $provider->mail_from_address) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        @error('mail_from_address')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6">
                    <label for="mail_from_name" class="block text-sm font-semibold text-gray-700 mb-2">From Name *</label>
                    <input type="text" id="mail_from_name" name="mail_from_name" value="{{ old('mail_from_name', $provider->mail_from_name) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    @error('mail_from_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @endif

            <!-- Additional Notes -->
            <div class="border-t-2 border-gray-200 pt-6">
                <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">Notes</label>
                <textarea id="notes" name="notes" rows="3" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="Additional notes about this provider...">{{ old('notes', $provider->notes) }}</textarea>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end gap-4 pt-6 border-t-2 border-gray-200">
                <a href="{{ route('admin.communication') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl">
                    Update Provider
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

