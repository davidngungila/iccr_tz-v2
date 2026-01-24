<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Registrations - {{ $event->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #16a34a;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #16a34a;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            color: #666;
            margin: 5px 0;
        }
        .event-info {
            background: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .event-info h2 {
            margin: 0 0 10px 0;
            color: #111827;
            font-size: 18px;
        }
        .event-info p {
            margin: 5px 0;
            color: #374151;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #16a34a;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #e5e7eb;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .status {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
        }
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-confirmed {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-cancelled {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #6b7280;
            font-size: 10px;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>ICCR Tanzania</h1>
        <p>Event Registrations Report</p>
        <p>Generated on {{ now()->format('F j, Y \a\t g:i A') }}</p>
    </div>
    
    <div class="event-info">
        <h2>{{ $event->title }}</h2>
        <p><strong>Date:</strong> {{ $event->start_date->format('F j, Y') }}@if($event->end_date && $event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d')) to {{ $event->end_date->format('F j, Y') }}@endif</p>
        @if($event->location)
            <p><strong>Location:</strong> {{ $event->location }}</p>
        @endif
        <p><strong>Total Registrations:</strong> {{ $registrations->count() }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Institution</th>
                <th>Course</th>
                <th>Status</th>
                <th>Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $index => $registration)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $registration->full_name }}</td>
                    <td>{{ $registration->email }}</td>
                    <td>{{ $registration->phone }}</td>
                    <td>{{ $registration->institution ?? '-' }}</td>
                    <td>{{ $registration->course ?? '-' }}</td>
                    <td>
                        <span class="status status-{{ $registration->status }}">
                            {{ ucfirst($registration->status) }}
                        </span>
                    </td>
                    <td>{{ $registration->created_at->format('M d, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        <p>This report was generated from ICCR Tanzania Event Management System</p>
        <p>© {{ date('Y') }} ICCR Tanzania. All rights reserved.</p>
    </div>
</body>
</html>

