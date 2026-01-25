@extends('admin.layout')

@section('title', 'Log Details - ICCR Admin')

@section('content')
<div class="p-6 md:p-8">
    <div class="mb-8">
        <a href="{{ route('admin.security.logs') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 mb-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Logs
        </a>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Activity Log Details</h1>
        <p class="text-gray-600">Detailed information about this activity log entry</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Basic Information</h2>
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">User</label>
                            <p class="text-gray-900">
                                {{ $log->user->name ?? 'System' }}
                                @if($log->user)
                                <span class="text-gray-500 text-sm">({{ $log->user->email }})</span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Action</label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $log->action === 'login' ? 'bg-green-100 text-green-700' : ($log->action === 'logout' ? 'bg-red-100 text-red-700' : ($log->action === 'created' ? 'bg-blue-100 text-blue-700' : ($log->action === 'updated' ? 'bg-yellow-100 text-yellow-700' : ($log->action === 'deleted' ? 'bg-red-100 text-red-700' : ($log->action === 'sms_error' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700'))))) }}">
                                {{ ucfirst($log->action) }}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Model Type</label>
                            <p class="text-gray-900">{{ $log->model_type ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Model ID</label>
                            <p class="text-gray-900">{{ $log->model_id ?? '-' }}</p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <div class="bg-gray-50 rounded-lg p-4 border-2 border-gray-200">
                            <p class="text-gray-900 whitespace-pre-wrap">{{ $log->description ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Changes (if available) -->
            @if($log->changes && count($log->changes) > 0)
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Changes</h2>
                <div class="space-y-3">
                    @foreach($log->changes as $field => $value)
                    <div class="border-l-4 border-blue-500 pl-4 py-2">
                        <div class="font-semibold text-gray-900">{{ $field }}</div>
                        <div class="text-sm text-gray-600 mt-1">
                            @if(is_array($value))
                                <pre class="bg-gray-50 p-2 rounded text-xs overflow-x-auto">{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>
                            @else
                                {{ $value }}
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Technical Details -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Technical Details</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">IP Address</label>
                        <p class="text-gray-900 font-mono">{{ $log->ip_address ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">User Agent</label>
                        <p class="text-gray-900 text-xs break-all">{{ $log->user_agent ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Log ID</label>
                        <p class="text-gray-900 font-mono text-xs">#{{ $log->id }}</p>
                    </div>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Timestamps</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Created At</label>
                        <p class="text-gray-900">{{ $log->created_at->format('M d, Y H:i:s') }}</p>
                        <p class="text-gray-500 text-xs mt-1">{{ $log->created_at->diffForHumans() }}</p>
                    </div>
                    @if($log->updated_at && $log->updated_at->ne($log->created_at))
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Updated At</label>
                        <p class="text-gray-900">{{ $log->updated_at->format('M d, Y H:i:s') }}</p>
                        <p class="text-gray-500 text-xs mt-1">{{ $log->updated_at->diffForHumans() }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Actions</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.security.logs') }}" class="block w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition text-center">
                        Back to Logs
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


