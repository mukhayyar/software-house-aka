<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ProjectTracking;

class OrderController extends Controller
{
    public function changeToProgress($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'in progress';
        $order->save();

        return redirect()->back()->with('status', 'Order status changed to in progress.');
    }

    public function storeMilestone(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        ProjectTracking::create([
            'order_id' => $request->order_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('status', 'Milestone added successfully.');
    }
}
