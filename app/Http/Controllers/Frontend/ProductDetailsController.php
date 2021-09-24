<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImages;

class ProductDetailsController extends Controller
{
    public function index($id, $slug) {

        $products = Product::findOrFail($id);
        $images = MultiImages::where('product_id', $id)->get();
        $category = Category::where('id', $id)->get();

        $hot_deals = Product::where('hot_deals', 1)->where('status', 1)->where('discount_price', '>', 0)->inRandomOrder()->limit(5)->get();

        return view('app.products.details.index', compact('products', 'images', 'category', 'hot_deals'));
    }
}
