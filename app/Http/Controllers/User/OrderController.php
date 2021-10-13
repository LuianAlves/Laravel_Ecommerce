<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Cart;
use PDF;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function profile() {

        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        return view('app.profile.my_orders.index', compact('orders'));
    }

    // View Order Details
    public function details($order_id) {

        $order = Order::with('division', 'state', 'district', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('app.profile.my_orders.details', compact('order', 'orderItem'));
    }

    // Invoice Download
    public function download($order_id) {

        $order = Order::with('division', 'state', 'district', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        // return pdf
        if(session()->get('language') == 'portuguese') {
            // return view('app.profile.my_orders.download.invoice_pt', compact('order', 'orderItem'));

            $pdf = PDF::loadView('app.profile.my_orders.download.invoice_pt', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);

            return $pdf->download('invoice_pt.pdf');
        } else {
            // return view('app.profile.my_orders.download.invoice_en', compact('order', 'orderItem'));

            $pdf = PDF::loadView('app.profile.my_orders.download.invoice_en', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);
            
            return $pdf->download('invoice_en.pdf');
        }

        
    }
}
