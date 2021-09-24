<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class TagController extends Controller
{
    public function index($tag) {

        $products = Product::where('status', 1)
                           ->where('product_tag_en', $tag)
                           ->where('product_tag_pt', $tag)
                           ->orderBy('id', 'DESC')
                           ->get();

        return view('app.tags.index', compact('products'));
    }
}
