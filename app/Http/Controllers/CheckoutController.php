<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $service = Service::with('faqs', 'servicesIncluded', 'user')->findOrFail($id);
        return view('checkout.index', compact('service'));
    }

    public function store(Request $request) {
        // Validate the incoming request
        $request->validate([
            'payment_option' => ['required', 'in:BCA,MANDIRI,BNI'],
            'payment_confirmation' => ['required', 'image', 'max:2048'], // max 2MB
            'order_note' => ['required', 'string', 'max:1000'],
        ]);
        $filename = null;
        // Store the payment confirmation image
        if ($request->hasFile('payment_confirmation')) {
            $file = request('payment_confirmation');
            $filename = $file->getClientOriginalName();

            $file->storeAs('payments/'. Auth::id(), $filename, 's3');
        }

        // Create a new order
        $order = Order::create([
            'buyer_id' => Auth::id(),
            'service_id' => $request->service_id, // Assuming service_id is passed in the request
            'note' => $request->order_note,
            'order_date' => now(),
            'status' => 'pending',
        ]);

        // Create a new payment associated with the order
        Payment::create([
            'order_id' => $order->id,
            'amount' => $request->amount, // Assuming amount is passed in the request
            'payment_date' => now(),
            'payment_status' => 'pending',
            'confirmation_image_url' => $filename,
        ]);

        return redirect()->route('myorders')->with('success', 'Payment submitted successfully!');
    }
}
