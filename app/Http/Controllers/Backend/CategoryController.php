<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.backend.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Só vai ser utilizando caso precise direcionar para outra page
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
            'category_name_en' => 'required',
            'category_name_pt' => 'required',
            'category_icon' => 'required'
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_pt' => $request->category_name_pt,
            'category_slug_en' => str_replace(' ', '-', $request->category_name_en),
            'category_slug_pt' => str_replace(' ', '_', $request->category_name_pt),
            'category_icon'    => $request->category_icon
        ]);

        $noti = array(
            'message'    => 'Category Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_pt' => $request->category_name_pt,
            'category_slug_en' => str_replace(' ', '-', $request->category_name_en),
            'category_slug_pt' => str_replace(' ', '_', $request->category_name_pt),
            'category_icon'    => $request->category_icon
        ]);

        $noti = array (
            'message'    => 'Category Updated Successfully!',
            'alert-type' => 'info',
        );

        return redirect()->route('category.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();

        $noti = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'error' 
        );

        return redirect()->back()->with($noti);
    }
}
