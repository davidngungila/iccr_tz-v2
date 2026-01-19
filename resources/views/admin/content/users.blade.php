@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Users</h1>
            <p class="text-sm text-gray-500">Manage administrators, graduates, and registered members.</p>
        </div>
        <button class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-colors shadow-sm">
            <i class="ph ph-plus text-lg"></i>
            Invite User
        </button>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <!-- Toolbar -->
         <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row gap-4 justify-between items-center bg-gray-50/50">
            <div class="relative w-full sm:w-72">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="ph ph-magnifying-glass text-gray-400"></i>
                </span>
                <input type="text" placeholder="Search users by name or email..." class="pl-10 pr-4 py-2 w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>Role: All</option>
                    <option>Admin</option>
                    <option>Editor</option>
                    <option>Graduate</option>
                </select>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 text-xs font-semibold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Joined</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold text-sm">A</div>
                                <div>
                                    <div class="font-semibold text-gray-900">Administrator</div>
                                    <div class="text-xs text-gray-500">admin@iccr.or.tz</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                Super Admin
                            </span>
                        </td>
                        <td class="px-6 py-4">
                             <div class="flex items-center gap-2">
                                <div class="h-2 w-2 rounded-full bg-green-500"></div>
                                <span class="text-gray-600">Active</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Jan 12, 2024</td>
                        <td class="px-6 py-4 text-right">
                             <button class="p-1.5 hover:bg-gray-100 text-gray-500 rounded-md transition-colors" title="Settings">
                                <i class="ph ph-dots-three-vertical text-lg"></i>
                            </button>
                        </td>
                    </tr>
                     <!-- Row 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=random" class="h-9 w-9 rounded-full">
                                <div>
                                    <div class="font-semibold text-gray-900">John Doe</div>
                                    <div class="text-xs text-gray-500">john.doe@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                Graduate
                            </span>
                        </td>
                        <td class="px-6 py-4">
                             <div class="flex items-center gap-2">
                                <div class="h-2 w-2 rounded-full bg-green-500"></div>
                                <span class="text-gray-600">Active</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Apr 05, 2025</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-1.5 hover:bg-indigo-50 text-indigo-600 rounded-md transition-colors" title="Edit">
                                    <i class="ph ph-pencil-simple text-lg"></i>
                                </button>
                                <button class="p-1.5 hover:bg-red-50 text-red-600 rounded-md transition-colors" title="Ban">
                                    <i class="ph ph-ban text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
         <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between">
            <div class="text-sm text-gray-500">Showing 1 to 2 of 2 entries</div>
            <div class="flex gap-2">
                <button class="px-3 py-1 border border-gray-200 rounded-lg text-sm text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 border border-gray-200 rounded-lg text-sm text-gray-500 hover:bg-gray-50" disabled>Next</button>
            </div>
        </div>
    </div>
@endsection
