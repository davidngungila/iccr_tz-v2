@extends('admin.layout')

@section('title', 'Settings')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Settings</h1>
    <p class="text-gray-600 mt-2">Configure your website settings</p>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-bold text-gray-900 mb-4">Cloudinary Configuration</h2>
    <p class="text-gray-600 mb-4">Make sure your Cloudinary credentials are configured in your <code class="bg-gray-100 px-2 py-1 rounded">.env</code> file:</p>
    
    <div class="bg-gray-50 rounded-lg p-4 mb-6">
        <pre class="text-sm"><code>CLOUDINARY_URL=cloudinary://api_key:api_secret@cloud_name</code></pre>
    </div>

    <div class="border-t border-gray-200 pt-6 mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Links</h3>
        <div class="space-y-2">
            <a href="https://cloudinary.com/users/login?RelayState=/app/c-ff9ffde98929eae2d0f0bf7c1b571e/assets/media_library/search" target="_blank" class="block text-blue-600 hover:text-blue-800">
                → Open Cloudinary Media Library
            </a>
            <a href="https://cloudinary.com/console" target="_blank" class="block text-blue-600 hover:text-blue-800">
                → Cloudinary Console
            </a>
        </div>
    </div>
</div>
@endsection

