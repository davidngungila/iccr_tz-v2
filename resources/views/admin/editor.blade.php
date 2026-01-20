@extends('admin.layout')

@section('title', 'Content Editor')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Content Editor</h1>
    <p class="text-gray-600 mt-2">Edit page content and manage website structure</p>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <p class="text-gray-600">Content editor coming soon. Use the Pages section to manage your content.</p>
    <a href="{{ route('admin.pages') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">Go to Pages →</a>
</div>
@endsection

