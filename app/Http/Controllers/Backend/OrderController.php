<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function shoAllOrders ()
    {
        $orders = Order::with('orderDetails')->get();
        //dd($orders);
        return view ('backend.order.all-orders', compact('orders'));
    }
}
