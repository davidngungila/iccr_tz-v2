@extends('admin.layout')

@section('title', 'Communication Settings - ICCR Admin')

@section('content')
<div class="p-6 md:p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Communication Settings</h1>
        <p class="text-gray-600">Configure SMS and Email providers for notifications</p>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border-2 border-green-200 rounded-lg p-4 text-green-700">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 bg-red-50 border-2 border-red-200 rounded-lg p-4 text-red-700">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('admin.communication.update') }}" method="POST" class="space-y-8">
        @csrf

        <!-- SMS Provider Settings -->
        <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 md:p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">SMS Provider Configuration</h2>
                    <p class="text-gray-600 text-sm">Configure your SMS API settings for sending notifications</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="sms_provider_name" class="block text-sm font-semibold text-gray-700 mb-2">Provider Name</label>
                    <input type="text" id="sms_provider_name" name="sms_provider_name" value="{{ $smsProvider->name ?? 'Default SMS Provider' }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
                <div>
                    <label for="sms_from" class="block text-sm font-semibold text-gray-700 mb-2">Sender ID *</label>
                    <input type="text" id="sms_from" name="sms_from" value="{{ $smsProvider->sms_from ?? $smsSettings['sms_from'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="ICCR TZ">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label for="sms_username" class="block text-sm font-semibold text-gray-700 mb-2">API Username *</label>
                    <input type="text" id="sms_username" name="sms_username" value="{{ $smsProvider->sms_username ?? $smsSettings['sms_username'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
                <div>
                    <label for="sms_password" class="block text-sm font-semibold text-gray-700 mb-2">API Password *</label>
                    <input type="password" id="sms_password" name="sms_password" value="{{ $smsProvider->sms_password ?? $smsSettings['sms_password'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
            </div>

            <div class="mt-6">
                <label for="sms_url" class="block text-sm font-semibold text-gray-700 mb-2">SMS API URL *</label>
                <input type="url" id="sms_url" name="sms_url" value="{{ $smsProvider->sms_url ?? $smsSettings['sms_url'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="https://messaging-service.co.tz/link/sms/v1/text/single">
                <p class="text-xs text-gray-500 mt-2">Example: https://messaging-service.co.tz/link/sms/v1/text/single</p>
            </div>

            <!-- Test SMS Button -->
            <div class="mt-6 pt-6 border-t-2 border-gray-200">
                <div class="flex items-center gap-4">
                    <input type="tel" id="test_sms_phone" placeholder="+255 123 456 789" class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    <button type="button" onclick="testSMS()" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                        Test SMS
                    </button>
                </div>
                <div id="smsTestResult" class="mt-3"></div>
            </div>
        </div>

        <!-- Email Provider Settings -->
        <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 md:p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Email Provider Configuration</h2>
                    <p class="text-gray-600 text-sm">Configure your SMTP settings for sending email notifications</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="email_provider_name" class="block text-sm font-semibold text-gray-700 mb-2">Provider Name</label>
                    <input type="text" id="email_provider_name" name="email_provider_name" value="{{ $emailProvider->name ?? 'Default Email Provider' }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
                <div>
                    <label for="mail_host" class="block text-sm font-semibold text-gray-700 mb-2">SMTP Host *</label>
                    <input type="text" id="mail_host" name="mail_host" value="{{ $emailProvider->mail_host ?? $emailSettings['mail_host'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="smtp.gmail.com">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div>
                    <label for="mail_port" class="block text-sm font-semibold text-gray-700 mb-2">SMTP Port *</label>
                    <input type="number" id="mail_port" name="mail_port" value="{{ $emailProvider->mail_port ?? $emailSettings['mail_port'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="587">
                </div>
                <div>
                    <label for="mail_encryption" class="block text-sm font-semibold text-gray-700 mb-2">Encryption *</label>
                    <select id="mail_encryption" name="mail_encryption" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        <option value="tls" {{ ($emailProvider->mail_encryption ?? $emailSettings['mail_encryption']) === 'tls' ? 'selected' : '' }}>TLS</option>
                        <option value="ssl" {{ ($emailProvider->mail_encryption ?? $emailSettings['mail_encryption']) === 'ssl' ? 'selected' : '' }}>SSL</option>
                        <option value="none" {{ ($emailProvider->mail_encryption ?? $emailSettings['mail_encryption']) === 'none' ? 'selected' : '' }}>None</option>
                    </select>
                </div>
                <div>
                    <label for="mail_username" class="block text-sm font-semibold text-gray-700 mb-2">SMTP Username *</label>
                    <input type="text" id="mail_username" name="mail_username" value="{{ $emailProvider->mail_username ?? $emailSettings['mail_username'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label for="mail_password" class="block text-sm font-semibold text-gray-700 mb-2">SMTP Password *</label>
                    <input type="password" id="mail_password" name="mail_password" value="{{ $emailProvider->mail_password ?? $emailSettings['mail_password'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
                <div>
                    <label for="mail_from_address" class="block text-sm font-semibold text-gray-700 mb-2">From Email Address *</label>
                    <input type="email" id="mail_from_address" name="mail_from_address" value="{{ $emailProvider->mail_from_address ?? $emailSettings['mail_from_address'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="noreply@iccrtz.org">
                </div>
            </div>

            <div class="mt-6">
                <label for="mail_from_name" class="block text-sm font-semibold text-gray-700 mb-2">From Name *</label>
                <input type="text" id="mail_from_name" name="mail_from_name" value="{{ $emailProvider->mail_from_name ?? $emailSettings['mail_from_name'] }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition" placeholder="ICCR Tanzania">
            </div>

            <!-- Test Email Button -->
            <div class="mt-6 pt-6 border-t-2 border-gray-200">
                <div class="flex items-center gap-4">
                    <input type="email" id="test_email_address" placeholder="test@example.com" class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    <button type="button" onclick="testEmail()" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                        Test Email
                    </button>
                </div>
                <div id="emailTestResult" class="mt-3"></div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl">
                Save Settings
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
async function testSMS() {
    const phone = document.getElementById('test_sms_phone').value;
    const resultDiv = document.getElementById('smsTestResult');
    
    if (!phone) {
        resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-4 text-red-700">Please enter a phone number</div>';
        return;
    }
    
    resultDiv.innerHTML = '<div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4 text-blue-700">Sending test SMS...</div>';
    
    try {
        const response = await fetch('{{ route("admin.communication.test-sms") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ phone, message: 'Test SMS from ICCR Tanzania' })
        });
        
        const data = await response.json();
        
        if (data.success) {
            resultDiv.innerHTML = '<div class="bg-green-50 border-2 border-green-200 rounded-lg p-4 text-green-700">' + data.message + '</div>';
        } else {
            resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-4 text-red-700">' + data.message + '</div>';
        }
    } catch (error) {
        resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-4 text-red-700">Error: ' + error.message + '</div>';
    }
}

async function testEmail() {
    const email = document.getElementById('test_email_address').value;
    const resultDiv = document.getElementById('emailTestResult');
    
    if (!email) {
        resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-4 text-red-700">Please enter an email address</div>';
        return;
    }
    
    resultDiv.innerHTML = '<div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4 text-blue-700">Sending test email...</div>';
    
    try {
        const response = await fetch('{{ route("admin.communication.test-email") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ email })
        });
        
        const data = await response.json();
        
        if (data.success) {
            resultDiv.innerHTML = '<div class="bg-green-50 border-2 border-green-200 rounded-lg p-4 text-green-700">' + data.message + '</div>';
        } else {
            resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-4 text-red-700">' + data.message + '</div>';
        }
    } catch (error) {
        resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-4 text-red-700">Error: ' + error.message + '</div>';
    }
}
</script>
@endpush
@endsection

