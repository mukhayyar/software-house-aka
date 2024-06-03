<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function verify($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['payment_status' => 'verified']);
        return redirect()->back()->with('status', 'Payment verified successfully.');
    }

    public function reject($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['payment_status' => 'rejected']);
        return redirect()->back()->with('status', 'Payment rejected.');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        $order = Order::findOrFail($payment->order_id);
        $order->delete();
        return redirect()->back()->with('status', 'Payment deleted successfully.');
    }
}
