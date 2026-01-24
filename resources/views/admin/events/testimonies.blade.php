@extends('admin.layout')

@section('title', 'Testimonies')
@section('subtitle', $event ? "Testimonies for {$event->title}" : 'All Testimonies')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Testimonies</h1>
            <p class="text-gray-600 mt-2">{{ $event ? "Testimonies for {$event->title}" : 'All testimonies' }}</p>
        </div>
        @if($event)
            <a href="{{ route('admin.events.registrations', $event) }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-700 font-semibold">
                Back to Event
            </a>
        @endif
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<!-- Filter -->
<div class="bg-white rounded-xl shadow-lg p-4 mb-6">
    <form method="GET" class="flex gap-4">
        <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
            <option value="">All Status</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
        <button type="submit" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg text-white font-semibold">
            Filter
        </button>
    </form>
</div>

<!-- Testimonies -->
<div class="space-y-4">
    @forelse($testimonies as $testimony)
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 {{ match($testimony->status) {
            'approved' => 'border-green-500',
            'rejected' => 'border-red-500',
            default => 'border-yellow-500'
        } }}">
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="font-bold text-gray-900">{{ $testimony->is_anonymous ? 'Anonymous' : $testimony->name }}</h3>
                        @if($testimony->is_featured)
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">Featured</span>
                        @endif
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ match($testimony->status) {
                            'approved' => 'bg-green-100 text-green-800',
                            'rejected' => 'bg-red-100 text-red-800',
                            default => 'bg-yellow-100 text-yellow-800'
                        } }}">
                            {{ ucfirst($testimony->status) }}
                        </span>
                    </div>
                    @if($testimony->event)
                        <p class="text-sm text-gray-600 mb-2">{{ $testimony->event->title }}</p>
                    @endif
                    @if($testimony->institution && !$testimony->is_anonymous)
                        <p class="text-sm text-gray-600 mb-2">{{ $testimony->institution }}</p>
                    @endif
                    <p class="text-gray-700 mb-3">{{ $testimony->testimony }}</p>
                    @if(!$testimony->is_anonymous)
                        <div class="text-sm text-gray-500">
                            @if($testimony->email) {{ $testimony->email }} • @endif
                            @if($testimony->phone) {{ $testimony->phone }} @endif
                        </div>
                    @endif
                </div>
                <div class="flex flex-col gap-2">
                    <form action="{{ route('admin.testimonies.update', $testimony) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="{{ $testimony->status === 'approved' ? 'pending' : 'approved' }}">
                        <button type="submit" class="px-3 py-1 bg-{{ $testimony->status === 'approved' ? 'yellow' : 'green' }}-600 hover:bg-{{ $testimony->status === 'approved' ? 'yellow' : 'green' }}-700 rounded text-white text-xs font-semibold">
                            {{ $testimony->status === 'approved' ? 'Unapprove' : 'Approve' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.testimonies.delete', $testimony) }}" method="POST" onsubmit="return confirm('Delete this testimony?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 rounded text-white text-xs font-semibold">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <p class="text-xs text-gray-400">{{ $testimony->created_at->format('M d, Y • g:i A') }}</p>
        </div>
    @empty
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No Testimonies</h3>
            <p class="text-gray-600">No testimonies found</p>
        </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $testimonies->links() }}
</div>
@endsection
