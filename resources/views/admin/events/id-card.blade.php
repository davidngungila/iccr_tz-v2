<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ID Card - {{ $registration->full_name }}</title>
    <style>
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none !important; }
            @page {
                margin: 0;
                size: 85.6mm 53.98mm; /* Standard ID card size (CR80) */
            }
        }
        @page {
            margin: 0;
            size: 85.6mm 53.98mm;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .id-card-container {
            width: 85.6mm;
            height: 53.98mm;
            background: white;
            border: 3px solid #16a34a;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            position: relative;
            background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
        }
        .id-card-content {
            width: 100%;
            height: 100%;
            padding: 6px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-header {
            text-align: center;
            border-bottom: 2px solid #16a34a;
            padding-bottom: 4px;
            margin-bottom: 4px;
        }
        .organization-name {
            font-size: 10px;
            font-weight: bold;
            color: #16a34a;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }
        .card-subtitle {
            font-size: 7px;
            color: #2563eb;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .card-body {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 3px 0;
        }
        .left-section {
            flex: 1;
            padding-right: 4px;
        }
        .right-section {
            width: 35px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-left: 2px solid #e5e7eb;
            padding-left: 4px;
        }
        .participant-name {
            font-size: 11px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            line-height: 1.2;
        }
        .participant-details {
            font-size: 7px;
            color: #374151;
            line-height: 1.4;
        }
        .detail-row {
            display: flex;
            margin-bottom: 2px;
        }
        .detail-label {
            font-weight: 600;
            width: 40px;
            color: #2563eb;
            flex-shrink: 0;
        }
        .detail-value {
            flex: 1;
            color: #111827;
            word-break: break-word;
        }
        .event-info {
            background: #16a34a;
            color: white;
            padding: 3px 5px;
            border-radius: 4px;
            margin-bottom: 3px;
            font-size: 7px;
            font-weight: bold;
            text-align: center;
            line-height: 1.2;
        }
        .registration-id {
            font-size: 8px;
            font-weight: bold;
            color: #16a34a;
            font-family: 'Courier New', monospace;
            text-align: center;
            background: white;
            padding: 2px 4px;
            border-radius: 3px;
            border: 1px solid #16a34a;
            margin-bottom: 3px;
        }
        .qr-code {
            width: 32px;
            height: 32px;
            border: 2px solid #16a34a;
            border-radius: 4px;
            padding: 2px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .qr-code img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .status-badge {
            display: inline-block;
            padding: 1px 4px;
            border-radius: 3px;
            font-size: 6px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-confirmed {
            background: #16a34a;
            color: white;
        }
        .status-pending {
            background: #fbbf24;
            color: #000;
        }
        .status-cancelled {
            background: #ef4444;
            color: white;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 3px;
            border-top: 1px solid #e5e7eb;
            font-size: 6px;
            color: #6b7280;
        }
        .footer-left {
            flex: 1;
        }
        .footer-right {
            text-align: right;
            font-weight: 600;
            color: #16a34a;
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
    </style>
</head>
<body>
    <div class="id-card-container">
        <div class="id-card-content">
            <!-- Header -->
            <div class="card-header">
                <div class="organization-name">ICCR Tanzania</div>
                <div class="card-subtitle">Inter-Colleges Catholic Charismatic Renewal</div>
            </div>
            
            <!-- Body -->
            <div class="card-body">
                <!-- Left Section (Participant Info) -->
                <div class="left-section">
                    <div class="event-info">
                        {{ Str::limit($event->title, 35) }}
                    </div>
                    
                    <div class="participant-name">
                        {{ Str::limit($registration->full_name, 30) }}
                    </div>
                    
                    <div class="participant-details">
                        @if($registration->institution)
                        <div class="detail-row">
                            <span class="detail-label">Institution:</span>
                            <span class="detail-value">{{ Str::limit($registration->institution, 22) }}</span>
                        </div>
                        @endif
                        @if($registration->campus)
                        <div class="detail-row">
                            <span class="detail-label">Campus:</span>
                            <span class="detail-value">{{ Str::limit($registration->campus, 22) }}</span>
                        </div>
                        @endif
                        @if($registration->course)
                        <div class="detail-row">
                            <span class="detail-label">Course:</span>
                            <span class="detail-value">{{ Str::limit($registration->course, 22) }}</span>
                        </div>
                        @endif
                        @if($registration->year_of_study)
                        <div class="detail-row">
                            <span class="detail-label">Year:</span>
                            <span class="detail-value">{{ $registration->year_of_study }}</span>
                        </div>
                        @endif
                        <div class="detail-row">
                            <span class="detail-label">Date:</span>
                            <span class="detail-value">{{ $event->start_date->format('M j, Y') }}</span>
                        </div>
                        @if($event->location)
                        <div class="detail-row">
                            <span class="detail-label">Location:</span>
                            <span class="detail-value">{{ Str::limit($event->location, 20) }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Right Section (ID & QR Code) -->
                <div class="right-section">
                    <div class="registration-id">
                        {{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
                    </div>
                    
                    <div class="qr-code">
                        <img src="{{ $qrCodeBase64 }}" alt="QR Code">
                    </div>
                    
                    <div style="margin-top: 3px; text-align: center;">
                        <span class="status-badge status-{{ $registration->status }}">{{ ucfirst($registration->status) }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="card-footer">
                <div class="footer-left">
                    Participant ID Card | Valid for this event only
                </div>
                <div class="footer-right">
                    {{ date('Y') }} ICCR
                </div>
            </div>
        </div>
    </div>
    
    <button onclick="window.print()" class="print-button no-print">Print ID Card</button>
    
    <script>
        // Auto-print option (can be enabled)
        // window.onload = function() { 
        //     setTimeout(function() { window.print(); }, 500);
        // }
    </script>
</body>
</html>
