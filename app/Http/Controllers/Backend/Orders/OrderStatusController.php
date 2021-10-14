<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use PDF;

class OrderStatusController extends Controller
{
    // pending
    public function pending() {
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    } 

    public function pendingUpdate($order_id) {
        $status = Order::where('id', $order_id)->update([
            'status' => 'Confirmed',
            'confirmed_date' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Order Confirmed Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('confirmed.view')->with($noti);
    }
    
    // confirmed
    public function confirmed() {
        $orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    } 

    public function confirmedUpdate($order_id) {
        $status = Order::where('id', $order_id)->update([
            'status' => 'Processing',
            'processing_date' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Processing Order',
            'alert-type' => 'info'
        ];

        return redirect()->route('processing.view')->with($noti);
    }
    
    // processing
    public function processing() {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    } 

    public function processingUpdate($order_id) {
        $status = Order::where('id', $order_id)->update([
            'status' => 'Picked',
            'processing_date' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Picked Order',
            'alert-type' => 'info'
        ];

        return redirect()->route('picked.view')->with($noti);
    }
    
    // picked
    public function picked() {
        $orders = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    } 

    public function pickedUpdate($order_id) {
        $status = Order::where('id', $order_id)->update([
            'status' => 'Shipped',
            'processing_date' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Shipped Order',
            'alert-type' => 'info'
        ];

        return redirect()->route('shipped.view')->with($noti);
    }
    
    // shipped
    public function shipped() {
        $orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    } 

    public function shippedUpdate($order_id) {
        $status = Order::where('id', $order_id)->update([
            'status' => 'Delivered',
            'processing_date' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Delivered Order',
            'alert-type' => 'info'
        ];

        return redirect()->route('delivered.view')->with($noti);
    }
    
    // delivered
    public function delivered() {
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    } 

    // cancel
    public function cancel() {
        $orders = Order::where('status', 'cancel')->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.index', compact('orders'));
    } 

    public function cancelUpdate($order_id) {
        $status = Order::where('id', $order_id)->update([
            'status' => 'Cancel',
            'processing_date' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Canceled Order',
            'alert-type' => 'erro'
        ];

        return redirect()->back()->with($noti);
    }
    
    // Order Details
    public function details($order_id) {

        $order = Order::with('division', 'state', 'district', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('admin.backend.all_orders.details', compact('order', 'orderItem'));
    }

    // Order Download
    public function download($order_id) {
        $order = Order::with('division', 'state', 'district', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('admin.backend.all_orders.download.invoice', compact('order', 'orderItem'))
                ->setPaper('a4')
                ->setOptions([
                    'tempDir' => public_path(),
                    'chroot' => public_path()
                ]);

        return $pdf->download($order->invoice_no . '_' . $order->order_date . '.pdf');
    }
}
