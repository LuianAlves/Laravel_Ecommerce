<?php

namespace App\Http\Controllers\User\Payments\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cart;
use Auth;
use Session;
use Carbon\Carbon;

use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class StripeController extends Controller
{
    public function index(Request $request) {

        if (Session::has('coupon')) {
            
            $total_amount = Session::get('coupon')['total_amount'];
        } else {

            $total_amount = round(Cart::total());
        }
        
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51JhuSuARQi1vsitR9vuGJzimv08lI0nFYaopXe7WYLoBZqdLCRnGHpVKaoncXQsQyM6vQA0XIoxrvfLrAyr3Jn5900AtiPXOwq');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $total_amount * 100,
        'currency' => 'usd',
        'description' => 'Luian Ecommerce',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($charge);

        $order_id =  Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',

            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,

            'amount' => $total_amount,

            'order_number' => $charge->metadata->order_id,
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

        // Save Database
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
