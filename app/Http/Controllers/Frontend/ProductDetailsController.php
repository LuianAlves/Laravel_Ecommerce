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
            // Colors
            $color_en = $products->product_color_en;
            $product_color_en = explode(',', $color_en);

            $color_pt = $products->product_color_pt;
            $product_color_pt = explode(',', $color_pt);

            // Sizes
            $size_en = $products->product_size_en;
            $product_size_en = explode(',', $size_en);

            $size_pt = $products->product_size_pt;
            $product_size_pt = explode(',', $size_pt);

        $images = MultiImages::where('product_id', $id)->get();
        $category = Category::where('id', $id)->get();

        $cat_related_id = $products->category_id;
        $related_prod = Product::where('category_id', $cat_related_id)->where('id', '!=', $id)->inRandomOrder()->limit(6)->get();

        return view('app.products.details.index', compact('products', 'images', 'category', 'product_color_en', 'product_color_pt', 'product_size_en', 'product_size_pt', 'related_prod'));
    }
}
