<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyorderController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_type == 'buyer') {
            $totalPendingOrders = Order::where('buyer_id',Auth::id())->whereHas('payment', function($query) {
                $query->where('payment_status', 'pending');
            })->count();
            $totalOnProgressOrders = Order::where('buyer_id', Auth::id())->orWhere('status', 'in progress')->count();
        } else {
            // seller
            $totalPendingOrders = Order::whereHas('service', function($query) {
                $query->where('seller_id', Auth::id());
            })->
            whereHas('payment', function($query) {
                $query->where('payment_status', 'pending');
            })->count();
            $totalOnProgressOrders = Order::
            whereHas('payment', function($query) {
                $query->where('payment_status', 'verified');
            })->
            where('status', 'pending')->orWhere('status', 'in progress')->count();
        }
        return view('myOrder.index', compact('totalPendingOrders', 'totalOnProgressOrders'));
    }

    public function projectPayment() {
        if(Auth::user()->user_type == 'buyer') {
            $PendingOrders = Order::with('payment','service')->where('buyer_id',Auth::id())->get();
        } else {
            $PendingOrders = Order::with('payment','service')->whereHas('service', function($query) {
                $query->where('seller_id', Auth::id());
            })->get();
        }
        return view('myOrder.notpaid', compact('PendingOrders'));
    }

    public function projectProgress() {
        if(Auth::user()->user_type == 'buyer') {
            $OnProgressOrders = Order::with('service')->where('buyer_id',Auth::id())->orWhere('status', 'in progress')->get();
        } else {
            $OnProgressOrders = Order::with('service')->whereHas('service', function($query) {
                $query->where('seller_id', Auth::id());
            })->
            whereHas('payment', function($query) {
                $query->where('payment_status', 'verified');
            })->where('status', 'pending')->orWhere('status', 'in progress')->get();
        }
        return view('myOrder.process', compact('OnProgressOrders'));
    }

    public function paymentDetails($id) {
        $order = Order::with('service','payment')->findOrFail($id);
        return view('myOrder.detail', compact('order'));
    }
}
