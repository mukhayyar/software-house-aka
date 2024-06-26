<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ProjectTracking;
use App\Http\Controllers\Controller;

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
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        ProjectTracking::create([
            'order_id' => $request->order_id,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return redirect()->back()->with('status', 'Milestone added successfully.');
    }
}
