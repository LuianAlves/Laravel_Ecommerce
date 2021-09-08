<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_pt' => 'required',
            'brand_image' => 'required',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 1080)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_pt' => $request->brand_name_pt,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_pt' => strtolower(str_replace(' ', '-', $request->brand_name_pt)),
            'brand_image' => $save_url,
        ]);

        $noti = array(
            'message' => 'Brand Created Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_pt' => 'required',
        ]);

        // Values input Hidden
        $brand_id =  $request->id;
        $old_img = $request->old_image;

            if ($request->file('brand_image')) {
                unlink($old_img);
                $image = $request->file('brand_image');
                $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(1920, 1080)->save('upload/brand/'.$name_gen);
                $save_url = 'upload/brand/' . $name_gen;

                Brand::findOrFail($brand_id)->update([
                    'brand_name_en' => $request->brand_name_en,
                    'brand_name_pt' => $request->brand_name_pt,
                    'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                    'brand_slug_pt' => strtolower(str_replace(' ', '-', $request->brand_name_pt)),
                    'brand_image' => $save_url,
                ]);

            } else {

                Brand::findOrFail($brand_id)->update([
                    'brand_name_en' => $request->brand_name_en,
                    'brand_name_pt' => $request->brand_name_pt,
                    'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                    'brand_slug_pt' => strtolower(str_replace(' ', '-', $request->brand_name_pt)),
                ]);
            }

        $noti = array(
            'message' => 'Brand Updated Sucessfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('brand.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $image = $brand->brand_image;
        unlink($image);

        Brand::findOrFail($id)->delete();

        $noti = array (
            'message' => 'Brand Deleted Successfully!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($noti);
    }
}
