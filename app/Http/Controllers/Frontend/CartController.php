<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Coupon;
use Carbon\Carbon;
use Cart;

class CartController extends Controller
{
    // Get Cart List
    public function getCart() {
        
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();


        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal, 2)
        ));
    }
    
    // ================================================================
    
    // My Cart Page Methods  
    public function index() {
        return view('app.profile.my_cart.index');
    }

    public function delete($rowId) {
        Cart::remove($rowId);
        
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon');
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            // Convertendo os valores decimais
            $total = Cart::total();
            $removePont = str_replace('.', '', $total);
            $removeVirg = str_replace(',', '', $removePont);
            $cartTotal = $removeVirg / 100;

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => $cartTotal * $coupon->coupon_discount/100,
                'total_amount' => $cartTotal - $cartTotal * $coupon->coupon_discount/100
            ]);
        }
        
        return response()->json(['error' => session()->get('language') == 'portuguese' ? 'Produto Removido do Carrinho!' : 'Product Remove from Cart!']);
    }
    /* Increment - MY CART PAGE */
        public function increment($rowId) {
            $row = Cart::get($rowId);
            Cart::update($rowId, $row->qty + 1);

            if(Session::has('coupon')){
                $coupon_name = Session::get('coupon');
                $coupon = Coupon::where('coupon_name', $coupon_name)->first();

                // Convertendo os valores decimais
                $total = Cart::total();
                $removePont = str_replace('.', '', $total);
                $removeVirg = str_replace(',', '', $removePont);
                $cartTotal = $removeVirg / 100;

                Session::put('coupon', [
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount' => $cartTotal * $coupon->coupon_discount/100,
                    'total_amount' => $cartTotal - $cartTotal * $coupon->coupon_discount/100
                ]);
            }
            
            return response()->json(['increment']);
        }
    /* Decrement - MY CART PAGE */
        public function decrement($rowId) {
            $row = Cart::get($rowId);
            Cart::update($rowId, $row->qty - 1);

            if(Session::has('coupon')){
                $coupon_name = Session::get('coupon');
                $coupon = Coupon::where('coupon_name', $coupon_name)->first();

                // Convertendo os valores decimais
                $total = Cart::total();
                $removePont = str_replace('.', '', $total);
                $removeVirg = str_replace(',', '', $removePont);
                $cartTotal = $removeVirg / 100;

                Session::put('coupon', [
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount' => $cartTotal * $coupon->coupon_discount/100,
                    'total_amount' => $cartTotal - $cartTotal * $coupon->coupon_discount/100
                ]);
            }

            return response()->json(['decrement']);
        }        
    
    // ================================================================        
    
    // Mini Cart Methods
    public function miniCartStore(Request $request, $id)
    {
        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);
            
            if($product->discount_price == NULL) {
                Cart::add([
                    'id' => $id,
                    'name' => $request->product_name,
                    'qty' => $request->quantity,
                    'price' => $product->selling_price,
                    'weight' => 1,
                    'options' => [
                            'image' => $product->product_thumnail,
                            'color' => $request->color,
                            'size' => $request->size,
                    ],
                ]);

                return response()->json(['error' => session()->get('language') == 'portuguese' ? 'Produto Adicionado ao Carrinho!' : 'Successfully Added on your Cart!']);
            } else {

                Cart::add([
                    'id' => $id,
                    'name' => $request->product_name,
                    'qty' => $request->quantity,
                    'price' => $product->selling_price - $product->discount_price,
                    'weight' => 1,
                    'options' => [
                            'image' => $product->product_thumnail,
                            'color' => $request->color,     
                            'size' => $request->size,                         
                    ],
                ]);

                return response()->json(['error' => session()->get('language') == 'portuguese' ? 'Produto Adicionado ao Carrinho!' : 'Successfully Added on your Cart!']);
            }
    }

    public function miniCartDestroy($rowId)
    {
        Cart::remove($rowId);

        return response()->json(['error' => session()->get('language') == 'portuguese' ? 'Produto Removido do Carrinho!' : 'Product Remove from Cart!']);
    }
    
    // ================================================================
    
    // Apply Coupon
    public function applyCoupon(Request $request) {

        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('status', 1)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
            
        if($coupon ) {
            // Convertendo os valores decimais
            $total = Cart::total();
            $removePont = str_replace('.', '', $total);
            $removeVirg = str_replace(',', '', $removePont);
            $cartTotal = $removeVirg / 100;

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => $cartTotal * $coupon->coupon_discount/100,
                'total_amount' => $cartTotal - $cartTotal * $coupon->coupon_discount/100
            ]);

            return response()->json([
                'success' => 'Coupon Applied Successfully'
            ]);

        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

    // Calc Coupon
    public function calcCoupon() {

        if(Session::has('coupon')) {

            return response()->json([
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount']
            ]);

        } else {
            
            return response()->json([
                'total' => Cart::total()
            ]);
        }
    }

    // Remove Coupon
    public function removeCoupon() {

        Session::forget('coupon');

        return response()->json([
            'success' => 'Coupon Removed Successfully!'
        ]);
    }

}
