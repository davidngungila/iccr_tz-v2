<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Receipt - {{ $event->title }}</title>
    <style>
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none !important; }
            @page {
                margin: 0;
                size: 80mm auto; /* Standard receipt printer */
            }
        }
        @page {
            margin: 0;
            size: 80mm auto; /* Default to 80mm, can be changed to 58mm */
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
            max-width: 80mm; /* Standard receipt width */
            margin: 0 auto;
        }
        /* For 58mm printers, uncomment this */
        /* @media print {
            body { max-width: 58mm; font-size: 9px; }
            .receipt-container { max-width: 58mm; }
        } */
        .receipt-container {
            width: 100%;
            max-width: 80mm;
            background: white;
        }
        .receipt-header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px dashed #000;
            margin-bottom: 10px;
        }
        .receipt-header h1 {
            font-size: 14px;
            font-weight: bold;
            margin: 0 0 3px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .receipt-header p {
            font-size: 9px;
            margin: 2px 0;
            color: #333;
        }
        .receipt-title {
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            margin: 8px 0;
            text-transform: uppercase;
            padding: 5px 0;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
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
            border-bottom: 1px dotted #666;
            padding-bottom: 2px;
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
        }
        .line-value {
            flex: 1;
            text-align: right;
            word-break: break-word;
        }
        .receipt-block {
            margin: 6px 0;
            padding: 5px;
            background: #f9f9f9;
            border: 1px solid #ddd;
        }
        .block-label {
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 3px;
            color: #666;
        }
        .block-value {
            font-size: 10px;
            word-break: break-word;
        }
        .registration-id {
            text-align: center;
            padding: 8px;
            background: #000;
            color: #fff;
            font-family: 'Courier New', monospace;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            margin: 10px 0;
            border: 2px solid #000;
        }
        .status-badge {
            display: inline-block;
            padding: 2px 6px;
            border: 1px solid #000;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-confirmed {
            background: #000;
            color: #fff;
        }
        .status-pending {
            background: #fff;
            color: #000;
        }
        .status-cancelled {
            background: #666;
            color: #fff;
        }
        .receipt-divider {
            text-align: center;
            margin: 8px 0;
            padding: 5px 0;
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
        }
        .receipt-footer {
            text-align: center;
            margin-top: 15px;
            padding-top: 10px;
            border-top: 2px dashed #000;
            font-size: 8px;
            color: #666;
        }
        .receipt-footer p {
            margin: 3px 0;
            line-height: 1.4;
        }
        .barcode {
            text-align: center;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
            padding: 5px;
            margin: 8px 0;
            border: 1px solid #000;
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
        /* Compact layout for long content */
        .compact-line {
            font-size: 9px;
            padding: 2px 0;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Header -->
        <div class="receipt-header">
            <h1>ICCR Tanzania</h1>
            <p>Inter-Colleges Catholic Charismatic Renewal</p>
            <p>Registration Receipt</p>
        </div>
        
        <!-- Registration ID -->
        <div class="registration-id">
            ID: {{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
        </div>
        
        <!-- Event Information -->
        <div class="receipt-section">
            <div class="section-label">Event Details</div>
            <div class="receipt-line">
                <span class="line-label">Event:</span>
                <span class="line-value">{{ $event->title }}</span>
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
                <span class="line-value">{{ $event->location }}</span>
            </div>
            @endif
        </div>
        
        <div class="receipt-divider">━━━━━━━━━━━━━━━━━━</div>
        
        <!-- Registrant Information -->
        <div class="receipt-section">
            <div class="section-label">Registrant Info</div>
            <div class="receipt-line">
                <span class="line-label">Name:</span>
                <span class="line-value">{{ $registration->full_name }}</span>
            </div>
            <div class="receipt-line">
                <span class="line-label">Email:</span>
                <span class="line-value">{{ $registration->email }}</span>
            </div>
            <div class="receipt-line">
                <span class="line-label">Phone:</span>
                <span class="line-value">{{ $registration->phone }}</span>
            </div>
            <div class="receipt-line">
                <span class="line-label">Status:</span>
                <span class="line-value">
                    <span class="status-badge status-{{ $registration->status }}">{{ ucfirst($registration->status) }}</span>
                </span>
            </div>
            <div class="receipt-line">
                <span class="line-label">Reg. Date:</span>
                <span class="line-value">{{ $registration->created_at->format('M j, Y g:i A') }}</span>
            </div>
            <div class="receipt-line">
                <span class="line-label">SMS Sent:</span>
                <span class="line-value">{{ $registration->sms_sent ? 'YES' : 'NO' }}</span>
            </div>
        </div>
        
        <!-- Academic Information -->
        @if($registration->institution || $registration->campus || $registration->course || $registration->year_of_study)
        <div class="receipt-section">
            <div class="section-label">Academic Info</div>
            @if($registration->institution)
            <div class="receipt-line">
                <span class="line-label">Institution:</span>
                <span class="line-value">{{ $registration->institution }}</span>
            </div>
            @endif
            @if($registration->campus)
            <div class="receipt-line">
                <span class="line-label">Campus:</span>
                <span class="line-value">{{ $registration->campus }}</span>
            </div>
            @endif
            @if($registration->course)
            <div class="receipt-line">
                <span class="line-label">Course:</span>
                <span class="line-value">{{ $registration->course }}</span>
            </div>
            @endif
            @if($registration->year_of_study)
            <div class="receipt-line">
                <span class="line-label">Year:</span>
                <span class="line-value">{{ $registration->year_of_study }}</span>
            </div>
            @endif
        </div>
        @endif
        
        <!-- Special Requirements -->
        @if($registration->accommodation_needed === 'yes' || $registration->transportation_needed === 'yes' || $registration->dietary_restrictions || $registration->special_requirements)
        <div class="receipt-section">
            <div class="section-label">Special Requirements</div>
            @if($registration->accommodation_needed === 'yes')
            <div class="receipt-line">
                <span class="line-label">Accommodation:</span>
                <span class="line-value">REQUIRED</span>
            </div>
            @endif
            @if($registration->transportation_needed === 'yes')
            <div class="receipt-line">
                <span class="line-label">Transportation:</span>
                <span class="line-value">REQUIRED</span>
            </div>
            @endif
            @if($registration->dietary_restrictions)
            <div class="receipt-block">
                <div class="block-label">Dietary Restrictions:</div>
                <div class="block-value">{{ $registration->dietary_restrictions }}</div>
            </div>
            @endif
            @if($registration->special_requirements)
            <div class="receipt-block">
                <div class="block-label">Special Req:</div>
                <div class="block-value">{{ $registration->special_requirements }}</div>
            </div>
            @endif
        </div>
        @endif
        
        <!-- Emergency Contact -->
        @if($registration->emergency_contact_name || $registration->emergency_contact_phone)
        <div class="receipt-section">
            <div class="section-label">Emergency Contact</div>
            @if($registration->emergency_contact_name)
            <div class="receipt-line">
                <span class="line-label">Name:</span>
                <span class="line-value">{{ $registration->emergency_contact_name }}</span>
            </div>
            @endif
            @if($registration->emergency_contact_phone)
            <div class="receipt-line">
                <span class="line-label">Phone:</span>
                <span class="line-value">{{ $registration->emergency_contact_phone }}</span>
            </div>
            @endif
        </div>
        @endif
        
        <!-- Admin Notes -->
        @if($registration->admin_notes)
        <div class="receipt-section">
            <div class="section-label">Admin Notes</div>
            <div class="receipt-block">
                <div class="block-value">{{ $registration->admin_notes }}</div>
            </div>
        </div>
        @endif
        
        <!-- Barcode -->
        <div class="barcode">
            {{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
        </div>
        
        <!-- Footer -->
        <div class="receipt-footer">
            <p>━━━━━━━━━━━━━━━━━━</p>
            <p><strong>KEEP THIS RECEIPT</strong></p>
            <p>Bring to event for verification</p>
            <p>For inquiries: info@iccrtz.org</p>
            <p>Generated: {{ now()->format('M j, Y g:i A') }}</p>
            <p>© {{ date('Y') }} ICCR Tanzania</p>
            <p>━━━━━━━━━━━━━━━━━━</p>
        </div>
    </div>
    
    <button onclick="window.print()" class="print-button no-print">🖨️ Print Receipt</button>
    
    <script>
        // Auto-print option (can be enabled)
        // window.onload = function() { 
        //     setTimeout(function() { window.print(); }, 500);
        // }
    </script>
</body>
</html>
