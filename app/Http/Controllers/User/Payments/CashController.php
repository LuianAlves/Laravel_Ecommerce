<?php

namespace App\Http\Controllers\User\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;

use Carbon\Carbon;
use Session;
use Auth;
use Cart;

class CashController extends Controller
{
    public function index(Request $request) {

        if(Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        // Insert On Database - Orders
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Cash',
            'payment_method' => 'Cash',
            'transaction_id' => 'trx_' . mt_rand(10000000000, 99999999999),
            'currency' => 'usd',

            'amount' => $total_amount,

            'invoice_no' => 'LAM' . mt_rand(10000000, 99999999), // LAM - Abreviação do nome ' Luian Alves ...'
            
            'order_date' => Carbon::now()->format('d/m/Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            
            'status' => 'Pending',
            'created_at' => Carbon::now(),
        ]);

        // Send Email
        $invoice = Order::findOrFail($order_id);

        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $request->name,
            'email' => $request->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        // Insert On Database - OrderItems
        $carts = Cart::content();

        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => strtolower($cart->options->color),
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupon')) {

            Session::forget('coupon');
        }

        Cart::destroy();
        
        $noti = [
            'message' => 'Your Order Place Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('my.orders')->with($noti);

    }
}
