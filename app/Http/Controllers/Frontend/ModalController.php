<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;


class ModalController extends Controller
{
    public function modalCart($id) {
        $product = Product::with('category', 'brand')->findOrFail($id); // with passando os relacionamentos em Models\Product para a view (modal)

        // Color
            $color = $product->product_color_en;
            $product_color = explode(',', $color);

            $color_pt = $product->product_color_pt;
            $product_color_pt = explode(',', $color_pt);

        // Size
            $size = $product->product_size_en;
            $product_size = explode(',', $size);

            $size_pt = $product->product_size_pt;
            $product_size_pt = explode(',', $size_pt);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'color_pt' => $product_color_pt,
            'size' => $product_size,
            'size_pt' => $product_size_pt,
        ));
    }
}
