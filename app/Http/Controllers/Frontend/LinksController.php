<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class LinksController extends Controller
{
    public function subCategory($subcat_id, $slug) {
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->inRandomOrder()->paginate(6);

        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::inRandomOrder()->limit(10)->get();

        $breadsubcat = SubCategory::with('category')->where('id', $subcat_id)->get();
        
        return view('app.products.links.subcategory', compact('products', 'category', 'subcategory', 'breadsubcat'));
    }
    
    public function subSubCategory($subsubcat_id, $slug) {
        $products = Product::where('status', 1)->where('sub_subcategory_id', $subsubcat_id)->inRandomOrder()->paginate(6);
        
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::inRandomOrder()->limit(10)->get();
        $subsubcategory = SubSubCategory::orderBy('sub_subcategory_name_en', 'ASC')->get();

        $breadsubsubcat = SubSubCategory::with('category', 'subcategory')->where('id', $subsubcat_id)->get();


        return view('app.products.links.sub_subcategory', compact('products', 'category', 'subcategory', 'subsubcategory', 'breadsubsubcat'));
    }
}
