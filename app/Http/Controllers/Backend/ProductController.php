<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use File; 

use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImages;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;


class ProductController extends Controller
{
    // Index
    public function index()
    {
        $products = Product::orderBy('status', 'DESC')->orderBy('category_id', 'ASC')->get();
        return view('admin.backend.products.index', compact('products'));
    }

    // Create
    public function create()
    {
        $category = Category::latest()->get();
        $brands = Brand::latest()->get();

        return view('admin.backend.products.create', compact('category', 'brands'));
    }

    // Store
    public function store(Request $request)
    {   
        // Thumb
        if (!File::exists('upload/products/thumbnail')) {
            File::makeDirectory('upload/products/thumbnail/', 0777, true, true);
        }

        $image = $request->file('product_thumnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1080, 1215)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        $product_id = Product::insertGetId([
                'brand_id' => $request->brand_id, 
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'sub_subcategory_id' => $request->sub_subcategory_id,
                'product_name_en' => $request->product_name_en,
                'product_name_pt' => $request->product_name_pt,
                'product_slug_en' => str_replace(' ', '-', $request->product_name_en),
                'product_slug_pt' => str_replace(' ', '_', $request->product_name_pt),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'product_tag_en' => $request->product_tag_en,
                'product_tag_pt' => $request->product_tag_pt,
                'product_size_en' => $request->product_size_en,
                'product_size_pt' => $request->product_size_pt,
                'product_color_en' => $request->product_color_en,
                'product_color_pt' => $request->product_color_pt,

                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_descp_en' => $request->short_descp_en,
                'short_descp_pt' => $request->short_descp_pt,
                'long_descp_en' => $request->long_descp_en,
                'long_descp_pt' => $request->long_descp_pt,

                'hot_deals' => $request->hot_deals,
                'featured' => $request->featured,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,

                'product_thumnail' => $save_url,
                'status' => 1,
                'created_at' => Carbon::now(),
            ]);

            // Multi Images
            if (!File::exists('upload/products/multi_images')) {
                File::makeDirectory('upload/products/multi_images/', 0777, true, true);
            }

            $images = $request->file('multi_images');

            foreach ($images as $img) {
                $make_name = hexdec(uniqid()). '.' .$img->getClientOriginalExtension();
                Image::make($img)->resize(1080, 1215)->save('upload/products/multi_images/'.$make_name);
                $save_url_multi = 'upload/products/multi_images/'.$make_name;

                MultiImages::insert([
                    'product_id' => $product_id,
                    'photo_name' => $save_url_multi,
                    'created_at' => Carbon::now(),
                ]);
            } // End - Foreach

        
            $noti = array(
            'message' => 'Product Inserted Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('product.index')->with($noti);
    }

    // Edit
    public function edit($id)
    {   
        $brands = Brand::latest()->get();
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();

        $products = Product::findOrFail($id);

        return view('admin.backend.products.edit', compact('brands', 'category', 'subcategory', 'subsubcategory', 'products'));
    }

    // Update
    public function update(Request $request)
    {
        $product_id = $request->id; // input hidden

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id, 
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_id' => $request->sub_subcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_pt' => $request->product_name_pt,
            'product_slug_en' => str_replace(' ', '-', $request->product_name_en),
            'product_slug_pt' => str_replace(' ', '_', $request->product_name_pt),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tag_en' => $request->product_tag_en,
            'product_tag_pt' => $request->product_tag_pt,
            'product_size_en' => $request->product_size_en,
            'product_size_pt' => $request->product_size_pt,
            'product_color_en' => $request->product_color_en,
            'product_color_pt' => $request->product_color_pt,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_pt' => $request->short_descp_pt,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_pt' => $request->long_descp_pt,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $noti = array(
            'message' => 'Product Updated Without Images Successfully!',
            'alert-type' => 'info',
        );

        return redirect()->route('product.index')->with($noti);
    }

    // Destroy
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumnail);

        Product::findOrFail($id)->delete();

        $multi_images = MultiImages::where('product_id', $id)->get();
        foreach ($multi_images as $image) {
            unlink($image->photo_name);
            MultiImages::where('product_id', $id)->delete();
        }

        $noti = array(
            'message' => 'Product Deleted Successfully!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($noti);
    }

    //----------------- Product Stock  ------------------- //
    public function stock()
    {
        $products = Product::orderBy('product_qty', 'ASC')->get();
        return view('admin.backend.products.stock.index', compact('products'));
    }

    public function stockEdit($id)
    {
        $products = Product::findOrFail($id);

        return view('admin.backend.products.stock.edit', compact('products'));
    }

    public function stockUpdate(Request $request, $id) {

        Product::findOrFail($id)->update([
            'product_qty' => $request->product_qty,
            'updated_at' => Carbon::now(),
        ]);

        $noti = array(
            'message' => 'Product Stock Updated Successfully!',
            'alert-type' => 'info',
        );

        return redirect()->route('product.stock')->with($noti);
    }
    
    //----------------- Select Sub Category ------------------- //

    public function getSubSubCategory($subcategory_id) {
        $subsubcategory = SubSubCategory::where('subcategory_id', $subcategory_id)
                                        ->orderBy('sub_subcategory_name_en', 'ASC')
                                        ->get();

        return json_encode($subsubcategory);
    }

    //----------------- Product Images ------------------- //

    // Edit
    public function editImages($id) {
        $multi_images = MultiImages::where('product_id', $id)->get();
        $products = Product::findOrFail($id);

        return view('admin.backend.products.images', compact('multi_images', 'products'));
    }

    // Store 
    public function storeImages(Request $request) {

        $product_id = $request->id;

        if (!File::exists('upload/products/multi_images')) {
            File::makeDirectory('upload/products/multi_images/', 0777, true, true);
        }

        $images = $request->file('multi_images');

        foreach ($images as $img) {
            $make_name = hexdec(uniqid()). '.' .$img->getClientOriginalExtension();
            Image::make($img)->resize(1080, 1215)->save('upload/products/multi_images/'.$make_name);
            $save_url_multi = 'upload/products/multi_images/'.$make_name;

            MultiImages::insert([
                'product_id' => $product_id,
                'photo_name' => $save_url_multi,
                'created_at' => Carbon::now(),
            ]);
        } // End - Foreach

        $noti = array(
            'message' => 'Images Inserted Successfully!',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($noti);
    }

    // Update
    public function updateThumnail(Request $request) {
        $product_id = $request->id;

        $old_image = $request->old_img;
        unlink($old_image);

        $image = $request->file('product_thumnail');
        $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1080, 1215)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        Product::findOrFail($product_id)->update([
            'product_thumnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $noti = array(
            'message' => 'Thumnail Updated Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($noti);
    }

    // Update
    public function updateImages(Request $request) {
        $images = $request->multi_images;

        if($images != '') {
            foreach ($images as $id => $img) {
                $delete_img = MultiImages::findOrFail($id);
                unlink($delete_img->photo_name);

                $image = $request->file('multi_images');
                $make_name = hexdec(uniqid()). '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(1080, 1215)->save('upload/products/multi_images/'.$make_name);
                $save_url = 'upload/products/multi_images/'.$make_name;

                MultiImages::where('id', $id)->update([
                    'photo_name' => $save_url,
                    'updated_at' => Carbon::now()
                ]);
            }
        }
        else {
            $noti = array(
                'message' => ('Add Image!'),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($noti);
        }


        $noti = array(
            'message' => ('Product Image Updated Successfully!'),
            'alert-type' => 'info'
        );

        return redirect()->back()->with($noti);
    }

    // Delete
    public function destroyImages($id) {
        $delete_img = MultiImages::findOrFail($id);
        unlink($delete_img->photo_name);

        MultiImages::findOrFail($id)->delete();

        $noti = array(
            'message' => 'Deleted Image Successfully!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($noti);
    }

    //----------------- Product Status ------------------- //

    // Inactive
    public function inactive($id) {

        Product::findOrFail($id)->update([
            'status' => 0
        ]);

        $noti = array(
            'message' => 'Product Inactive!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($noti);
    }

    // Active
    public function active ($id) {
        Product::findOrFail($id)->update([
            'status' => 1
        ]);

        $noti = array(
            'message' => 'Product Active!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($noti);

    }
}
