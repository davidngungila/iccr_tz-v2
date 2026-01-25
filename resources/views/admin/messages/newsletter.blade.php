@extends('admin.layout')

@section('title', 'Newsletter Subscribers')
@section('subtitle', 'Manage newsletter subscription list')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Newsletter Subscribers</h1>
    <p class="text-gray-600 mt-2">View and manage newsletter subscription list</p>
</div>

<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
        <p class="text-sm text-gray-600">Total Subscribers: <span class="font-semibold text-gray-900">{{ $subscribers->total() }}</span></p>
        <button onclick="exportSubscribers()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm font-semibold">
            Export CSV
        </button>
    </div>
    
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subscribed At</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($subscribers as $subscriber)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $subscriber->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $subscriber->subscribed_at ? $subscriber->subscribed_at->format('M d, Y') : $subscriber->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                            Active
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-600">No subscribers yet</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $subscribers->links() }}
    </div>
</div>

@push('scripts')
<script>
    function exportSubscribers() {
        window.location.href = '{{ route("admin.messages.newsletter") }}?export=csv';
    }
</script>
@endpush
@endsection



