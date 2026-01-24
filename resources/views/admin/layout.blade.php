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
        
        /* Force scrollbar to be visible when content overflows */
        nav {
            overflow-y: scroll !important;
            -webkit-overflow-scrolling: touch;
        }
        
        /* Critical CSS for Production - Ensures layout works even without Tailwind */
        body {
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            color: #111827;
        }
        
        /* Flexbox utilities */
        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .gap-2 { gap: 0.5rem; }
        .gap-3 { gap: 0.75rem; }
        .gap-4 { gap: 1rem; }
        
        /* Layout */
        .fixed { position: fixed; }
        .absolute { position: absolute; }
        .relative { position: relative; }
        .sticky { position: sticky; }
        .inset-0 { top: 0; right: 0; bottom: 0; left: 0; }
        .inset-y-0 { top: 0; bottom: 0; }
        .left-0 { left: 0; }
        .right-0 { right: 0; }
        .top-0 { top: 0; }
        .z-40 { z-index: 40; }
        .z-50 { z-index: 50; }
        
        /* Width & Height */
        .w-72 { width: 18rem; }
        .w-10 { width: 2.5rem; }
        .w-12 { width: 3rem; }
        .h-10 { height: 2.5rem; }
        .h-12 { height: 3rem; }
        .h-20 { height: 5rem; }
        .h-full { height: 100%; }
        
        /* Spacing */
        .p-2 { padding: 0.5rem; }
        .p-4 { padding: 1rem; }
        .p-5 { padding: 1.25rem; }
        .p-6 { padding: 1.5rem; }
        .px-3 { padding-left: 0.75rem; padding-right: 0.75rem; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem; }
        .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
        .pt-1 { padding-top: 0.25rem; }
        .pl-4 { padding-left: 1rem; }
        .mt-1 { margin-top: 0.25rem; }
        .mt-4 { margin-top: 1rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        
        /* Colors */
        .bg-white { background-color: #ffffff; }
        .bg-gray-50 { background-color: #f9fafb; }
        .bg-gray-100 { background-color: #f3f4f6; }
        .bg-gray-800 { background-color: #1f2937; }
        .bg-gray-900 { background-color: #111827; }
        .text-white { color: #ffffff; }
        .text-gray-300 { color: #d1d5db; }
        .text-gray-400 { color: #9ca3af; }
        .text-gray-500 { color: #6b7280; }
        .text-gray-600 { color: #4b5563; }
        .text-gray-700 { color: #374151; }
        .text-gray-900 { color: #111827; }
        .text-green-600 { color: #16a34a; }
        .text-red-600 { color: #dc2626; }
        
        /* Typography */
        .text-xs { font-size: 0.75rem; line-height: 1rem; }
        .text-sm { font-size: 0.875rem; line-height: 1.25rem; }
        .text-lg { font-size: 1.125rem; line-height: 1.75rem; }
        .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
        .font-medium { font-weight: 500; }
        .font-semibold { font-weight: 600; }
        .font-bold { font-weight: 700; }
        .text-left { text-align: left; }
        .text-center { text-align: center; }
        
        /* Borders */
        .border { border-width: 1px; }
        .border-b { border-bottom-width: 1px; }
        .border-t { border-top-width: 1px; }
        .border-gray-200 { border-color: #e5e7eb; }
        .border-gray-700 { border-color: #374151; }
        .rounded-lg { border-radius: 0.5rem; }
        .rounded-xl { border-radius: 0.75rem; }
        .rounded-full { border-radius: 9999px; }
        
        /* Shadows */
        .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
        .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); }
        
        /* Transitions */
        .transition { transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
        .transition-all { transition-property: all; }
        .duration-200 { transition-duration: 200ms; }
        .duration-300 { transition-duration: 300ms; }
        
        /* Transform */
        .transform { transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)); }
        .translate-x-0 { transform: translateX(0); }
        .-translate-x-full { transform: translateX(-100%); }
        .translate-y-0 { transform: translateY(0); }
        .translate-y-2 { transform: translateY(0.5rem); }
        .rotate-180 { transform: rotate(180deg); }
        
        /* Overflow */
        .overflow-hidden { overflow: hidden; }
        .overflow-y-auto { overflow-y: auto; }
        .overflow-x-hidden { overflow-x: hidden; }
        
        /* Display */
        .hidden { display: none; }
        .block { display: block; }
        .inline { display: inline; }
        .inline-block { display: inline-block; }
        .inline-flex { display: inline-flex; }
        
        /* Visibility */
        .opacity-0 { opacity: 0; }
        .opacity-100 { opacity: 1; }
        .invisible { visibility: hidden; }
        .visible { visibility: visible; }
        
        /* Pointer Events */
        .pointer-events-none { pointer-events: none; }
        .pointer-events-auto { pointer-events: auto; }
        
        /* Width utilities */
        .w-full { width: 100%; }
        .w-4 { width: 1rem; }
        .w-5 { width: 1.25rem; }
        .w-6 { width: 1.5rem; }
        .w-64 { width: 16rem; }
        .w-80 { width: 20rem; }
        
        /* Height utilities */
        .h-2 { height: 0.5rem; }
        .h-3 { height: 0.75rem; }
        .h-4 { height: 1rem; }
        .h-5 { height: 1.25rem; }
        .h-6 { height: 1.5rem; }
        
        /* Space utilities */
        .space-y-1 > * + * { margin-top: 0.25rem; }
        
        /* Hover states */
        .hover\:bg-gray-100:hover { background-color: #f3f4f6; }
        .hover\:bg-gray-800:hover { background-color: #1f2937; }
        .hover\:text-white:hover { color: #ffffff; }
        .hover\:text-gray-900:hover { color: #111827; }
        
        /* Responsive */
        @media (min-width: 1024px) {
            .lg\:pl-72 { padding-left: 18rem; }
            .lg\:translate-x-0 { transform: translateX(0); }
            .lg\:hidden { display: none; }
            .lg\:flex { display: flex; }
            .lg\:block { display: block; }
            .lg\:inline { display: inline; }
        }
        
        /* Gradient backgrounds */
        .bg-gradient-to-b { background-image: linear-gradient(to bottom, var(--tw-gradient-stops)); }
        .bg-gradient-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)); }
        .bg-gradient-to-br { background-image: linear-gradient(to bottom right, var(--tw-gradient-stops)); }
        .from-gray-900 { --tw-gradient-from: #111827; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(17, 24, 39, 0)); }
        .via-gray-800 { --tw-gradient-stops: var(--tw-gradient-from), #1f2937, var(--tw-gradient-to, rgba(31, 41, 55, 0)); }
        .to-gray-900 { --tw-gradient-to: #111827; }
        .from-green-400 { --tw-gradient-from: #4ade80; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(74, 222, 128, 0)); }
        .to-blue-500 { --tw-gradient-to: #3b82f6; }
        .from-green-600 { --tw-gradient-from: #16a34a; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(22, 163, 74, 0)); }
        .to-blue-600 { --tw-gradient-to: #2563eb; }
        .from-green-50 { --tw-gradient-from: #f0fdf4; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(240, 253, 244, 0)); }
        .to-blue-50 { --tw-gradient-to: #eff6ff; }
        .from-yellow-400 { --tw-gradient-from: #facc15; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(250, 204, 21, 0)); }
        .to-yellow-600 { --tw-gradient-to: #ca8a04; }
        
        /* Backdrop */
        .backdrop-blur-sm { backdrop-filter: blur(4px); }
        .backdrop-blur-lg { backdrop-filter: blur(16px); }
        
        /* Border radius */
        .rounded-2xl { border-radius: 1rem; }
        
        /* Min width */
        .min-w-0 { min-width: 0px; }
        
        /* Truncate */
        .truncate { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        
        /* Flex shrink */
        .flex-shrink-0 { flex-shrink: 0; }
        
        /* Flex 1 */
        .flex-1 { flex: 1 1 0%; }
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
        <nav class="mt-4 px-3 space-y-1 overflow-y-auto overflow-x-hidden" style="height: calc(100vh - 80px); scrollbar-width: thin; scrollbar-color: rgba(156, 163, 175, 0.5) transparent;">
            <!-- 1️⃣ Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">🧭</span>
                <span class="font-medium">Dashboard</span>
            </a>
            
            <!-- 3️⃣ Homepage -->
            <div class="sidebar-dropdown-parent">
                <button onclick="toggleDropdown('homepage')" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.homepage*') || request()->routeIs('admin.slides*') ? 'bg-gray-800 text-white' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">🏠</span>
                        <span class="font-medium">Homepage</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform" id="homepage-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="homepage-dropdown" class="sidebar-dropdown {{ request()->routeIs('admin.homepage*') || request()->routeIs('admin.slides*') || request()->is('admin/slides*') ? 'open' : '' }}">
                    <div class="pl-4 pt-1 space-y-1">
                        <a href="{{ route('admin.homepage') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.homepage*') && !request()->routeIs('admin.slides*') && !request()->is('admin/slides*') ? 'text-white bg-gray-800' : '' }}">Homepage Settings</a>
                        @php
                            $slidesRoute = Route::has('admin.slides.index') ? route('admin.slides.index') : url('/admin/slides');
                            $isSlidesActive = request()->routeIs('admin.slides*') || request()->is('admin/slides*');
                        @endphp
                        <a href="{{ $slidesRoute }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ $isSlidesActive ? 'text-white bg-gray-800' : '' }}">Carousel Slides</a>
                    </div>
                </div>
            </div>
            
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
                <button onclick="toggleDropdown('media')" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.media*') || request()->routeIs('admin.cloudinary*') ? 'bg-gray-800 text-white' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">🖼️</span>
                        <span class="font-medium">Media Library</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform" id="media-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="media-dropdown" class="sidebar-dropdown {{ request()->routeIs('admin.media*') || request()->routeIs('admin.cloudinary*') || request()->is('admin/cloudinary*') ? 'open' : '' }}">
                    <div class="pl-4 pt-1 space-y-1">
                        <a href="{{ route('admin.media') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.media') && !request()->routeIs('admin.media.create') && !request()->routeIs('admin.media.edit') && !request()->routeIs('admin.cloudinary*') && !request()->is('admin/cloudinary*') ? 'text-white bg-gray-800' : '' }}">All Media</a>
                        <a href="{{ route('admin.media.create') }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->routeIs('admin.media.create') ? 'text-white bg-gray-800' : '' }}">Add Media</a>
                        @php
                            $cloudinaryRoute = Route::has('admin.cloudinary.index') ? route('admin.cloudinary.index') : url('/admin/cloudinary');
                            $isCloudinaryActive = request()->routeIs('admin.cloudinary*') || request()->is('admin/cloudinary*');
                        @endphp
                        <a href="{{ $cloudinaryRoute }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ $isCloudinaryActive && !request()->is('admin/cloudinary/settings') ? 'text-white bg-gray-800' : '' }}">Cloudinary Assets</a>
                        @php
                            $cloudinarySettingsRoute = Route::has('admin.cloudinary.settings') ? route('admin.cloudinary.settings') : url('/admin/cloudinary/settings');
                        @endphp
                        <a href="{{ $cloudinarySettingsRoute }}" class="block px-4 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition {{ request()->is('admin/cloudinary/settings') ? 'text-white bg-gray-800' : '' }}">Cloudinary Settings</a>
                    </div>
                </div>
            </div>
            
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
            
            <!-- 💳 Payment Details -->
            <a href="{{ route('admin.donate') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.donate*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">💳</span>
                <span class="font-medium">Payment Details</span>
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
            
            <!-- 1️⃣4️⃣ Communication Settings -->
            <a href="{{ route('admin.communication') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.communication*') ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg' : '' }}">
                <span class="text-xl">📱</span>
                <span class="font-medium">Communication Settings</span>
            </a>
            
            <!-- 1️⃣5️⃣ Settings -->
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
                    <div class="relative" id="notificationsDropdown">
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition" id="notificationsBtn">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <!-- Notifications Dropdown -->
                        <div class="absolute right-0 mt-1 w-80 bg-white rounded-xl shadow-2xl border border-gray-200 opacity-0 invisible pointer-events-none transition-all duration-200 transform translate-y-2 z-50" id="notificationsMenu">
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
                    <div class="relative" id="userDropdown">
                        <button class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition" id="userDropdownBtn">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
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
                        <div class="absolute right-0 mt-1 w-72 bg-white rounded-xl shadow-2xl border border-gray-200 opacity-0 invisible pointer-events-none transition-all duration-200 transform translate-y-2 z-50" id="userDropdownMenu">
                            <!-- User Info Header -->
                            <div class="p-5 bg-gradient-to-br from-green-50 to-blue-50 border-b border-gray-200">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg text-lg">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
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

        // User Dropdown Hover Control
        let userDropdownTimeout;
        const userDropdownBtn = document.getElementById('userDropdownBtn');
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        const userDropdown = document.getElementById('userDropdown');

        if (userDropdownBtn && userDropdownMenu) {
            userDropdown.addEventListener('mouseenter', function() {
                clearTimeout(userDropdownTimeout);
                userDropdownMenu.classList.remove('opacity-0', 'invisible', 'pointer-events-none', 'translate-y-2');
                userDropdownMenu.classList.add('opacity-100', 'visible', 'pointer-events-auto', 'translate-y-0');
            });

            userDropdown.addEventListener('mouseleave', function() {
                userDropdownTimeout = setTimeout(function() {
                    userDropdownMenu.classList.remove('opacity-100', 'visible', 'pointer-events-auto', 'translate-y-0');
                    userDropdownMenu.classList.add('opacity-0', 'invisible', 'pointer-events-none', 'translate-y-2');
                }, 100);
            });
        }

        // Notifications Dropdown Hover Control
        let notificationsTimeout;
        const notificationsBtn = document.getElementById('notificationsBtn');
        const notificationsMenu = document.getElementById('notificationsMenu');
        const notificationsDropdown = document.getElementById('notificationsDropdown');

        if (notificationsBtn && notificationsMenu) {
            notificationsDropdown.addEventListener('mouseenter', function() {
                clearTimeout(notificationsTimeout);
                notificationsMenu.classList.remove('opacity-0', 'invisible', 'pointer-events-none', 'translate-y-2');
                notificationsMenu.classList.add('opacity-100', 'visible', 'pointer-events-auto', 'translate-y-0');
            });

            notificationsDropdown.addEventListener('mouseleave', function() {
                notificationsTimeout = setTimeout(function() {
                    notificationsMenu.classList.remove('opacity-100', 'visible', 'pointer-events-auto', 'translate-y-0');
                    notificationsMenu.classList.add('opacity-0', 'invisible', 'pointer-events-none', 'translate-y-2');
                }, 100);
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
