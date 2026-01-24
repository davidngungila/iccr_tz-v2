@extends('admin.layout')

@section('title', 'Prayer Requests')
@section('subtitle', $event ? "Prayer Requests for {$event->title}" : 'All Prayer Requests')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Prayer Requests</h1>
            <p class="text-gray-600 mt-2">{{ $event ? "Prayer requests for {$event->title}" : 'All prayer requests' }}</p>
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
            <option value="prayed_for" {{ request('status') === 'prayed_for' ? 'selected' : '' }}>Prayed For</option>
            <option value="answered" {{ request('status') === 'answered' ? 'selected' : '' }}>Answered</option>
        </select>
        <button type="submit" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg text-white font-semibold">
            Filter
        </button>
    </form>
</div>

<!-- Prayer Requests -->
<div class="space-y-4">
    @forelse($prayerRequests as $request)
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 {{ match($request->status) {
            'answered' => 'border-green-500',
            'prayed_for' => 'border-blue-500',
            default => 'border-yellow-500'
        } }}">
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="font-bold text-gray-900">{{ $request->is_anonymous ? 'Anonymous' : $request->name }}</h3>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ match($request->status) {
                            'answered' => 'bg-green-100 text-green-800',
                            'prayed_for' => 'bg-blue-100 text-blue-800',
                            default => 'bg-yellow-100 text-yellow-800'
                        } }}">
                            {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                        </span>
                    </div>
                    @if($request->event)
                        <p class="text-sm text-gray-600 mb-2">{{ $request->event->title }}</p>
                    @endif
                    <p class="text-gray-700 mb-3">{{ $request->request }}</p>
                    @if(!$request->is_anonymous)
                        <div class="text-sm text-gray-500">
                            @if($request->email) {{ $request->email }} • @endif
                            @if($request->phone) {{ $request->phone }} @endif
                        </div>
                    @endif
                </div>
                <form action="{{ route('admin.prayer-requests.update', $request) }}" method="POST" class="flex gap-2">
                    @csrf
                    @method('PUT')
                    <select name="status" onchange="this.form.submit()" class="px-3 py-1 border border-gray-300 rounded-lg text-sm">
                        <option value="pending" {{ $request->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="prayed_for" {{ $request->status === 'prayed_for' ? 'selected' : '' }}>Prayed For</option>
                        <option value="answered" {{ $request->status === 'answered' ? 'selected' : '' }}>Answered</option>
                    </select>
                </form>
            </div>
            <p class="text-xs text-gray-400">{{ $request->created_at->format('M d, Y • g:i A') }}</p>
        </div>
    @empty
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No Prayer Requests</h3>
            <p class="text-gray-600">No prayer requests found</p>
        </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $prayerRequests->links() }}
</div>
@endsection
