<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;

class OrderStatusController extends Controller
{
    public function pending() {
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    }

    public function confirmed() {
        $orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    }

    public function processing() {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    }
    






    // Order Details
    public function details($order_id) {

        $order = Order::with('division', 'state', 'district', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.details', compact('order', 'orderItem'));
    }
}
