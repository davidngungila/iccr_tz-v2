@extends('admin.layout')

@section('title', 'Communication Settings - ICCR Admin')

@section('content')
<div class="p-6 md:p-8">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Communication Settings</h1>
            <p class="text-gray-600">Manage SMS and Email notification providers</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.communication.create', ['type' => 'sms']) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition">
                + Add SMS Provider
            </a>
            <a href="{{ route('admin.communication.create', ['type' => 'email']) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                + Add Email Provider
            </a>
        </div>
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

    <!-- Providers Table -->
    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-green-600 to-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-bold">Name</th>
                        <th class="px-6 py-4 text-left text-sm font-bold">Type</th>
                        <th class="px-6 py-4 text-left text-sm font-bold">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-bold">Primary</th>
                        <th class="px-6 py-4 text-left text-sm font-bold">Configuration</th>
                        <th class="px-6 py-4 text-center text-sm font-bold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($providers as $provider)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">{{ $provider->name }}</div>
                            @if($provider->notes)
                            <div class="text-xs text-gray-500 mt-1">{{ Str::limit($provider->notes, 50) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-semibold {{ $provider->type === 'sms' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                @if($provider->type === 'sms')
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                @else
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                @endif
                                {{ strtoupper($provider->type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($provider->is_active)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                Active
                            </span>
                            @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-700">
                                Inactive
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($provider->is_primary)
                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                Primary
                            </span>
                            @else
                            <span class="text-gray-400 text-sm">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">
                                @if($provider->type === 'sms')
                                    <div>From: <span class="font-semibold">{{ $provider->sms_from ?? '-' }}</span></div>
                                    <div class="text-xs text-gray-500 mt-1">{{ \Illuminate\Support\Str::limit($provider->sms_url ?? '-', 40) }}</div>
                                @else
                                    <div>Host: <span class="font-semibold">{{ $provider->mail_host ?? '-' }}</span></div>
                                    <div class="text-xs text-gray-500 mt-1">Port: {{ $provider->mail_port ?? '-' }} | {{ strtoupper($provider->mail_encryption ?? '-') }}</div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.communication.view', $provider->id) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg text-sm font-semibold hover:bg-blue-200 transition" title="View Details">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.communication.edit', $provider->id) }}" class="px-3 py-1.5 bg-green-100 text-green-700 rounded-lg text-sm font-semibold hover:bg-green-200 transition" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <button onclick="testProvider({{ $provider->id }}, '{{ $provider->type }}')" class="px-3 py-1.5 bg-purple-100 text-purple-700 rounded-lg text-sm font-semibold hover:bg-purple-200 transition" title="Test Connection">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                                <form action="{{ route('admin.communication.delete', $provider->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this provider?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 rounded-lg text-sm font-semibold hover:bg-red-200 transition" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center gap-3">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                <p class="text-lg font-semibold">No providers configured</p>
                                <p class="text-sm">Add your first SMS or Email provider to get started</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Test Modal -->
<div id="testModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4" style="display: none;">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold text-gray-900">Test Connection</h3>
            <button onclick="closeTestModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div id="testModalContent"></div>
        <div id="testResult" class="mt-4"></div>
    </div>
</div>

@push('scripts')
<script>
function testProvider(providerId, type) {
    const modal = document.getElementById('testModal');
    const content = document.getElementById('testModalContent');
    const result = document.getElementById('testResult');
    
    result.innerHTML = '';
    
    if (type === 'sms') {
        content.innerHTML = `
            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
            <input type="tel" id="testPhone" placeholder="+255 123 456 789" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
            <button onclick="sendTest(${providerId}, 'sms')" class="mt-4 w-full px-6 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition">
                Send Test SMS
            </button>
        `;
    } else {
        content.innerHTML = `
            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
            <input type="email" id="testEmail" placeholder="test@example.com" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
            <button onclick="sendTest(${providerId}, 'email')" class="mt-4 w-full px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                Send Test Email
            </button>
        `;
    }
    
    modal.style.display = 'flex';
}

function closeTestModal() {
    document.getElementById('testModal').style.display = 'none';
    document.getElementById('testResult').innerHTML = '';
}

async function sendTest(providerId, type) {
    const resultDiv = document.getElementById('testResult');
    const testValue = type === 'sms' 
        ? document.getElementById('testPhone').value 
        : document.getElementById('testEmail').value;
    
    if (!testValue) {
        resultDiv.innerHTML = '<div class="bg-red-50 border-2 border-red-200 rounded-lg p-4 text-red-700">Please enter a ' + (type === 'sms' ? 'phone number' : 'email address') + '</div>';
        return;
    }
    
    resultDiv.innerHTML = '<div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4 text-blue-700">Sending test ' + type.toUpperCase() + '...</div>';
    
    try {
        const response = await fetch(`{{ url('/admin/communication') }}/${providerId}/test`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ test_value: testValue })
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

// Close modal on outside click
document.getElementById('testModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeTestModal();
    }
});
</script>
@endpush
@endsection
