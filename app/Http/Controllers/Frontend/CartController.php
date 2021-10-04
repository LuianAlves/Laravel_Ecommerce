<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
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

    // My Cart Page Methods
    
    public function index() {
        return view('app.profile.my_cart.index');
    }

    public function delete($rowId) {
        Cart::remove($rowId);

        return response()->json(['error' => session()->get('language') == 'portuguese' ? 'Produto Removido do Carrinho!' : 'Product Remove from Cart!']);
    }
    /* Increment - MY CART PAGE */
        public function increment($rowId) {
            $row = Cart::get($rowId);
            Cart::update($rowId, $row->qty + 1);

            return response()->json(['increment']);
        }
    /* Decrement - MY CART PAGE */
        public function decrement($rowId) {
            $row = Cart::get($rowId);
            Cart::update($rowId, $row->qty - 1);

            return response()->json(['decrement']);
        }        

    // Mini Cart Methods
    public function miniCartStore(Request $request, $id)
    {
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
}
