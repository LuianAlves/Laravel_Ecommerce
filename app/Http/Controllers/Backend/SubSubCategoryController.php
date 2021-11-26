<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get(); 
        $subsubcategory = SubSubCategory::latest()->get();

        return view('admin.backend.sub_sub_category.index', compact('subsubcategory',  'category'));
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
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'sub_subcategory_name_en' => 'required',
            'sub_subcategory_name_pt' => 'required',
        ]);

        $subsubcategory = SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_name_en' => $request->sub_subcategory_name_en,
            'sub_subcategory_name_pt' => $request->sub_subcategory_name_pt,
            'sub_subcategory_slug_en' => str_replace(' ', '-', $request->sub_subcategory_name_en),
            'sub_subcategory_slug_pt' => str_replace(' ', '_', $request->sub_subcategory_name_pt),
        ]);

        $noti = array(
            'message' => 'Sub SubCategory Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('sub_subcategory.index')->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubSubCategory $subSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);

        return view('admin.backend.sub_sub_category.edit', compact('subsubcategory', 'subcategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSubCategory $subSubCategory)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'sub_subcategory_name_en' => 'required',
            'sub_subcategory_name_pt' => 'required',
        ]);

        $subsubcategory_id = $request->id;

        $subsubcategory = SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_name_en' => $request->sub_subcategory_name_en,
            'sub_subcategory_name_pt' => $request->sub_subcategory_name_pt,
            'sub_subcategory_slug_en' => str_replace(' ', '-', $request->sub_subcategory_name_en),
            'sub_subcategory_slug_pt' => str_replace(' ', '_', $request->sub_subcategory_name_pt),
        ]);

        $noti = array(
            'message' => 'Sub SubCategory Updated Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('sub_subcategory.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id)->delete();

        $noti = array(
            'message' => 'Sub SubCategory Deleted Successfully!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($noti);
    }

    // AJAX PARA SELECTS
    public function getSubCategory($category_id) {
        $subcategory = SubCategory::where('category_id', $category_id)
                                  ->orderBy('subcategory_name_en', 'ASC')
                                  ->get(); 
                                
        return json_encode($subcategory);
    }
}
