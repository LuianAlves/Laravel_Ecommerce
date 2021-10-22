<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Order;

class ReturnOrderController extends Controller
{
    public function request() {
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.return_orders.return_request', compact('orders'));
    }

    public function aprove($id) {
        Order::where('id', $id)->update([
            'return_order' => 2,
            'status' => 'Returned',
            'return_date' => Carbon::now(0)
        ]);

        $noti = [
            'message' => 'Return Order Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.request')->with($noti);
    }

    public function allRequest() {
        $orders = Order::where('return_order', '!=', 0)->orderBy('return_order', 'DESC')->get();

        return view('admin.backend.all_orders.return_orders.all_request', compact('orders'));
    }
}
