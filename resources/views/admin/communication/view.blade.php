@extends('admin.layout')

@section('title', 'View Provider - ' . $provider->name . ' - ICCR Admin')

@section('content')
<div class="p-6 md:p-8">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ route('admin.communication') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Providers
            </a>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $provider->name }}</h1>
            <p class="text-gray-600">View provider configuration details</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.communication.edit', $provider->id) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition">
                Edit Provider
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Basic Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Provider Name</label>
                        <p class="text-gray-900">{{ $provider->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Type</label>
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-semibold {{ $provider->type === 'sms' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ strtoupper($provider->type) }}
                        </span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                            @if($provider->is_active)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                Active
                            </span>
                            @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-700">
                                Inactive
                            </span>
                            @endif
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Primary Provider</label>
                            @if($provider->is_primary)
                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                Yes
                            </span>
                            @else
                            <span class="text-gray-500">No</span>
                            @endif
                        </div>
                    </div>
                    @if($provider->notes)
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Notes</label>
                        <p class="text-gray-600">{{ $provider->notes }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Configuration Details -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Configuration Details</h2>
                @if($provider->type === 'sms')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">API Username</label>
                        <p class="text-gray-900 font-mono text-sm bg-gray-50 p-2 rounded">{{ $provider->sms_username ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">API Password</label>
                        <p class="text-gray-900 font-mono text-sm bg-gray-50 p-2 rounded">{{ $provider->sms_password ? '••••••••' : '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Sender ID</label>
                        <p class="text-gray-900">{{ $provider->sms_from ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">API URL</label>
                        <p class="text-gray-900 font-mono text-sm bg-gray-50 p-2 rounded break-all">{{ $provider->sms_url ?? '-' }}</p>
                    </div>
                </div>
                @else
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">SMTP Host</label>
                            <p class="text-gray-900">{{ $provider->mail_host ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">SMTP Port</label>
                            <p class="text-gray-900">{{ $provider->mail_port ?? '-' }}</p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Encryption</label>
                        <p class="text-gray-900">{{ strtoupper($provider->mail_encryption ?? '-') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">SMTP Username</label>
                        <p class="text-gray-900 font-mono text-sm bg-gray-50 p-2 rounded">{{ $provider->mail_username ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">SMTP Password</label>
                        <p class="text-gray-900 font-mono text-sm bg-gray-50 p-2 rounded">{{ $provider->mail_password ? '••••••••' : '-' }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">From Address</label>
                            <p class="text-gray-900">{{ $provider->mail_from_address ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">From Name</label>
                            <p class="text-gray-900">{{ $provider->mail_from_name ?? '-' }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div class="space-y-6">
            <!-- Test Connection -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Test Connection</h3>
                @if($provider->type === 'sms')
                <div class="space-y-3">
                    <input type="tel" id="testValue" placeholder="+255 123 456 789" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    <button onclick="testConnection()" class="w-full px-4 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition">
                        Send Test SMS
                    </button>
                </div>
                @else
                <div class="space-y-3">
                    <input type="email" id="testValue" placeholder="test@example.com" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                    <button onclick="testConnection()" class="w-full px-4 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                        Send Test Email
                    </button>
                </div>
                @endif
                <div id="testResult" class="mt-3"></div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.communication.edit', $provider->id) }}" class="block w-full px-4 py-2 bg-green-100 text-green-700 rounded-lg font-semibold hover:bg-green-200 transition text-center">
                        Edit Provider
                    </a>
                    <form action="{{ route('admin.communication.delete', $provider->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this provider?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="block w-full px-4 py-2 bg-red-100 text-red-700 rounded-lg font-semibold hover:bg-red-200 transition">
                            Delete Provider
                        </button>
                    </form>
                </div>
            </div>

            <!-- Metadata -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Metadata</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Created:</span>
                        <span class="text-gray-900">{{ $provider->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Last Updated:</span>
                        <span class="text-gray-900">{{ $provider->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
async function testConnection() {
    const testValue = document.getElementById('testValue').value;
    const resultDiv = document.getElementById('testResult');
    
    if (!testValue) {
        resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-3 text-red-700 text-sm">Please enter a {{ $provider->type === "sms" ? "phone number" : "email address" }}</div>';
        return;
    }
    
    resultDiv.innerHTML = '<div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-3 text-blue-700 text-sm">Sending test {{ strtoupper($provider->type) }}...</div>';
    
    try {
        const response = await fetch('{{ route("admin.communication.test", $provider->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ test_value: testValue })
        });
        
        const data = await response.json();
        
        if (data.success) {
            resultDiv.innerHTML = '<div class="bg-green-50 border-2 border-green-200 rounded-lg p-3 text-green-700 text-sm">' + data.message + '</div>';
        } else {
            resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-3 text-red-700 text-sm">' + data.message + '</div>';
        }
    } catch (error) {
        resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-3 text-red-700 text-sm">Error: ' + error.message + '</div>';
    }
}
</script>
@endpush
@endsection


