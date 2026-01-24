<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\EventPayment;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(Event $event)
    {
        $payments = EventPayment::where('event_id', $event->id)
            ->with('registration')
            ->orderBy('created_at', 'desc')
            ->paginate(50);
        
        $stats = [
            'total_payments' => EventPayment::where('event_id', $event->id)->count(),
            'completed' => EventPayment::where('event_id', $event->id)->where('status', 'completed')->count(),
            'pending' => EventPayment::where('event_id', $event->id)->where('status', 'pending')->count(),
            'total_amount' => EventPayment::where('event_id', $event->id)->where('status', 'completed')->sum('amount'),
            'pending_amount' => EventPayment::where('event_id', $event->id)->where('status', 'pending')->sum('amount'),
        ];
        
        return view('admin.events.payments', compact('event', 'payments', 'stats'));
    }

    public function store(Request $request, Event $event, EventRegistration $registration = null)
    {
        $validated = $request->validate([
            'payment_method' => 'required|in:mpesa,tigo,airtel,bank,paypal,cash',
            'amount' => 'required|numeric|min:0',
            'currency' => 'nullable|string|max:3',
            'transaction_id' => 'nullable|string|max:255|unique:event_payments,transaction_id',
            'phone_number' => 'nullable|string|max:20',
            'account_number' => 'nullable|string|max:255',
            'payment_proof' => 'nullable|string',
            'notes' => 'nullable|string',
            'status' => 'nullable|in:pending,completed,failed,refunded',
        ]);

        $validated['event_id'] = $event->id;
        $validated['registration_id'] = $registration?->id;
        $validated['status'] = $validated['status'] ?? 'pending';
        $validated['currency'] = $validated['currency'] ?? 'TZS';
        
        if ($validated['status'] === 'completed') {
            $validated['paid_at'] = now();
        }

        $payment = EventPayment::create($validated);

        // Auto-confirm registration if payment completed and event requires payment
        if ($registration && $validated['status'] === 'completed' && $event->require_payment) {
            $registration->update(['status' => 'confirmed']);
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'EventPayment',
            'model_id' => $payment->id,
            'description' => "Recorded payment of {$validated['amount']} {$validated['currency']} for event '{$event->title}'",
        ]);

        return back()->with('success', 'Payment recorded successfully!');
    }

    public function update(Request $request, EventPayment $payment)
    {
        $validated = $request->validate([
            'payment_method' => 'nullable|in:mpesa,tigo,airtel,bank,paypal,cash',
            'amount' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:3',
            'transaction_id' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'account_number' => 'nullable|string|max:255',
            'payment_proof' => 'nullable|string',
            'notes' => 'nullable|string',
            'status' => 'nullable|in:pending,completed,failed,refunded',
        ]);

        $oldStatus = $payment->status;
        $payment->update($validated);

        // Update paid_at if status changed to completed
        if ($validated['status'] === 'completed' && $oldStatus !== 'completed') {
            $payment->update(['paid_at' => now()]);
        }

        // Auto-confirm registration if payment completed
        if ($payment->registration && $validated['status'] === 'completed' && $payment->event->require_payment) {
            $payment->registration->update(['status' => 'confirmed']);
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'EventPayment',
            'model_id' => $payment->id,
            'description' => "Updated payment status from {$oldStatus} to {$validated['status']}",
        ]);

        return back()->with('success', 'Payment updated successfully!');
    }

    public function delete(EventPayment $payment)
    {
        $amount = $payment->amount;
        $payment->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'EventPayment',
            'model_id' => $payment->id,
            'description' => "Deleted payment of {$amount}",
        ]);

        return back()->with('success', 'Payment deleted successfully!');
    }

    public function exportPayments(Event $event)
    {
        $payments = EventPayment::where('event_id', $event->id)
            ->with('registration')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [];
        $data[] = ['Date', 'Name', 'Email', 'Phone', 'Payment Method', 'Amount', 'Currency', 'Transaction ID', 'Status', 'Paid At'];

        foreach ($payments as $payment) {
            $data[] = [
                $payment->created_at->format('Y-m-d H:i:s'),
                $payment->registration?->full_name ?? 'N/A',
                $payment->registration?->email ?? 'N/A',
                $payment->registration?->phone ?? $payment->phone_number ?? 'N/A',
                ucfirst($payment->payment_method ?? 'N/A'),
                $payment->amount,
                $payment->currency,
                $payment->transaction_id ?? '-',
                ucfirst($payment->status),
                $payment->paid_at ? $payment->paid_at->format('Y-m-d H:i:s') : '-',
            ];
        }

        $filename = "{$event->slug}-payments-" . now()->format('Y-m-d') . ".csv";

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');
            foreach ($data as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
