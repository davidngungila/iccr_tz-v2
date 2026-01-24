<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Ticket - {{ $event->title }}</title>
    <style>
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none !important; }
            .ticket-container { box-shadow: none; border: none; max-width: 100%; }
            @page {
                margin: 0;
                size: 80mm auto; /* Receipt printer width (80mm = ~3.15 inches) */
            }
        }
        @page {
            margin: 0;
            size: 80mm auto;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 10px;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .ticket-container {
            max-width: 300px; /* Receipt printer width */
            width: 100%;
            background: white;
            border: 2px solid #16a34a;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .ticket-header {
            background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
            color: white;
            padding: 15px;
            text-align: center;
            position: relative;
        }
        .logo-container {
            margin-bottom: 10px;
        }
        .logo-container img {
            max-width: 120px;
            height: auto;
            background: white;
            padding: 8px;
            border-radius: 8px;
        }
        .ticket-header h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .ticket-header p {
            margin: 5px 0 0 0;
            font-size: 10px;
            opacity: 0.9;
        }
        .ticket-body {
            padding: 15px;
        }
        .event-title {
            font-size: 16px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 12px;
            text-align: center;
            line-height: 1.3;
        }
        .ticket-info {
            background: #f9fafb;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #e5e7eb;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px dotted #d1d5db;
            font-size: 10px;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #6b7280;
            flex-shrink: 0;
            width: 60px;
        }
        .info-value {
            color: #111827;
            text-align: right;
            font-weight: 500;
            flex: 1;
        }
        .registrant-info {
            background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 12px;
            border: 2px solid #16a34a;
        }
        .registrant-name {
            font-size: 14px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 10px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .registrant-details {
            display: grid;
            grid-template-columns: 1fr;
            gap: 8px;
        }
        .detail-item {
            text-align: center;
            padding: 6px;
            background: white;
            border-radius: 4px;
        }
        .detail-label {
            font-size: 9px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
            font-weight: 600;
        }
        .detail-value {
            font-size: 11px;
            font-weight: 600;
            color: #111827;
            word-break: break-word;
        }
        .ticket-number {
            background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 6px;
            margin-bottom: 12px;
        }
        .ticket-number-label {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.9;
            margin-bottom: 4px;
        }
        .ticket-number-value {
            font-size: 16px;
            font-weight: bold;
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
        }
        .barcode {
            font-family: 'Courier New', monospace;
            font-size: 18px;
            letter-spacing: 1px;
            text-align: center;
            padding: 8px;
            background: white;
            border: 2px solid #16a34a;
            border-radius: 6px;
            margin: 12px 0;
            color: #16a34a;
            font-weight: bold;
        }
        .ticket-footer {
            background: #f9fafb;
            padding: 10px;
            text-align: center;
            border-top: 2px dashed #e5e7eb;
            font-size: 9px;
            color: #6b7280;
        }
        .ticket-footer p {
            margin: 3px 0;
            line-height: 1.4;
        }
        .print-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: none;
            font-size: 14px;
        }
        .print-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 20px -3px rgba(0, 0, 0, 0.2);
        }
        /* Receipt printer specific styles */
        @media print {
            .ticket-container {
                max-width: 80mm;
                width: 80mm;
                margin: 0 auto;
            }
            body {
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <!-- Header -->
        <div class="ticket-header">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="ICCR Tanzania Logo">
            </div>
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
                    <span class="info-value">{{ $event->start_date->format('M j, Y') }}@if($event->end_date && $event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d')) - {{ $event->end_date->format('M j, Y') }}@endif</span>
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
            
            <!-- Barcode -->
            <div class="barcode">
                {{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
            </div>
        </div>
        
        <!-- Footer -->
        <div class="ticket-footer">
            <p><strong>Important:</strong> Please bring this ticket to the event</p>
            <p>For inquiries: info@iccrtz.org</p>
            <p style="margin-top: 5px; font-size: 8px; opacity: 0.7;">Generated: {{ now()->format('M j, Y g:i A') }}</p>
        </div>
    </div>
    
    <button onclick="window.print()" class="print-button no-print">🖨️ Print Ticket</button>
    
    <script>
        // Auto-print option (can be enabled)
        // window.onload = function() { 
        //     setTimeout(function() { window.print(); }, 500);
        // }
    </script>
</body>
</html>
