<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;


class ShopController extends Controller
{
    public function index() {

        $products = Product::query();

            if(!empty($_GET['category'])) {
                $slugs = explode(',', $_GET['category']);
                $catIds = Category::select('id')->whereIn('category_slug_en', $slugs)->pluck('id')->toArray();

                $products = $products->whereIn('category_id', $catIds)->orderBy('category_id', 'ASC')->paginate(9); 
            
            } 
            elseif(!empty($_GET['brand'])) {
                $slugs = explode(',', $_GET['brand']);
                $brandIds = Brand::select('id')->whereIn('brand_slug_en', $slugs)->pluck('id')->toArray();

                $products = $products->whereIn('brand_id', $brandIds)->orderBy('brand_id', 'ASC')->paginate(9); 
            
            } else {
                $products =  Product::where('status', 1)->orderBy('id', 'DESC')->paginate(6); 

            }

        $brands = Brand::orderBy('brand_name_en', 'ASC')->get();
        $category = Category::orderBy('category_name_en', 'ASC')->get();
       
        return view('app.shop.index', compact('products', 'category', 'brands'));
    }

    public function filter(Request $request) {

        $data = $request->all();

        $catUrl = "";
        $brandUrl = "";

            if(!empty($data['category'])) {
                foreach($data['category'] as $category) {
                    if (empty($catUrl)) {
                        $catUrl .= '&category=' . $category;
                    } else {
                        $catUrl .= ',' . $category;
                    }
                }
            } 
            if(!empty($data['brand'])) {
                foreach($data['brand'] as $brand) {
                    if (empty($brandUrl)) {
                        $brandUrl .= '&brand=' . $brand;
                    } else {
                        $brandUrl .= ',' . $brand;
                    }
                }
            } 

        return redirect()->route('shop.index', $catUrl.$brandUrl);
    }
}
