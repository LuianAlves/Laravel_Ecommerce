<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Cart;

class CartController extends Controller
{

    public function miniCartIndex()
    {
        // Mini Cart
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();


        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal, 2)
        ));
    }

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
