<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Ticket - {{ $event->title }}</title>
    <style>
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none !important; }
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
            font-family: 'Arial', 'Courier New', monospace;
            margin: 0;
            padding: 10px;
            background: #ffffff;
            color: #000000;
            line-height: 1.3;
            font-size: 11px;
            max-width: 80mm;
            margin: 0 auto;
        }
        .receipt-container {
            width: 100%;
            max-width: 80mm;
            background: white;
        }
        .receipt-header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px dashed #16a34a;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
        }
        .logo-container {
            margin-bottom: 5px;
        }
        .logo-container img {
            max-width: 50px;
            height: auto;
            background: white;
            padding: 3px;
            border-radius: 4px;
            display: block;
            margin: 0 auto;
        }
        .receipt-header h1 {
            font-size: 14px;
            font-weight: bold;
            margin: 0 0 3px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #16a34a;
        }
        .receipt-header p {
            font-size: 9px;
            margin: 2px 0;
            color: #2563eb;
        }
        .receipt-title {
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            margin: 8px 0;
            text-transform: uppercase;
            padding: 5px 0;
            border-top: 2px solid #16a34a;
            border-bottom: 2px solid #16a34a;
            background: linear-gradient(135deg, #16a34a 0%, #2563eb 100%);
            color: white;
        }
        .receipt-section {
            margin: 8px 0;
            padding: 5px 0;
        }
        .section-label {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 4px;
            border-bottom: 2px solid #16a34a;
            padding-bottom: 2px;
            color: #16a34a;
        }
        .receipt-line {
            display: flex;
            justify-content: space-between;
            padding: 3px 0;
            font-size: 10px;
            border-bottom: 1px dotted #ddd;
        }
        .receipt-line:last-child {
            border-bottom: none;
        }
        .line-label {
            font-weight: 600;
            flex-shrink: 0;
            width: 35%;
            text-align: left;
            color: #2563eb;
        }
        .line-value {
            flex: 1;
            text-align: right;
            word-break: break-word;
            color: #111827;
        }
        .ticket-number {
            text-align: center;
            padding: 8px;
            background: #16a34a;
            color: #fff;
            font-family: 'Courier New', monospace;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            margin: 10px 0;
            border: 2px solid #16a34a;
            border-radius: 6px;
        }
        .status-badge {
            display: inline-block;
            padding: 2px 6px;
            border: 1px solid #000;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 4px;
        }
        .status-confirmed {
            background: #16a34a;
            color: #fff;
            border-color: #16a34a;
        }
        .status-pending {
            background: #fbbf24;
            color: #000;
            border-color: #fbbf24;
        }
        .status-cancelled {
            background: #ef4444;
            color: #fff;
            border-color: #ef4444;
        }
        .receipt-divider {
            text-align: center;
            margin: 8px 0;
            padding: 5px 0;
            border-top: 2px dashed #16a34a;
            border-bottom: 2px dashed #16a34a;
            color: #16a34a;
            font-weight: bold;
        }
        .barcode {
            text-align: center;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
            padding: 8px;
            margin: 8px 0;
            border: 2px solid #16a34a;
            border-radius: 6px;
            background: white;
            color: #16a34a;
        }
        .qr-code-section {
            text-align: center;
            margin: 10px 0;
            padding: 8px;
            background: white;
            border: 2px solid #16a34a;
            border-radius: 6px;
        }
        .qr-code-label {
            font-size: 8px;
            font-weight: bold;
            color: #16a34a;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .qr-code {
            display: inline-block;
            width: 80px;
            height: 80px;
            border: 2px solid #16a34a;
            border-radius: 4px;
            padding: 3px;
            background: white;
        }
        .qr-code img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .receipt-footer {
            text-align: center;
            margin-top: 15px;
            padding-top: 10px;
            border-top: 2px dashed #16a34a;
            font-size: 8px;
            color: #6b7280;
            background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
        }
        .receipt-footer p {
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
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Header -->
        <div class="receipt-header">
            @if(isset($logoExists) && $logoExists)
            <div class="logo-container">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents($logoPath)) }}" alt="ICCR Tanzania">
            </div>
            @endif
            <h1>ICCR Tanzania</h1>
            <p>Inter-Colleges Catholic Charismatic Renewal</p>
            <p>Event Admission Ticket</p>
        </div>
        
        <!-- Ticket Number -->
        <div class="ticket-number">
            TICKET: {{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
        </div>
        
        <!-- Event Information -->
        <div class="receipt-section">
            <div class="section-label">EVENT DETAILS</div>
            <div class="receipt-line">
                <span class="line-label">Event:</span>
                <span class="line-value">{{ Str::limit($event->title, 25) }}</span>
            </div>
            <div class="receipt-line">
                <span class="line-label">Date:</span>
                <span class="line-value">{{ $event->start_date->format('M j, Y') }}@if($event->end_date && $event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d')) - {{ $event->end_date->format('M j, Y') }}@endif</span>
            </div>
            @if($event->start_date->format('H:i') !== '00:00')
            <div class="receipt-line">
                <span class="line-label">Time:</span>
                <span class="line-value">{{ $event->start_date->format('g:i A') }}@if($event->end_date) - {{ $event->end_date->format('g:i A') }}@endif</span>
            </div>
            @endif
            @if($event->location)
            <div class="receipt-line">
                <span class="line-label">Location:</span>
                <span class="line-value">{{ Str::limit($event->location, 20) }}</span>
            </div>
            @endif
        </div>
        
        <div class="receipt-divider">--------------------------------</div>
        
        <!-- Registrant Information -->
        <div class="receipt-section">
            <div class="section-label">PARTICIPANT INFO</div>
            <div class="receipt-line">
                <span class="line-label">Name:</span>
                <span class="line-value">{{ Str::limit($registration->full_name, 22) }}</span>
            </div>
            <div class="receipt-line">
                <span class="line-label">Email:</span>
                <span class="line-value">{{ Str::limit($registration->email, 20) }}</span>
            </div>
            <div class="receipt-line">
                <span class="line-label">Phone:</span>
                <span class="line-value">{{ $registration->phone }}</span>
            </div>
            @if($registration->institution)
            <div class="receipt-line">
                <span class="line-label">Institution:</span>
                <span class="line-value">{{ Str::limit($registration->institution, 18) }}</span>
            </div>
            @endif
            @if($registration->course)
            <div class="receipt-line">
                <span class="line-label">Course:</span>
                <span class="line-value">{{ Str::limit($registration->course, 18) }}</span>
            </div>
            @endif
            <div class="receipt-line">
                <span class="line-label">Status:</span>
                <span class="line-value">
                    <span class="status-badge status-{{ $registration->status }}">{{ ucfirst($registration->status) }}</span>
                </span>
            </div>
        </div>
        
        <!-- Barcode -->
        <div class="barcode">
            {{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
        </div>
        
        <!-- QR Code -->
        @if(isset($qrCodeBase64))
        <div class="qr-code-section">
            <div class="qr-code-label">Scan QR Code for Verification</div>
            <div class="qr-code">
                <img src="{{ $qrCodeBase64 }}" alt="QR Code">
            </div>
        </div>
        @endif
        
        <!-- Footer -->
        <div class="receipt-footer">
            <p>--------------------------------</p>
            <p><strong>KEEP THIS TICKET</strong></p>
            <p>Bring to event for admission</p>
            <p>For inquiries: info@iccrtz.org</p>
            <p>Generated: {{ now()->format('M j, Y g:i A') }}</p>
            <p>Copyright {{ date('Y') }} ICCR Tanzania</p>
            <p>--------------------------------</p>
        </div>
    </div>
    
    <button onclick="window.print()" class="print-button no-print">Print Ticket</button>
    
    <script>
        // Auto-print option (can be enabled)
        // window.onload = function() { 
        //     setTimeout(function() { window.print(); }, 500);
        // }
    </script>
</body>
</html>
