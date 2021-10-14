<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Cart;
use PDF;
use Carbon\Carbon;

use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // === Orders View

    public function orders() {

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

    // Order Return
    public function return(Request $request, $order_id) {
        $order = Order::with('division', 'state', 'district', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();

        $order->findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'status' => 'Return Requested'
        ]);

        $noti = [
            'message' => 'Return Request Send Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('my.orders')->with($noti);
    }

    // Return Orders View 
    public function returnView() {
        $orders = Order::where('status', 'Return Requested')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        return view('app.profile.my_orders.return_orders.index', compact('orders'));
    }

    // Cancel Orders View
    public function cancelView() {
        $orders = Order::where('status', 'Cancel')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        return view('app.profile.my_orders.cancel_orders.index', compact('orders'));
    }
}
