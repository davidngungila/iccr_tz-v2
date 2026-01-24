<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Confirmation - {{ $event->title }}</title>
    <style>
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none !important; }
        }
        @page {
            margin: 15mm;
            size: A4 portrait;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background: #ffffff;
            color: #111827;
            line-height: 1.4;
            font-size: 11px;
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 3px solid #16a34a;
        }
        .header h1 {
            color: #16a34a;
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }
        .header p {
            color: #6b7280;
            margin: 3px 0 0 0;
            font-size: 10px;
        }
        .document-title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #111827;
            margin: 10px 0;
            padding: 10px;
            background: linear-gradient(135deg, #f0fdf4 0%, #eff6ff 100%);
            border-radius: 8px;
        }
        .section {
            margin-bottom: 12px;
            padding: 12px;
            background: #f9fafb;
            border-radius: 8px;
            border-left: 3px solid #16a34a;
            page-break-inside: avoid;
        }
        .section-title {
            font-size: 13px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 8px;
        }
        .info-item {
            padding: 8px;
            background: white;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }
        .info-label {
            font-size: 9px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 3px;
            font-weight: 600;
        }
        .info-value {
            font-size: 11px;
            color: #111827;
            font-weight: 500;
        }
        .full-width {
            grid-column: 1 / -1;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
            margin-top: 5px;
        }
        .status-confirmed {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-cancelled {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .footer {
            margin-top: 15px;
            padding-top: 10px;
            border-top: 2px solid #e5e7eb;
            text-align: center;
            color: #6b7280;
            font-size: 9px;
        }
        .registration-id {
            background: #111827;
            color: white;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin: 10px 0;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            letter-spacing: 2px;
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
    <div class="header">
        <h1>ICCR Tanzania</h1>
        <p>Inter-Colleges Catholic Charismatic Renewal</p>
        <p>Registration Confirmation Document</p>
    </div>
    
    <div class="document-title">
        Event Registration Confirmation
    </div>
    
    <!-- Registration ID -->
    <div class="registration-id">
        Registration ID: {{ strtoupper(substr($event->slug, 0, 3)) }}-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}
    </div>
    
    <!-- Event Information -->
    <div class="section">
        <div class="section-title">
            📅 Event Information
        </div>
        <div class="info-grid">
            <div class="info-item full-width">
                <div class="info-label">Event Title</div>
                <div class="info-value">{{ $event->title }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Event Date</div>
                <div class="info-value">{{ $event->start_date->format('F j, Y') }}@if($event->end_date && $event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d')) to {{ $event->end_date->format('F j, Y') }}@endif</div>
            </div>
            @if($event->start_date->format('H:i') !== '00:00')
            <div class="info-item">
                <div class="info-label">Event Time</div>
                <div class="info-value">{{ $event->start_date->format('g:i A') }}@if($event->end_date) - {{ $event->end_date->format('g:i A') }}@endif</div>
            </div>
            @endif
            @if($event->location)
            <div class="info-item full-width">
                <div class="info-label">Location</div>
                <div class="info-value">{{ $event->location }}</div>
            </div>
            @endif
        </div>
    </div>
    
    <!-- Registrant Information -->
    <div class="section">
        <div class="section-title">
            👤 Registrant Information
        </div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Full Name</div>
                <div class="info-value">{{ $registration->full_name }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email Address</div>
                <div class="info-value">{{ $registration->email }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Phone Number</div>
                <div class="info-value">{{ $registration->phone }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Registration Status</div>
                <div class="info-value">
                    <span class="status-badge status-{{ $registration->status }}">{{ ucfirst($registration->status) }}</span>
                </div>
            </div>
            <div class="info-item">
                <div class="info-label">Registration Date</div>
                <div class="info-value">{{ $registration->created_at->format('F j, Y \a\t g:i A') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">SMS Confirmation</div>
                <div class="info-value">{{ $registration->sms_sent ? '✓ Sent' : 'Not Sent' }}</div>
            </div>
        </div>
    </div>
    
    <!-- Academic Information -->
    @if($registration->institution || $registration->campus || $registration->course || $registration->year_of_study)
    <div class="section">
        <div class="section-title">
            🎓 Academic Information
        </div>
        <div class="info-grid">
            @if($registration->institution)
            <div class="info-item">
                <div class="info-label">Institution</div>
                <div class="info-value">{{ $registration->institution }}</div>
            </div>
            @endif
            @if($registration->campus)
            <div class="info-item">
                <div class="info-label">Campus</div>
                <div class="info-value">{{ $registration->campus }}</div>
            </div>
            @endif
            @if($registration->course)
            <div class="info-item">
                <div class="info-label">Course</div>
                <div class="info-value">{{ $registration->course }}</div>
            </div>
            @endif
            @if($registration->year_of_study)
            <div class="info-item">
                <div class="info-label">Year of Study</div>
                <div class="info-value">{{ $registration->year_of_study }}</div>
            </div>
            @endif
        </div>
    </div>
    @endif
    
    <!-- Special Requirements -->
    @if($registration->accommodation_needed === 'yes' || $registration->transportation_needed === 'yes' || $registration->dietary_restrictions || $registration->special_requirements)
    <div class="section">
        <div class="section-title">
            ⚙️ Special Requirements
        </div>
        <div class="info-grid">
            @if($registration->accommodation_needed === 'yes')
            <div class="info-item">
                <div class="info-label">Accommodation</div>
                <div class="info-value">✓ Required</div>
            </div>
            @endif
            @if($registration->transportation_needed === 'yes')
            <div class="info-item">
                <div class="info-label">Transportation</div>
                <div class="info-value">✓ Required</div>
            </div>
            @endif
            @if($registration->dietary_restrictions)
            <div class="info-item full-width">
                <div class="info-label">Dietary Restrictions</div>
                <div class="info-value">{{ $registration->dietary_restrictions }}</div>
            </div>
            @endif
            @if($registration->special_requirements)
            <div class="info-item full-width">
                <div class="info-label">Special Requirements</div>
                <div class="info-value">{{ $registration->special_requirements }}</div>
            </div>
            @endif
        </div>
    </div>
    @endif
    
    <!-- Emergency Contact -->
    @if($registration->emergency_contact_name || $registration->emergency_contact_phone)
    <div class="section">
        <div class="section-title">
            🆘 Emergency Contact
        </div>
        <div class="info-grid">
            @if($registration->emergency_contact_name)
            <div class="info-item">
                <div class="info-label">Contact Name</div>
                <div class="info-value">{{ $registration->emergency_contact_name }}</div>
            </div>
            @endif
            @if($registration->emergency_contact_phone)
            <div class="info-item">
                <div class="info-label">Contact Phone</div>
                <div class="info-value">{{ $registration->emergency_contact_phone }}</div>
            </div>
            @endif
        </div>
    </div>
    @endif
    
    <!-- Admin Notes -->
    @if($registration->admin_notes)
    <div class="section">
        <div class="section-title">
            📝 Admin Notes
        </div>
        <div class="info-item full-width">
            <div class="info-value" style="padding: 8px; background: white; border-radius: 6px;">{{ $registration->admin_notes }}</div>
        </div>
    </div>
    @endif
    
    <!-- Footer -->
    <div class="footer">
        <p><strong>Important Notes:</strong></p>
        <p>• Please keep this document for your records</p>
        <p>• Bring a copy (digital or printed) to the event for verification</p>
        <p>• For any changes or inquiries, contact us at info@iccrtz.org</p>
        <p style="margin-top: 10px;">This document was generated on {{ now()->format('F j, Y \a\t g:i A') }}</p>
        <p style="margin-top: 5px;">© {{ date('Y') }} ICCR Tanzania. All rights reserved.</p>
    </div>
    
    <button onclick="window.print()" class="print-button no-print">🖨️ Print Document</button>
    
    <script>
        // Auto-print option (can be enabled)
        // window.onload = function() { 
        //     setTimeout(function() { window.print(); }, 500);
        // }
    </script>
</body>
</html>
