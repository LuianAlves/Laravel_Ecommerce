<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();

        $subcategory = SubCategory::orderBy('category_id', 'ASC')->get();
        return view('admin.backend.sub_category.index', compact('subcategory', 'category'));
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
            'subcategory_name_en' => 'required',
            'subcategory_name_pt' => 'required',
        ], 
        [
            'category_id.required' => 'Please Select Any Category'
        ]);

        $subcategory = SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_pt' => $request->subcategory_name_pt,
            'subcategory_slug_en' => str_replace(' ', '-', $request->subcategory_name_en),
            'subcategory_slug_pt' => str_replace(' ', '_', $request->subcategory_name_pt),
        ]);

        $noti = array (
            'message' => 'SubCategory Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('subcategory.index')->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::FindOrFail($id);

        return view('admin.backend.sub_category.edit', compact('subcategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_pt' => 'required',
        ]);

        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_pt' => $request->subcategory_name_pt,
            'subcategory_slug_en' => str_replace(' ', '-', $request->subcategory_name_en),
            'subcategory_slug_pt' => str_replace(' ', '_', $request->subcategory_name_pt),
        ]);

        $noti = array (
            'message' => 'SubCategory Updated Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('subcategory.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id)->delete();

        $noti = array (
            'message' => 'Sub Category Deleted Successfully!',
            'alert-type' => 'error'
        );

        return redirect()->route('subcategory.index')->with($noti);
    }
}
