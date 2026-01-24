@extends('admin.layout')

@section('title', 'Cloudinary Settings')
@section('subtitle', 'Manage Cloudinary connection and settings')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Cloudinary Settings</h1>
    <p class="text-gray-600 mt-2">Configure and test your Cloudinary connection</p>
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
    
    <form action="{{ route('admin.cloudinary.settings.update') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <label for="cloudinary_cloud_name" class="block text-sm font-semibold text-gray-700 mb-2">Cloud Name *</label>
                <input type="text" id="cloudinary_cloud_name" name="cloudinary_cloud_name" value="{{ old('cloudinary_cloud_name', $cloudName) }}" required
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                @error('cloudinary_cloud_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="cloudinary_key" class="block text-sm font-semibold text-gray-700 mb-2">API Key *</label>
                <input type="text" id="cloudinary_key" name="cloudinary_key" value="{{ old('cloudinary_key', $apiKey) }}" required
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                @error('cloudinary_key')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="cloudinary_secret" class="block text-sm font-semibold text-gray-700 mb-2">API Secret *</label>
                <input type="password" id="cloudinary_secret" name="cloudinary_secret" value="{{ old('cloudinary_secret', $apiSecret) }}" required
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                <p class="text-xs text-gray-500 mt-1">Leave blank to keep current password</p>
                @error('cloudinary_secret')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="cloudinary_upload_preset" class="block text-sm font-semibold text-gray-700 mb-2">Upload Preset (Optional)</label>
                <input type="text" id="cloudinary_upload_preset" name="cloudinary_upload_preset" value="{{ old('cloudinary_upload_preset', $uploadPreset) }}"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                @error('cloudinary_upload_preset')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-8 flex justify-end gap-4">
            <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl">
                Save Settings
            </button>
        </div>
    </form>
    
    <div class="mt-8 p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
        <h3 class="font-semibold text-blue-900 mb-2">How to Configure</h3>
        <p class="text-sm text-blue-800 mb-2">Configure Cloudinary settings directly in the database through this form. Settings are stored in the <code class="bg-blue-100 px-2 py-1 rounded">system_settings</code> table.</p>
        <p class="text-sm text-blue-800 mb-2">Alternatively, you can add these variables to your <code class="bg-blue-100 px-2 py-1 rounded">.env</code> file (as fallback):</p>
        <pre class="bg-blue-100 p-3 rounded text-xs text-blue-900 overflow-x-auto"><code>CLOUDINARY_CLOUD_NAME=your_cloud_name
CLOUDINARY_KEY=your_api_key
CLOUDINARY_SECRET=your_api_secret
CLOUDINARY_UPLOAD_PRESET=your_upload_preset</code></pre>
        <p class="text-sm text-blue-800 mt-2">After updating settings here, the configuration will be used immediately. No need to run <code class="bg-blue-100 px-2 py-1 rounded">php artisan config:clear</code>.</p>
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
