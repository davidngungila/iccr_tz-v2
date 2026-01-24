<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Ticket - {{ $event->title }}</title>
    <style>
        @media print {
            body { margin: 0; }
            .no-print { display: none; }
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .ticket-container {
            max-width: 600px;
            width: 100%;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .ticket-header {
            background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }
        .ticket-header::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            background: #f3f4f6;
            border-radius: 50%;
        }
        .ticket-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .ticket-header p {
            margin: 10px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .ticket-body {
            padding: 40px 30px;
        }
        .event-title {
            font-size: 24px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 20px;
            text-align: center;
        }
        .ticket-info {
            background: #f9fafb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #6b7280;
            font-size: 14px;
        }
        .info-value {
            color: #111827;
            font-size: 14px;
            text-align: right;
            font-weight: 500;
        }
        .registrant-info {
            background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            border: 2px solid #16a34a;
        }
        .registrant-name {
            font-size: 22px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 15px;
            text-align: center;
        }
        .registrant-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .detail-item {
            text-align: center;
        }
        .detail-label {
            font-size: 11px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
        }
        .ticket-number {
            background: #111827;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .ticket-number-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.7;
            margin-bottom: 5px;
        }
        .ticket-number-value {
            font-size: 18px;
            font-weight: bold;
            font-family: 'Courier New', monospace;
            letter-spacing: 3px;
        }
        .qr-placeholder {
            width: 150px;
            height: 150px;
            background: #f3f4f6;
            border: 3px dashed #d1d5db;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px auto;
            color: #9ca3af;
            font-size: 12px;
            text-align: center;
            padding: 10px;
        }
        .ticket-footer {
            background: #f9fafb;
            padding: 20px;
            text-align: center;
            border-top: 2px dashed #e5e7eb;
        }
        .ticket-footer p {
            margin: 5px 0;
            font-size: 12px;
            color: #6b7280;
        }
        .print-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: none;
            font-size: 16px;
        }
        .print-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 20px -3px rgba(0, 0, 0, 0.2);
        }
        .barcode {
            font-family: 'Courier New', monospace;
            font-size: 24px;
            letter-spacing: 2px;
            text-align: center;
            padding: 10px;
            background: white;
            border: 2px solid #111827;
            border-radius: 8px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <!-- Header -->
        <div class="ticket-header">
            <h1>ICCR Tanzania</h1>
            <p>Event Admission Ticket</p>
        </div>
        
        <!-- Body -->
        <div class="ticket-body">
            <div class="event-title">{{ $event->title }}</div>
            
            <!-- Event Info -->
            <div class="ticket-info">
                <div class="info-row">
                    <span class="info-label">📅 Date</span>
                    <span class="info-value">{{ $event->start_date->format('F j, Y') }}@if($event->end_date && $event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d')) - {{ $event->end_date->format('F j, Y') }}@endif</span>
                </div>
                @if($event->start_date->format('H:i') !== '00:00')
                <div class="info-row">
                    <span class="info-label">🕐 Time</span>
                    <span class="info-value">{{ $event->start_date->format('g:i A') }}@if($event->end_date) - {{ $event->end_date->format('g:i A') }}@endif</span>
                </div>
                @endif
                @if($event->location)
                <div class="info-row">
                    <span class="info-label">📍 Location</span>
                    <span class="info-value">{{ $event->location }}</span>
                </div>
                @endif
            </div>
            
            <!-- Registrant Info -->
            <div class="registrant-info">
                <div class="registrant-name">{{ $registration->full_name }}</div>
                <div class="registrant-details">
                    <div class="detail-item">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">{{ $registration->email }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value">{{ $registration->phone }}</div>
                    </div>
                    @if($registration->institution)
                    <div class="detail-item">
                        <div class="detail-label">Institution</div>
                        <div class="detail-value">{{ $registration->institution }}</div>
                    </div>
                    @endif
                    @if($registration->course)
                    <div class="detail-item">
                        <div class="detail-label">Course</div>
                        <div class="detail-value">{{ $registration->course }}</div>
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Ticket Number -->
            <div class="ticket-number">
                <div class="ticket-number-label">Ticket Number</div>
                <div class="ticket-number-value">{{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}</div>
            </div>
            
            <!-- Barcode/QR Code Placeholder -->
            <div class="barcode">
                {{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
            </div>
        </div>
        
        <!-- Footer -->
        <div class="ticket-footer">
            <p><strong>Important:</strong> Please bring this ticket (or show on your phone) to the event</p>
            <p>For inquiries, contact: info@iccrtz.org</p>
            <p style="margin-top: 10px; font-size: 10px; opacity: 0.7;">Generated on {{ now()->format('F j, Y \a\t g:i A') }}</p>
        </div>
    </div>
    
    <button onclick="window.print()" class="print-button no-print">🖨️ Print Ticket</button>
    
    <script>
        // Auto-print option (can be enabled)
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>

