@extends('admin.layout')

@section('title', 'Team & Leadership')
@section('subtitle', 'Manage team members and leadership profiles')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Team & Leadership</h1>
        <p class="text-gray-600 mt-2">Manage leadership profiles and team members</p>
    </div>
    <button onclick="showAddTeamForm()" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition font-semibold">
        + Add Member
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($members as $member)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
            @if($member->photo)
                <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center">
                    <span class="text-6xl text-gray-400">{{ strtoupper(substr($member->name, 0, 1)) }}</span>
                </div>
            @endif
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $member->name }}</h3>
                <p class="text-green-600 font-semibold mb-2">{{ $member->title }}</p>
                @if($member->role)
                    <p class="text-sm text-gray-600 mb-3">{{ $member->role }}</p>
                @endif
                @if($member->bio)
                    <p class="text-sm text-gray-700 line-clamp-3 mb-4">{{ $member->bio }}</p>
                @endif
                <div class="flex items-center gap-2">
                    <button onclick="editMember({{ $member->id }})" class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm font-semibold">
                        Edit
                    </button>
                    <form action="{{ route('admin.team.delete', $member) }}" method="POST" class="inline" onsubmit="return confirm('Delete this member?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition text-sm font-semibold">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 text-gray-600">
            No team members yet. Add your first member!
        </div>
    @endforelse
</div>

@push('scripts')
<script>
    function showAddTeamForm() {
        alert('Add team member form - to be implemented');
    }
    
    function editMember(id) {
        alert('Edit member form - to be implemented');
    }
</script>
@endpush
@endsection


