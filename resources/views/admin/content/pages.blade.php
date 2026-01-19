@extends('layouts.admin')

@section('title', 'Manage Pages')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Pages</h1>
            <p class="text-sm text-gray-500">Manage static content and page structures.</p>
        </div>
        <a href="{{ route('admin.editor') }}" class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-colors shadow-sm">
            <i class="ph ph-plus text-lg"></i>
            Create New Page
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <!-- Toolbar -->
        <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row gap-4 justify-between items-center bg-gray-50/50">
            <div class="relative w-full sm:w-72">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="ph ph-magnifying-glass text-gray-400"></i>
                </span>
                <input type="text" placeholder="Search pages..." class="pl-10 pr-4 py-2 w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>All Status</option>
                    <option>Published</option>
                    <option>Draft</option>
                </select>
                <button class="p-2 border border-gray-200 rounded-lg text-gray-500 hover:bg-white hover:text-indigo-600 transition-colors bg-white">
                    <i class="ph ph-funnel"></i>
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 text-xs font-semibold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Last Modified</th>
                        <th class="px-6 py-4">Author</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">Home Page</div>
                            <div class="text-xs text-gray-500">/</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Published
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">2 min ago</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="h-6 w-6 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-bold text-indigo-600">A</div>
                                <span class="text-gray-600">Admin</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.editor') }}" class="p-1.5 hover:bg-indigo-50 text-indigo-600 rounded-md transition-colors" title="Edit">
                                    <i class="ph ph-pencil-simple text-lg"></i>
                                </a>
                                <button class="p-1.5 hover:bg-gray-100 text-gray-500 rounded-md transition-colors" title="Settings">
                                    <i class="ph ph-gear text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Row 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">Graduates</div>
                            <div class="text-xs text-gray-500">/graduate</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Published
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">1 hour ago</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="h-6 w-6 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-bold text-indigo-600">A</div>
                                <span class="text-gray-600">Admin</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.editor') }}" class="p-1.5 hover:bg-indigo-50 text-indigo-600 rounded-md transition-colors" title="Edit">
                                    <i class="ph ph-pencil-simple text-lg"></i>
                                </a>
                                <button class="p-1.5 hover:bg-gray-100 text-gray-500 rounded-md transition-colors" title="Settings">
                                    <i class="ph ph-gear text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Row 3 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">About Us</div>
                            <div class="text-xs text-gray-500">/about</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Draft
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">3 days ago</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="h-6 w-6 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-bold text-indigo-600">A</div>
                                <span class="text-gray-600">Admin</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.editor') }}" class="p-1.5 hover:bg-indigo-50 text-indigo-600 rounded-md transition-colors" title="Edit">
                                    <i class="ph ph-pencil-simple text-lg"></i>
                                </a>
                                <button class="p-1.5 hover:bg-red-50 text-red-600 rounded-md transition-colors" title="Delete">
                                    <i class="ph ph-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between">
            <div class="text-sm text-gray-500">Showing 1 to 3 of 12 entries</div>
            <div class="flex gap-2">
                <button class="px-3 py-1 border border-gray-200 rounded-lg text-sm text-gray-500 hover:bg-gray-50 disabled:opacity-50">Previous</button>
                <button class="px-3 py-1 border border-gray-200 rounded-lg text-sm text-gray-500 hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>
@endsection
