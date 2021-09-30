<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wishlist;
use Carbon\Carbon;
use Auth;

class WishlistController extends Controller
{
    public function index() {
        return view('app.profile.wishlist.index');
    }

    public function getWishlist() {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlist);
    }

    public function store(Request $request, $product_id) {
        if (Auth::check()) {
            
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
             
            if (!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);

                return response()->json(['success' => session()->get('language') == 'portuguese' ? 'Produto adicionado aos Favoritos!' : 'Product added in Wishlist!']);
            } else {

                return response()->json(['error' => session()->get('language') == 'portuguese' ? 'Este Produto já foi Adicionado aos Favoritos!' : 'This Product has Already on Wishlist!']);
            }
        } else {
        
            return response()->json(['error' => session()->get('language') == 'portuguese' ? 'Primeiro faça login em sua Conta!' : 'At First Login Your Account!']);
        }
    }

    public function delete ($id) {
        $del_wishlist = Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();

        return response()->json(['success' => session()->get('language') == 'portuguese' ? 'Produto removido dos Favoritos!' : 'Successfully Product Remove!']);
    }
}
