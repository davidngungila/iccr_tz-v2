@extends('admin.layout')

@section('title', 'Menus & Navigation')
@section('subtitle', 'Manage main menu and footer menu')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Menus & Navigation</h1>
        <p class="text-gray-600 mt-2">Manage main menu and footer menu items</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Main Menu -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900">Main Menu</h2>
            <button onclick="showAddMenuForm('main')" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm font-semibold">
                + Add Item
            </button>
        </div>
        
        <div id="main-menu-items" class="space-y-2">
            @forelse($mainMenu as $item)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $item->url ?? $item->route_name }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="editMenuItem({{ $item->id }})" class="text-blue-600 hover:text-blue-900 text-sm">Edit</button>
                        <form action="{{ route('admin.menus.delete', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 text-center py-4">No menu items yet</p>
            @endforelse
        </div>
    </div>

    <!-- Footer Menu -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900">Footer Menu</h2>
            <button onclick="showAddMenuForm('footer')" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm font-semibold">
                + Add Item
            </button>
        </div>
        
        <div id="footer-menu-items" class="space-y-2">
            @forelse($footerMenu as $item)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $item->url ?? $item->route_name }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="editMenuItem({{ $item->id }})" class="text-blue-600 hover:text-blue-900 text-sm">Edit</button>
                        <form action="{{ route('admin.menus.delete', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 text-center py-4">No menu items yet</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Add/Edit Menu Item Modal -->
<div id="menuModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-md w-full mx-4">
        <h3 class="text-2xl font-bold text-gray-900 mb-6" id="modalTitle">Add Menu Item</h3>
        <form id="menuForm" method="POST">
            @csrf
            <input type="hidden" name="menu_type" id="menu_type">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">URL</label>
                    <input type="text" name="url" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Route Name</label>
                    <input type="text" name="route_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
                <div class="flex items-center gap-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_external" value="1" class="w-4 h-4 text-green-600">
                        <span class="ml-2 text-sm">External Link</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-green-600">
                        <span class="ml-2 text-sm">Active</span>
                    </label>
                </div>
                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-2 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold">
                        Save
                    </button>
                    <button type="button" onclick="closeMenuModal()" class="px-6 py-2 text-gray-600 hover:text-gray-900">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function showAddMenuForm(type) {
        document.getElementById('menu_type').value = type;
        document.getElementById('menuForm').action = '{{ route("admin.menus.store") }}';
        document.getElementById('modalTitle').textContent = 'Add ' + (type === 'main' ? 'Main' : 'Footer') + ' Menu Item';
        document.getElementById('menuModal').classList.remove('hidden');
        document.getElementById('menuModal').classList.add('flex');
    }
    
    function editMenuItem(id) {
        // Load item data and show edit form
        closeMenuModal();
    }
    
    function closeMenuModal() {
        document.getElementById('menuModal').classList.add('hidden');
        document.getElementById('menuModal').classList.remove('flex');
    }
</script>
@endpush
@endsection



