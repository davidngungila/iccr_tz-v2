<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard - ICCR Tanzania')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Third Party Libraries (Simulated via CDN for immediate preview) -->
    <!-- Chart.js for Analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Alpine.js for Interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <!-- Quill Rich Text Editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        .sidebar-active { background: rgba(255, 255, 255, 0.1); border-right: 3px solid #6366f1; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 antialiased" x-data="{ sidebarOpen: false, userDropdownOpen: false }">

    <!-- Mobile Header -->
    <div class="md:hidden flex items-center justify-between bg-white border-b px-4 py-3 sticky top-0 z-30">
        <div class="flex items-center gap-3">
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-700">
                <i class="ph ph-list text-2xl"></i>
            </button>
            <span class="font-bold text-lg text-gray-800">ICCR Admin</span>
        </div>
        <img src="{{ asset('images/logo.png') }}" class="h-8 w-auto">
    </div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-40 w-64 bg-slate-900 text-white transition-transform duration-300 md:static md:translate-x-0 flex flex-col shadow-2xl">
            <!-- Sidebar Header -->
            <div class="h-16 flex items-center px-6 bg-slate-950 border-b border-slate-800">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" class="h-8 w-auto bg-white rounded-full p-0.5">
                    <span class="font-bold text-xl tracking-tight">ICCR Panel</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-2">Overview</p>
                
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-white shadow-sm' : '' }}">
                    <i class="ph ph-squares-four text-xl mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-indigo-500' : 'text-slate-400 group-hover:text-white' }}"></i>
                    Dashboard
                </a>

                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">Content</p>
                
                <a href="{{ route('admin.pages') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.pages') ? 'bg-slate-800 text-white shadow-sm' : '' }}">
                    <i class="ph ph-files text-xl mr-3 {{ request()->routeIs('admin.pages') ? 'text-indigo-500' : 'text-slate-400 group-hover:text-white' }}"></i>
                    Pages
                </a>
                
                <a href="{{ route('admin.events') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.events') ? 'bg-slate-800 text-white shadow-sm' : '' }}">
                    <i class="ph ph-calendar-plus text-xl mr-3 {{ request()->routeIs('admin.events') ? 'text-indigo-500' : 'text-slate-400 group-hover:text-white' }}"></i>
                    Events
                </a>
                
                <a href="#" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">
                    <i class="ph ph-users-three text-xl mr-3 text-slate-400 group-hover:text-white"></i>
                    Graduates
                </a>

                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">Management</p>

                <a href="{{ route('admin.users') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.users') ? 'bg-slate-800 text-white shadow-sm' : '' }}">
                    <i class="ph ph-user-gear text-xl mr-3 {{ request()->routeIs('admin.users') ? 'text-indigo-500' : 'text-slate-400 group-hover:text-white' }}"></i>
                    Users
                </a>
                
                <a href="{{ route('admin.settings') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.settings') ? 'bg-slate-800 text-white shadow-sm' : '' }}">
                    <i class="ph ph-gear text-xl mr-3 {{ request()->routeIs('admin.settings') ? 'text-indigo-500' : 'text-slate-400 group-hover:text-white' }}"></i>
                    Settings
                </a>
            </nav>

            <!-- User Profile (Bottom Sidebar) -->
            <div class="border-t border-slate-800 p-4">
                <div class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold text-sm">A</div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">Administrator</p>
                        <p class="text-xs text-slate-400 truncate">admin@iccr.or.tz</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden bg-gray-50">
            <!-- Top Bar -->
            <header class="h-16 bg-white border-b flex items-center justify-between px-6 z-20 shadow-sm">
                <!-- Live Breadcrumb / Search -->
                <div class="flex items-center gap-4">
                    <div class="relative hidden sm:block">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="ph ph-magnifying-glass text-gray-400"></i>
                        </span>
                        <input type="text" placeholder="Global search..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-64">
                    </div>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center gap-4">
                    <button class="relative p-2 text-gray-400 hover:text-gray-600 transition-colors rounded-full hover:bg-gray-100">
                        <i class="ph ph-bell text-xl"></i>
                        <span class="absolute top-2 right-2 h-2 w-2 bg-red-500 rounded-full border border-white"></span>
                    </button>
                    
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 hover:bg-gray-50 p-1.5 rounded-full transition-colors">
                            <div class="h-8 w-8 rounded-full bg-indigo-100 border border-indigo-200 flex items-center justify-center text-indigo-700 font-bold text-xs">A</div>
                        </button>
                        
                        <!-- Dropdown -->
                        <div x-show="open" @click.away="open = false" x-transition.origin.top.right class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-1 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2">
                                <i class="ph ph-user text-gray-400"></i> Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2">
                                <i class="ph ph-gear text-gray-400"></i> Account
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="{{ route('admin.logout') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 flex items-center gap-2">
                                <i class="ph ph-sign-out"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Scrollable Area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                @if(isset($header))
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $header }}</h1>
                        @if(isset($subheader))
                        <p class="text-sm text-gray-500 mt-1">{{ $subheader }}</p>
                        @endif
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
        
        <!-- Sidebar Backdrop (Mobile) -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-slate-900/50 z-30 md:hidden backdrop-blur-sm" x-transition.opacity></div>
    </div>
    @stack('scripts')
</body>
</html>
