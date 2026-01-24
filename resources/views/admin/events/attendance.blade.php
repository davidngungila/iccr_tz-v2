@extends('admin.layout')

@section('title', 'Event Attendance')
@section('subtitle', 'Check-In & Attendance Management')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ $event->title }}</h1>
            <p class="text-gray-600 mt-2">Manage attendance and check-in</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.events.attendance.export', $event) }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg text-white font-semibold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Export CSV
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
        {{ session('error') }}
    </div>
@endif

<!-- Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
        <p class="text-sm text-gray-600 mb-1">Total Registered</p>
        <p class="text-3xl font-bold text-gray-900">{{ $attendanceStats['total_registered'] }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
        <p class="text-sm text-gray-600 mb-1">Checked In</p>
        <p class="text-3xl font-bold text-gray-900">{{ $attendanceStats['total_checked_in'] }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
        <p class="text-sm text-gray-600 mb-1">Present Today</p>
        <p class="text-3xl font-bold text-gray-900">{{ $attendanceStats['present_today'] }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-yellow-500">
        <p class="text-sm text-gray-600 mb-1">Late Today</p>
        <p class="text-3xl font-bold text-gray-900">{{ $attendanceStats['late_today'] }}</p>
    </div>
</div>

<!-- QR Scanner Section -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-8 border-2 border-purple-200">
    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
        </svg>
        QR Code Scanner
    </h3>
    <div class="flex items-center gap-4">
        <input type="text" id="qrInput" placeholder="Scan or enter QR code data" 
               class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
        <button onclick="scanQR()" class="px-6 py-3 bg-purple-600 hover:bg-purple-700 rounded-lg text-white font-semibold">
            Check In
        </button>
    </div>
    <div id="qrResult" class="mt-4 hidden"></div>
</div>

<!-- Registrations List -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-bold text-gray-900">All Registrations</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attendance</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($registrations as $registration)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $registration->full_name }}</div>
                            @if($registration->institution)
                                <div class="text-xs text-gray-500">{{ $registration->institution }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $registration->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $registration->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $registration->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($registration->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $todayAttendance = $registration->attendances->where('attendance_date', today()->toDateString())->first();
                            @endphp
                            @if($todayAttendance)
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $todayAttendance->status === 'present' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($todayAttendance->status) }}
                                </span>
                                <div class="text-xs text-gray-500 mt-1">{{ $todayAttendance->check_in_time?->format('H:i') ?? 'N/A' }}</div>
                            @else
                                <span class="text-xs text-gray-400">Not checked in</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if(!$todayAttendance && $registration->status === 'confirmed')
                                <form action="{{ route('admin.events.attendance.check-in', [$event, $registration]) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 bg-green-600 hover:bg-green-700 rounded text-white text-xs font-semibold">
                                        Check In
                                    </button>
                                </form>
                            @elseif($todayAttendance && !$todayAttendance->check_out_time)
                                <form action="{{ route('admin.events.attendance.check-out', $todayAttendance) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 rounded text-white text-xs font-semibold">
                                        Check Out
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">No registrations found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
async function scanQR() {
    const qrInput = document.getElementById('qrInput');
    const qrResult = document.getElementById('qrResult');
    const qrData = qrInput.value.trim();
    
    if (!qrData) {
        alert('Please enter or scan QR code data');
        return;
    }
    
    try {
        const response = await fetch('{{ route('admin.events.attendance.scan-qr', $event) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ qr_data: qrData })
        });
        
        const data = await response.json();
        
        if (data.success) {
            qrResult.className = 'mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg';
            qrResult.innerHTML = `<strong>Success!</strong> ${data.message}<br>Checked in: ${data.registration.full_name}`;
            qrInput.value = '';
            setTimeout(() => location.reload(), 2000);
        } else {
            qrResult.className = 'mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg';
            qrResult.innerHTML = `<strong>Error:</strong> ${data.error || data.message}`;
        }
        
        qrResult.classList.remove('hidden');
    } catch (error) {
        qrResult.className = 'mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg';
        qrResult.innerHTML = '<strong>Error:</strong> Failed to process QR code';
        qrResult.classList.remove('hidden');
    }
}
</script>
@endsection
