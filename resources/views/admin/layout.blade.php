<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Admin Panel | ICCR Tanzania</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        
        /* Mazzard Font Family */
        @font-face {
            font-family: 'Mazzard';
            src: url('{{ asset("mazzard/MazzardH-ExtraLight.otf") }}') format('opentype');
            font-weight: 200;
            font-style: normal;
        }
        @font-face {
            font-family: 'Mazzard';
            src: url('{{ asset("mazzard/MazzardH-ExtraLight.otf") }}') format('opentype');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'Mazzard';
            src: url('{{ asset("mazzard/MazzardH-Bold.otf") }}') format('opentype');
            font-weight: 700;
            font-style: normal;
        }
        @font-face {
            font-family: 'Mazzard';
            src: url('{{ asset("mazzard/MazzardH-ExtraBold.otf") }}') format('opentype');
            font-weight: 800;
            font-style: normal;
        }
        
        * {
            font-family: 'Mazzard', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        }
        
        .sidebar-dropdown {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        
        .sidebar-dropdown.open {
            max-height: 500px;
        }
        
        /* Custom Scrollbar for Sidebar */
        nav::-webkit-scrollbar {
            width: 6px;
        }
        
        nav::-webkit-scrollbar-track {
            background: transparent;
        }
        
        nav::-webkit-scrollbar-thumb {
            background: rgba(156, 163, 175, 0.5);
            border-radius: 3px;
        }
        
        nav::-webkit-scrollbar-thumb:hover {
            background: rgba(156, 163, 175, 0.7);
        }
    </style>
</head>
<body class="bg-gray-50" style="font-family: 'Mazzard', 'Inter', sans-serif;">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white transform transition-transform duration-300 ease-in-out lg:translate-x-0 -translate-x-full shadow-2xl">
        <!-- Logo -->
        <div class="flex items-center justify-between h-20 px-6 border-b border-gray-700 bg-gray-900/50 backdrop-blur-sm">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="ICCR Logo" class="w-10 h-10 rounded-lg">
                <div>
                    <div class="flex items-center gap-2">
                        <h1 class="text-lg font-bold text-white">ICCR Admin</h1>
                        @if(Auth::user()->isAdmin())
                            <span class="text-xs bg-gradient-to-r from-yellow-400 to-yellow-600 text-white px-2 py-0.5 rounded-full font-semibold flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                Admin
                            </span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-400">Dashboard</p>
                </div>
            </div>
            <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <!-- Navigation -->
        <nav class="mt-4 px-3 space-y-1 overflow-y-auto overflow-x-hidden h-[calc(100vh-80px)]" style="scrollbar-width: thin; scrollbar-color: rgba(156, 163, 175, 0.5) transparent;">
            <!-- 1️⃣ Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">🧭</span>
                <span class="font-medium">Dashboard</span>
            </a>
            
            <!-- 2️⃣ Pages -->
            <div class="sidebar-dropdown-parent">
                <button onclick="toggleDropdown('pages')" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.pages*') ? 'bg-gray-800 text-white' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">📄</span>
                        <span class="font-medium">Pages</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform" id="pages-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="pages-dropdown" class="sidebar-dropdown {{ request()->routeIs('admin.pages*') ? 'open' : '' }}">
                    <div class="pl-4 pt-1 space-y-1">
                        <a href="{{ route('admin.pages') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.pages') && !request()->routeIs('admin.pages.create') && !request()->routeIs('admin.pages.edit') ? 'text-white bg-gray-800' : '' }}">All Pages</a>
                        <a href="{{ route('admin.pages.create') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.pages.create') ? 'text-white bg-gray-800' : '' }}">Add New Page</a>
                    </div>
                </div>
            </div>
            
            <!-- 3️⃣ Homepage -->
            <a href="{{ route('admin.homepage') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.homepage*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">🏠</span>
                <span class="font-medium">Homepage</span>
            </a>
            
            <!-- 4️⃣ Blog / News -->
            <div class="sidebar-dropdown-parent">
                <button onclick="toggleDropdown('blog')" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.blog*') ? 'bg-gray-800 text-white' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">📰</span>
                        <span class="font-medium">Blog / News</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform" id="blog-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="blog-dropdown" class="sidebar-dropdown {{ request()->routeIs('admin.blog*') ? 'open' : '' }}">
                    <div class="pl-4 pt-1 space-y-1">
                        <a href="{{ route('admin.blog.index') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.blog.index') ? 'text-white bg-gray-800' : '' }}">All Posts</a>
                        <a href="{{ route('admin.blog.create') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.blog.create') ? 'text-white bg-gray-800' : '' }}">Add New Post</a>
                        <a href="{{ route('admin.blog.categories') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.blog.categories') ? 'text-white bg-gray-800' : '' }}">Categories</a>
                        <a href="{{ route('admin.blog.tags') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.blog.tags') ? 'text-white bg-gray-800' : '' }}">Tags</a>
                    </div>
                </div>
            </div>
            
            <!-- 5️⃣ Events -->
            <div class="sidebar-dropdown-parent">
                <button onclick="toggleDropdown('events')" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.events*') ? 'bg-gray-800 text-white' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">📅</span>
                        <span class="font-medium">Events</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform" id="events-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="events-dropdown" class="sidebar-dropdown {{ request()->routeIs('admin.events*') ? 'open' : '' }}">
                    <div class="pl-4 pt-1 space-y-1">
                        <a href="{{ route('admin.events') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.events') && !request()->routeIs('admin.events.create') && !request()->routeIs('admin.events.edit') ? 'text-white bg-gray-800' : '' }}">All Events</a>
                        <a href="{{ route('admin.events.create') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.events.create') ? 'text-white bg-gray-800' : '' }}">Add New Event</a>
                    </div>
                </div>
            </div>
            
            <!-- 6️⃣ Media Library -->
            <div class="sidebar-dropdown-parent">
                <button onclick="toggleDropdown('media')" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.media*') ? 'bg-gray-800 text-white' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">🖼️</span>
                        <span class="font-medium">Media Library</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform" id="media-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="media-dropdown" class="sidebar-dropdown {{ request()->routeIs('admin.media*') ? 'open' : '' }}">
                    <div class="pl-4 pt-1 space-y-1">
                        <a href="{{ route('admin.media') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.media') && !request()->routeIs('admin.media.create') && !request()->routeIs('admin.media.edit') ? 'text-white bg-gray-800' : '' }}">All Media</a>
                        <a href="{{ route('admin.media.create') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.media.create') ? 'text-white bg-gray-800' : '' }}">Add Media</a>
                    </div>
                </div>
            </div>
            
            <!-- 7️⃣ Menus & Navigation -->
            <a href="{{ route('admin.menus') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.menus*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">🧭</span>
                <span class="font-medium">Menus & Navigation</span>
            </a>
            
            <!-- 8️⃣ Popups & Announcements -->
            <a href="{{ route('admin.popups') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.popups*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">🔔</span>
                <span class="font-medium">Popups & Announcements</span>
            </a>
            
            <!-- 9️⃣ Team & Leadership -->
            <a href="{{ route('admin.team') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.team*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">👥</span>
                <span class="font-medium">Team & Leadership</span>
            </a>
            
            <!-- 🔟 Footer & Info -->
            <a href="{{ route('admin.footer') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.footer*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">📋</span>
                <span class="font-medium">Footer & Info</span>
            </a>
            
            <!-- 1️⃣1️⃣ Forms & Messages -->
            <div class="sidebar-dropdown-parent">
                <button onclick="toggleDropdown('messages')" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.messages*') ? 'bg-gray-800 text-white' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">✉️</span>
                        <span class="font-medium">Forms & Messages</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform" id="messages-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="messages-dropdown" class="sidebar-dropdown {{ request()->routeIs('admin.messages*') ? 'open' : '' }}">
                    <div class="pl-4 pt-1 space-y-1">
                        <a href="{{ route('admin.messages.index') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.messages.index') ? 'text-white bg-gray-800' : '' }}">Contact Messages</a>
                        <a href="{{ route('admin.messages.newsletter') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.messages.newsletter') ? 'text-white bg-gray-800' : '' }}">Newsletter Subscribers</a>
                    </div>
                </div>
            </div>
            
            <!-- 1️⃣2️⃣ SEO & Analytics -->
            <a href="{{ route('admin.seo') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.seo*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">🔍</span>
                <span class="font-medium">SEO & Analytics</span>
            </a>
            
            <!-- 1️⃣3️⃣ Users -->
            <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.users*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">👤</span>
                <span class="font-medium">Users</span>
            </a>
            
            <!-- 1️⃣4️⃣ Settings -->
            <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.settings*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">⚙️</span>
                <span class="font-medium">Settings</span>
            </a>
            
            <!-- 1️⃣5️⃣ Security -->
            <div class="sidebar-dropdown-parent">
                <button onclick="toggleDropdown('security')" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.security*') ? 'bg-gray-800 text-white' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">🔒</span>
                        <span class="font-medium">Security</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform" id="security-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="security-dropdown" class="sidebar-dropdown {{ request()->routeIs('admin.security*') ? 'open' : '' }}">
                    <div class="pl-4 pt-1 space-y-1">
                        <a href="{{ route('admin.security') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.security') && !request()->routeIs('admin.security.logs') ? 'text-white bg-gray-800' : '' }}">Security Overview</a>
                        <a href="{{ route('admin.security.logs') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.security.logs') ? 'text-white bg-gray-800' : '' }}">Activity Logs</a>
                    </div>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="lg:pl-72">
        <!-- Top Bar -->
        <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-lg border-b border-gray-200 shadow-sm">
            <div class="flex items-center justify-between h-20 px-6">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="lg:hidden text-gray-600 hover:text-gray-900 p-2 rounded-lg hover:bg-gray-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">@yield('title', 'Dashboard')</h2>
                        <p class="text-sm text-gray-500">@yield('subtitle', 'Manage your website')</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <!-- Search Bar -->
                    <div class="hidden lg:flex items-center relative">
                        <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 w-64 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    
                    <!-- Notifications -->
                    <div class="relative group">
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <!-- Notifications Dropdown -->
                        <div class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-2xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-2 z-50">
                            <div class="p-4 border-b border-gray-200">
                                <h3 class="font-semibold text-gray-900">Notifications</h3>
                            </div>
                            <div class="max-h-96 overflow-y-auto">
                                <div class="p-4 text-center text-gray-500 text-sm">No new notifications</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="hidden xl:flex items-center gap-2">
                        <a href="{{ route('admin.pages.create') }}" class="p-2 text-gray-600 hover:text-green-600 hover:bg-green-50 rounded-lg transition" title="New Page">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </a>
                        <a href="{{ route('admin.blog.create') }}" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="New Post">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- View Site -->
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        <span class="hidden lg:inline">View Site</span>
                    </a>
                    
                    <!-- User Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition">
                            <div class="relative">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                @if(Auth::user()->isAdmin())
                                    <div class="absolute -bottom-1 -right-1 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full p-1 shadow-lg border-2 border-white">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="text-left hidden lg:block">
                                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-500 hidden lg:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        
                        <!-- Enhanced Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-72 bg-white rounded-xl shadow-2xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-2 z-50">
                            <!-- User Info Header -->
                            <div class="p-5 bg-gradient-to-br from-green-50 to-blue-50 border-b border-gray-200">
                                <div class="flex items-center gap-3">
                                    <div class="relative">
                                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg text-lg">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </div>
                                        @if(Auth::user()->isAdmin())
                                            <div class="absolute -bottom-1 -right-1 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full p-1 shadow-lg border-2 border-white">
                                                <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-600 truncate">{{ Auth::user()->email }}</p>
                                        @if(Auth::user()->isAdmin())
                                            <span class="inline-flex items-center gap-1 mt-1 text-xs bg-gradient-to-r from-yellow-400 to-yellow-600 text-white px-2 py-0.5 rounded-full font-semibold">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                                Administrator
                                            </span>
                                        @else
                                            <span class="inline-flex items-center mt-1 text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full font-semibold">Editor</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Menu Items -->
                            <div class="py-2">
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-blue-50 hover:text-green-600 transition">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    <span>Dashboard</span>
                                </a>
                                <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-blue-50 hover:text-green-600 transition">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>My Profile</span>
                                </a>
                                <a href="{{ route('admin.security') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-blue-50 hover:text-green-600 transition">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <span>Security</span>
                                </a>
                                <div class="border-t border-gray-200 my-2"></div>
                                <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-blue-50 hover:text-green-600 transition">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>Settings</span>
                                </a>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition text-left rounded-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6 lg:p-8">
            @if(session('success'))
                <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-lg shadow-sm flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 text-red-800 px-6 py-4 rounded-lg shadow-sm flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Mobile Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="toggleSidebar()"></div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function toggleDropdown(name) {
            const dropdown = document.getElementById(name + '-dropdown');
            const arrow = document.getElementById(name + '-arrow');
            dropdown.classList.toggle('open');
            arrow.classList.toggle('rotate-180');
        }

        // Auto-open dropdowns if on that section
        document.addEventListener('DOMContentLoaded', function() {
            const activeDropdowns = document.querySelectorAll('.sidebar-dropdown.open');
            activeDropdowns.forEach(dropdown => {
                const arrow = dropdown.previousElementSibling.querySelector('svg');
                if (arrow) arrow.classList.add('rotate-180');
            });
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                if (!sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
