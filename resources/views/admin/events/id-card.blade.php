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
            border: 2px solid #16a34a;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            position: relative;
        }
        .id-card-front {
            width: 100%;
            height: 100%;
            display: flex;
            background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
        }
        .id-card-left {
            width: 40%;
            padding: 8px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
            color: white;
            position: relative;
        }
        .id-card-left::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 2px;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
        }
        .logo-section {
            text-align: center;
            margin-bottom: 5px;
        }
        .logo-section img {
            max-width: 50px;
            height: auto;
            background: white;
            padding: 3px;
            border-radius: 4px;
        }
        .organization-name {
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 3px;
        }
        .id-card-right {
            width: 60%;
            padding: 8px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-header {
            text-align: center;
            margin-bottom: 5px;
        }
        .card-title {
            font-size: 7px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }
        .event-name {
            font-size: 9px;
            font-weight: bold;
            color: #16a34a;
            line-height: 1.2;
        }
        .participant-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .participant-photo {
            width: 35px;
            height: 35px;
            border-radius: 4px;
            border: 2px solid #16a34a;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 5px;
            overflow: hidden;
        }
        .participant-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .photo-placeholder {
            font-size: 10px;
            color: #9ca3af;
            text-align: center;
        }
        .participant-name {
            font-size: 10px;
            font-weight: bold;
            color: #111827;
            text-align: center;
            margin-bottom: 3px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        .participant-details {
            font-size: 7px;
            color: #6b7280;
            line-height: 1.4;
        }
        .detail-row {
            display: flex;
            margin-bottom: 2px;
        }
        .detail-label {
            font-weight: 600;
            width: 35px;
            color: #2563eb;
        }
        .detail-value {
            flex: 1;
            color: #111827;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
            padding-top: 5px;
            border-top: 1px solid #e5e7eb;
        }
        .registration-id {
            font-size: 7px;
            font-weight: bold;
            color: #16a34a;
            font-family: 'Courier New', monospace;
        }
        .qr-code {
            width: 30px;
            height: 30px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            padding: 2px;
            background: white;
        }
        .qr-code img {
            width: 100%;
            height: 100%;
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
        <div class="id-card-front">
            <!-- Left Section (Logo & Organization) -->
            <div class="id-card-left">
                @if(isset($logoExists) && $logoExists)
                <div class="logo-section">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents($logoPath)) }}" alt="ICCR">
                </div>
                @endif
                <div class="organization-name">ICCR Tanzania</div>
                <div style="font-size: 6px; text-align: center; opacity: 0.9; margin-top: auto;">
                    <div>Event Participant</div>
                    <div style="margin-top: 3px;">ID Card</div>
                </div>
            </div>
            
            <!-- Right Section (Participant Info) -->
            <div class="id-card-right">
                <div class="card-header">
                    <div class="card-title">Event Registration</div>
                    <div class="event-name">{{ Str::limit($event->title, 30) }}</div>
                </div>
                
                <div class="participant-info">
                    <div class="participant-photo">
                        <div class="photo-placeholder">
                            <div style="font-size: 8px;">PHOTO</div>
                        </div>
                    </div>
                    
                    <div class="participant-name">{{ Str::limit($registration->full_name, 25) }}</div>
                    
                    <div class="participant-details">
                        @if($registration->institution)
                        <div class="detail-row">
                            <span class="detail-label">Inst:</span>
                            <span class="detail-value">{{ Str::limit($registration->institution, 20) }}</span>
                        </div>
                        @endif
                        @if($registration->course)
                        <div class="detail-row">
                            <span class="detail-label">Course:</span>
                            <span class="detail-value">{{ Str::limit($registration->course, 18) }}</span>
                        </div>
                        @endif
                        <div class="detail-row">
                            <span class="detail-label">Date:</span>
                            <span class="detail-value">{{ $event->start_date->format('M j, Y') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Status:</span>
                            <span class="detail-value">
                                <span class="status-badge status-{{ $registration->status }}">{{ ucfirst($registration->status) }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="registration-id">
                        ID: {{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
                    </div>
                    <div class="qr-code">
                        <img src="{{ $qrCodeBase64 }}" alt="QR Code">
                    </div>
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

