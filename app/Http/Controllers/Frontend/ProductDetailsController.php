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

        return view('app.products.details.index', compact('products', 'images', 'category'));
    }
}
