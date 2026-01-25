@extends('admin.layout')

@section('title', 'View Message')
@section('subtitle', 'Contact form message details')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Message Details</h1>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <p class="text-lg font-semibold text-gray-900">{{ $contactMessage->name }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <p class="text-lg text-gray-900">{{ $contactMessage->email }}</p>
            </div>
            @if($contactMessage->phone)
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                <p class="text-lg text-gray-900">{{ $contactMessage->phone }}</p>
            </div>
            @endif
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <span class="px-3 py-1 text-sm rounded-full {{ $contactMessage->status === 'new' ? 'bg-blue-100 text-blue-800' : ($contactMessage->status === 'read' ? 'bg-gray-100 text-gray-800' : ($contactMessage->status === 'replied' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800')) }}">
                    {{ ucfirst($contactMessage->status) }}
                </span>
            </div>
        </div>

        @if($contactMessage->subject)
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
            <p class="text-lg text-gray-900">{{ $contactMessage->subject }}</p>
        </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-gray-900 whitespace-pre-wrap">{{ $contactMessage->message }}</p>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Received</label>
            <p class="text-gray-600">{{ $contactMessage->created_at->format('F d, Y \a\t g:i A') }}</p>
        </div>

        <form action="{{ route('admin.messages.update', $contactMessage) }}" method="POST" class="border-t border-gray-200 pt-6">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                        <option value="new" {{ $contactMessage->status === 'new' ? 'selected' : '' }}>New</option>
                        <option value="read" {{ $contactMessage->status === 'read' ? 'selected' : '' }}>Read</option>
                        <option value="replied" {{ $contactMessage->status === 'replied' ? 'selected' : '' }}>Replied</option>
                        <option value="archived" {{ $contactMessage->status === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
                    <textarea name="admin_notes" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">{{ old('admin_notes', $contactMessage->admin_notes) }}</textarea>
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-2 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold">
                        Update Message
                    </button>
                    <a href="{{ route('admin.messages.index') }}" class="text-gray-600 hover:text-gray-900">Back to Messages</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection



