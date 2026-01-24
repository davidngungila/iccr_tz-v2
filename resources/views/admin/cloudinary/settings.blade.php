@extends('admin.layout')

@section('title', 'Cloudinary Settings')
@section('subtitle', 'Manage Cloudinary connection and settings')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Cloudinary Settings</h1>
    <p class="text-gray-600 mt-2">Configure and test your Cloudinary connection</p>
</div>

<!-- Connection Status Card -->
<div class="bg-white rounded-xl shadow-lg p-8 mb-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Connection Status</h2>
        <button id="test-connection-btn" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            Test Connection
        </button>
    </div>
    
    <div id="connection-status" class="flex items-center gap-4 p-4 rounded-lg {{ $connectionStatus === 'connected' ? 'bg-green-50 border-2 border-green-200' : 'bg-red-50 border-2 border-red-200' }}">
        <div class="flex-shrink-0">
            @if($connectionStatus === 'connected')
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            @else
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            @endif
        </div>
        <div class="flex-1">
            <h3 class="text-lg font-semibold {{ $connectionStatus === 'connected' ? 'text-green-800' : 'text-red-800' }}">
                {{ $connectionStatus === 'connected' ? 'Connected' : 'Disconnected' }}
            </h3>
            <p class="text-sm {{ $connectionStatus === 'connected' ? 'text-green-600' : 'text-red-600' }}" id="connection-message">
                {{ $connectionMessage }}
            </p>
        </div>
    </div>
</div>

<!-- Configuration Card -->
<div class="bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Configuration</h2>
    
    <div class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Cloud Name</label>
            <div class="flex items-center gap-2">
                <input type="text" value="{{ $cloudName ?: 'Not configured' }}" readonly
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-600">
                @if($cloudName)
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">✓ Set</span>
                @else
                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">✗ Missing</span>
                @endif
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">API Key</label>
            <div class="flex items-center gap-2">
                <input type="text" value="{{ $apiKey ? '••••••••••••' . substr($apiKey, -4) : 'Not configured' }}" readonly
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-600">
                @if($apiKey)
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">✓ Set</span>
                @else
                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">✗ Missing</span>
                @endif
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">API Secret</label>
            <div class="flex items-center gap-2">
                <input type="text" value="{{ $apiSecret ? '••••••••••••' . substr($apiSecret, -4) : 'Not configured' }}" readonly
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-600">
                @if($apiSecret)
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">✓ Set</span>
                @else
                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">✗ Missing</span>
                @endif
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Preset</label>
            <div class="flex items-center gap-2">
                <input type="text" value="{{ $uploadPreset ?: 'Not configured (optional)' }}" readonly
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-600">
            </div>
        </div>
    </div>
    
    <div class="mt-8 p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
        <h3 class="font-semibold text-blue-900 mb-2">How to Configure</h3>
        <p class="text-sm text-blue-800 mb-2">Add these variables to your <code class="bg-blue-100 px-2 py-1 rounded">.env</code> file:</p>
        <pre class="bg-blue-100 p-3 rounded text-xs text-blue-900 overflow-x-auto"><code>CLOUDINARY_CLOUD_NAME=your_cloud_name
CLOUDINARY_KEY=your_api_key
CLOUDINARY_SECRET=your_api_secret
CLOUDINARY_UPLOAD_PRESET=your_upload_preset</code></pre>
        <p class="text-sm text-blue-800 mt-2">After adding these, run <code class="bg-blue-100 px-2 py-1 rounded">php artisan config:clear</code> and refresh this page.</p>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('test-connection-btn').addEventListener('click', function() {
        const btn = this;
        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Testing...';
        
        fetch('{{ route("admin.cloudinary.test") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            const statusDiv = document.getElementById('connection-status');
            const messageDiv = document.getElementById('connection-message');
            
            if (data.success) {
                statusDiv.className = 'flex items-center gap-4 p-4 rounded-lg bg-green-50 border-2 border-green-200';
                statusDiv.innerHTML = `
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-green-800">Connected</h3>
                        <p class="text-sm text-green-600">${data.message}</p>
                    </div>
                `;
            } else {
                statusDiv.className = 'flex items-center gap-4 p-4 rounded-lg bg-red-50 border-2 border-red-200';
                statusDiv.innerHTML = `
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-red-800">Disconnected</h3>
                        <p class="text-sm text-red-600">${data.message}</p>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while testing the connection.');
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = originalText;
        });
    });
</script>
@endpush
@endsection

