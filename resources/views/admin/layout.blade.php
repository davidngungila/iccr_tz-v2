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
                    <h1 class="text-lg font-bold text-white">ICCR Admin</h1>
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
        <nav class="mt-4 px-3 space-y-1 overflow-y-auto h-[calc(100vh-180px)]">
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
        
        <!-- User Info & Logout -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700 bg-gray-900/50 backdrop-blur-sm">
            <div class="mb-3 px-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-200 bg-gray-800/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>
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
                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        View Site
                    </a>
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
