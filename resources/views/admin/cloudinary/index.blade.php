@extends('admin.layout')

@section('title', 'Cloudinary Assets')
@section('subtitle', 'Browse and manage your Cloudinary media library')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Cloudinary Assets</h1>
        <p class="text-gray-600 mt-2">Browse, upload, and manage all your Cloudinary assets</p>
    </div>
    <button onclick="openUploadModal()" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Upload Asset
    </button>
</div>

<!-- Filters -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Resource Type</label>
            <select id="resourceType" onchange="loadAssets()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <option value="image">Images</option>
                <option value="video">Videos</option>
                <option value="raw">Documents</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Folder (Leave empty for all assets)</label>
            <input type="text" id="folderFilter" value="" placeholder="Leave empty to show all assets" onchange="loadAssets()"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
            <input type="text" id="searchFilter" placeholder="Search assets..." onkeyup="debounceSearch()"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
        </div>
        <div class="flex items-end">
            <button onclick="loadAssets()" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                Refresh
            </button>
        </div>
    </div>
</div>

<!-- Assets Grid -->
<div id="assetsContainer" class="bg-white rounded-xl shadow-lg p-6">
    <div id="loadingSpinner" class="text-center py-12">
        <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-green-600"></div>
        <p class="mt-4 text-gray-600">Loading assets...</p>
    </div>
    <div id="assetsGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 hidden">
        <!-- Assets will be loaded here -->
    </div>
    <div id="noAssets" class="text-center py-12 hidden">
        <p class="text-gray-500">No assets found. Upload your first asset!</p>
    </div>
    <div id="loadMoreContainer" class="mt-6 text-center hidden">
        <button onclick="loadMoreAssets()" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
            Load More
        </button>
    </div>
</div>

<!-- Upload Modal -->
<div id="uploadModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-md w-full mx-4">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Upload to Cloudinary</h2>
            <button onclick="closeUploadModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="uploadForm" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">File *</label>
                    <input type="file" id="uploadFile" name="file" required accept="image/*,video/*,.pdf"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Folder</label>
                    <input type="text" id="uploadFolder" name="folder" value="iccr-tanzania"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>
                <div id="uploadProgress" class="hidden">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div id="uploadProgressBar" class="bg-green-600 h-2.5 rounded-full transition-all" style="width: 0%"></div>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Uploading...</p>
                </div>
            </div>
            <div class="flex items-center gap-4 mt-6">
                <button type="submit" class="flex-1 bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold">
                    Upload
                </button>
                <button type="button" onclick="closeUploadModal()" class="px-6 py-3 text-gray-600 hover:text-gray-900">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Image Picker Modal (for selecting images) -->
<div id="imagePickerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Select Image from Cloudinary</h2>
            <button onclick="closeImagePicker()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div id="pickerAssetsGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Assets for picking will be loaded here -->
        </div>
    </div>
</div>

@push('scripts')
<script>
let currentCursor = null;
let selectedImageCallback = null;

// Load assets on page load
document.addEventListener('DOMContentLoaded', function() {
    loadAssets();
});

function loadAssets(reset = true) {
    if (reset) {
        currentCursor = null;
    }
    
    const resourceType = document.getElementById('resourceType').value;
    const folder = document.getElementById('folderFilter').value;
    
    document.getElementById('loadingSpinner').classList.remove('hidden');
    document.getElementById('assetsGrid').classList.add('hidden');
    document.getElementById('noAssets').classList.add('hidden');
    
    const url = new URL('{{ route("admin.cloudinary.api.assets") }}', window.location.origin);
    url.searchParams.append('resource_type', resourceType);
    if (folder) {
        url.searchParams.append('folder', folder);
    }
    if (currentCursor) {
        url.searchParams.append('next_cursor', currentCursor);
    }
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            document.getElementById('loadingSpinner').classList.add('hidden');
            
            if (data.success && data.assets.length > 0) {
                const grid = document.getElementById('assetsGrid');
                if (reset) {
                    grid.innerHTML = '';
                }
                grid.classList.remove('hidden');
                
                data.assets.forEach(asset => {
                    const assetCard = createAssetCard(asset);
                    grid.appendChild(assetCard);
                });
                
                currentCursor = data.next_cursor;
                document.getElementById('loadMoreContainer').classList.toggle('hidden', !currentCursor);
            } else {
                if (reset) {
                    document.getElementById('noAssets').classList.remove('hidden');
                }
            }
        })
        .catch(error => {
            console.error('Error loading assets:', error);
            document.getElementById('loadingSpinner').classList.add('hidden');
            alert('Failed to load assets. Please check your Cloudinary configuration.');
        });
}

function loadMoreAssets() {
    loadAssets(false);
}

function createAssetCard(asset) {
    const card = document.createElement('div');
    card.className = 'border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition';
    
    const isImage = asset.resource_type === 'image';
    const thumbnail = isImage ? asset.secure_url.replace('/upload/', '/upload/w_300,h_300,c_fill/') : asset.secure_url;
    
    card.innerHTML = `
        <div class="relative aspect-square bg-gray-100">
            ${isImage ? 
                `<img src="${thumbnail}" alt="${asset.public_id}" class="w-full h-full object-cover">` :
                `<div class="w-full h-full flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </div>`
            }
            <div class="absolute top-2 right-2 flex gap-2">
                <button onclick="selectImage('${asset.secure_url}')" class="bg-green-600 text-white p-2 rounded-full hover:bg-green-700 transition" title="Select">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </button>
                <button onclick="copyImageUrl('${asset.secure_url}')" class="bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 transition" title="Copy URL">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </button>
                <button onclick="deleteAsset('${asset.public_id}')" class="bg-red-600 text-white p-2 rounded-full hover:bg-red-700 transition" title="Delete">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-3">
            <p class="text-xs font-medium text-gray-900 truncate" title="${asset.public_id}">${asset.public_id.split('/').pop()}</p>
            <p class="text-xs text-gray-500 mt-1">${asset.format || 'N/A'} • ${formatBytes(asset.bytes || 0)}</p>
        </div>
    `;
    
    return card;
}

function selectImage(url) {
    if (selectedImageCallback) {
        selectedImageCallback(url);
        closeImagePicker();
    } else {
        copyImageUrl(url);
    }
}

function copyImageUrl(url) {
    navigator.clipboard.writeText(url).then(() => {
        alert('Image URL copied to clipboard!');
    });
}

function deleteAsset(publicId) {
    if (!confirm('Are you sure you want to delete this asset?')) {
        return;
    }
    
    fetch(`{{ url('admin/cloudinary') }}/${encodeURIComponent(publicId)}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadAssets(true);
            alert('Asset deleted successfully!');
        } else {
            alert('Failed to delete asset: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error deleting asset:', error);
        alert('Failed to delete asset');
    });
}

function openUploadModal() {
    document.getElementById('uploadModal').classList.remove('hidden');
}

function closeUploadModal() {
    document.getElementById('uploadModal').classList.add('hidden');
    document.getElementById('uploadForm').reset();
    document.getElementById('uploadProgress').classList.add('hidden');
}

document.getElementById('uploadForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData();
    formData.append('file', document.getElementById('uploadFile').files[0]);
    formData.append('folder', document.getElementById('uploadFolder').value);
    formData.append('_token', '{{ csrf_token() }}');
    
    document.getElementById('uploadProgress').classList.remove('hidden');
    
    fetch('{{ route("admin.cloudinary.upload") }}', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('uploadProgress').classList.add('hidden');
        if (data.success) {
            closeUploadModal();
            loadAssets(true);
            alert('Asset uploaded successfully!');
        } else {
            alert('Upload failed: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error uploading:', error);
        document.getElementById('uploadProgress').classList.add('hidden');
        alert('Upload failed');
    });
});

function formatBytes(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
}

let searchTimeout;
function debounceSearch() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        // Implement search if needed
        loadAssets(true);
    }, 500);
}

// Global function to open image picker
window.openCloudinaryImagePicker = function(callback) {
    selectedImageCallback = callback;
    document.getElementById('imagePickerModal').classList.remove('hidden');
    loadPickerAssets();
};

function loadPickerAssets() {
    const resourceType = 'image';
    const folder = 'iccr-tanzania';
    
    const url = new URL('{{ route("admin.cloudinary.api.assets") }}', window.location.origin);
    url.searchParams.append('resource_type', resourceType);
    url.searchParams.append('folder', folder);
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const grid = document.getElementById('pickerAssetsGrid');
            grid.innerHTML = '';
            
            if (data.success && data.assets.length > 0) {
                data.assets.forEach(asset => {
                    if (asset.resource_type === 'image') {
                        const card = createPickerAssetCard(asset);
                        grid.appendChild(card);
                    }
                });
            }
        });
}

function createPickerAssetCard(asset) {
    const card = document.createElement('div');
    card.className = 'border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer';
    card.onclick = () => selectImage(asset.secure_url);
    
    const thumbnail = asset.secure_url.replace('/upload/', '/upload/w_300,h_300,c_fill/');
    
    card.innerHTML = `
        <div class="aspect-square bg-gray-100">
            <img src="${thumbnail}" alt="${asset.public_id}" class="w-full h-full object-cover">
        </div>
        <div class="p-2">
            <p class="text-xs text-gray-900 truncate">${asset.public_id.split('/').pop()}</p>
        </div>
    `;
    
    return card;
}

function closeImagePicker() {
    document.getElementById('imagePickerModal').classList.add('hidden');
    selectedImageCallback = null;
}
</script>
@endpush
@endsection


