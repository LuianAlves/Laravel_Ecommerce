<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use App\Models\Shipping;
use Auth;
use Cart;

class CheckoutController extends Controller
{
    public function index() {
        
        if (Auth::check()) {

            if(Cart::total() > 0){

                $carts = CarT::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $divisions = ShipDivision::latest()->get();

                return view('app.profile.checkout.index', compact('carts', 'cartQty', 'cartTotal', 'divisions'));
            } else {

                $noti = [
                    'message' => 'Shopping At List One Product!',
                    'alert-type' => 'error'
                ];
    
                return redirect()->back()->with($noti);
            }

        } else {
            $noti = [
                'message' => 'You Need to Login First!',
                'alert-type' => 'error'
            ];

            return redirect()->route('login')->with($noti);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'shipping_name' => 'required',
            'shipping_email' => 'required',
            'shipping_phone' => 'required',
            'post_code' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'payment_method' => 'required',
        ]);

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['division_id'] = $request->division_id;
        $data['post_code'] = $request->post_code;
        $data['state_id'] = $request->state_id;
        $data['district_id'] = $request->district_id;
        $data['notes'] = $request->notes;

        $cartTotal = Cart::total();

        if ($request->payment_method == 'stripe') {

            return view('app.profile.checkout.payments.stripe', compact('data', 'cartTotal'));
        } else if ($request->payment_method == 'card'){

            return view('app.profile.checkout.payments.card', compact('data'));
        } else {
            
            return view('app.profile.checkout.payments.cash', compact('data', 'cartTotal'));
        } 

    }

    // =====================================

    // Get Select State
    public function getState($division_id) {
        $state = ShipState::where('division_id', $division_id)->orderBy('state_name', 'ASC')->get();

        return json_encode($state);
    }

    // Get Select District
    public function getDistrict($state_id) {
        $district = ShipDistrict::where('state_id', $state_id)->orderBy('district_name', 'ASC')->get();

        return json_encode($district);
    }

}