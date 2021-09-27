<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class TagController extends Controller
{
    public function index($tag) {

        $subcategory = SubCategory::inRandomOrder()->limit(10)->get();        

        $products = Product::where('status', 1)
                           ->where('product_tag_en', $tag)
                           ->orWhere('product_tag_pt', $tag)
                           ->orderBy('id', 'DESC')
                           ->paginate(1);

        return view('app.products.tags.index', compact('products', 'subcategory'));
    }
}
