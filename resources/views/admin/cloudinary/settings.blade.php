@extends('admin.layout')

@section('title', 'Cloudinary Settings')
@section('subtitle', 'Manage multiple Cloudinary configurations')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Cloudinary Settings</h1>
        <p class="text-gray-600 mt-2">Manage multiple Cloudinary configurations</p>
    </div>
    <button onclick="openAddModal()" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Configuration
    </button>
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

<!-- Configurations Table -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cloud Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">API Key</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Default</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($configurations as $config)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $config->name }}</div>
                        @if($config->description)
                        <div class="text-xs text-gray-500">{{ Str::limit($config->description, 50) }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $config->cloud_name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ Str::limit($config->api_key, 20) }}...</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $config->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $config->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($config->is_default)
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            Default
                        </span>
                        @else
                        <span class="text-gray-400 text-xs">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <button onclick="testConnection({{ $config->id }})" class="text-blue-600 hover:text-blue-900" title="Test Connection">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </button>
                            <button onclick="editConfiguration({{ $config->id }})" class="text-indigo-600 hover:text-indigo-900" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button onclick="deleteConfiguration({{ $config->id }})" class="text-red-600 hover:text-red-900" title="Delete">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <p>No Cloudinary configurations found. Add your first configuration to get started.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add/Edit Modal -->
<div id="configModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h2 id="modalTitle" class="text-2xl font-bold text-gray-900">Add Configuration</h2>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="configForm" method="POST">
            @csrf
            <div id="methodField"></div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Configuration Name *</label>
                    <input type="text" id="name" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cloud Name *</label>
                    <input type="text" id="cloud_name" name="cloud_name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">API Key *</label>
                    <input type="text" id="api_key" name="api_key" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">API Secret *</label>
                    <input type="password" id="api_secret" name="api_secret" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Preset (Optional)</label>
                    <input type="text" id="upload_preset" name="upload_preset"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description (Optional)</label>
                    <textarea id="description" name="description" rows="3"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                </div>
                <div class="flex items-center gap-4">
                    <label class="flex items-center">
                        <input type="checkbox" id="is_default" name="is_default" value="1"
                               class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <span class="ml-2 text-sm text-gray-700">Set as default configuration</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" checked
                               class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>
            </div>
            <div class="flex items-center gap-4 mt-6">
                <button type="submit" class="flex-1 bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold">
                    Save Configuration
                </button>
                <button type="button" onclick="closeModal()" class="px-6 py-3 text-gray-600 hover:text-gray-900">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
let editingConfigId = null;
const configs = @json($configurations);

function openAddModal() {
    editingConfigId = null;
    document.getElementById('modalTitle').textContent = 'Add Configuration';
    document.getElementById('configForm').action = '{{ route("admin.cloudinary.configurations.store") }}';
    document.getElementById('methodField').innerHTML = '';
    document.getElementById('configForm').reset();
    document.getElementById('is_active').checked = true;
    document.getElementById('configModal').classList.remove('hidden');
}

function editConfiguration(id) {
    const config = configs.find(c => c.id === id);
    if (!config) return;
    
    editingConfigId = id;
    document.getElementById('modalTitle').textContent = 'Edit Configuration';
    document.getElementById('configForm').action = `{{ url('admin/cloudinary/configurations') }}/${id}`;
    document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
    
    document.getElementById('name').value = config.name || '';
    document.getElementById('cloud_name').value = config.cloud_name || '';
    document.getElementById('api_key').value = config.api_key || '';
    document.getElementById('api_secret').value = '';
    document.getElementById('upload_preset').value = config.upload_preset || '';
    document.getElementById('description').value = config.description || '';
    document.getElementById('is_default').checked = config.is_default || false;
    document.getElementById('is_active').checked = config.is_active !== undefined ? config.is_active : true;
    
    document.getElementById('configModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('configModal').classList.add('hidden');
    editingConfigId = null;
}

function deleteConfiguration(id) {
    if (!confirm('Are you sure you want to delete this configuration?')) return;
    
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `{{ url('admin/cloudinary/configurations') }}/${id}`;
    form.innerHTML = `
        @csrf
        <input type="hidden" name="_method" value="DELETE">
    `;
    document.body.appendChild(form);
    form.submit();
}

function testConnection(id) {
    const config = configs.find(c => c.id === id);
    if (!config) return;
    
    fetch(`{{ url('admin/cloudinary/configurations') }}/${id}/test`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Connection successful!\n\n${data.message}`);
        } else {
            alert(`Connection failed!\n\n${data.message}`);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while testing the connection.');
    });
}
</script>
@endpush
@endsection
