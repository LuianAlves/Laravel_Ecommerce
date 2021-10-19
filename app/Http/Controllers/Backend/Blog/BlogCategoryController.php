<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog\BlogPostCategory;
use carbon\Carbon;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_cat = BlogPostCategory::latest()->get();

        return view('admin.backend.blog.category.index', compact('blog_cat'));
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
            'blog_category_name_en' => 'required',
            'blog_category_name_pt' => 'required'
        ]);

        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_pt' => $request->blog_category_name_pt,
            'blog_category_slug_en' => strtolower(str_replace(' ', '_', $request->blog_category_name_en)),
            'blog_category_slug_pt' => strtolower(str_replace(' ', '-', $request->blog_category_name_pt)),
            'created_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Blog Category Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $blog_cat = BlogPostCategory::findOrFail($id);

        return view('admin.backend.blog.category.edit', compact('blog_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_pt' => 'required'
        ]);

        BlogPostCategory::findOrFail($id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_pt' => $request->blog_category_name_pt,
            'blog_category_slug_en' => strtolower(str_replace(' ', '_', $request->blog_category_name_en)),
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_pt)),
            'updated_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Blog Category Updated Sucessfully!',
            'alert-type' => 'info'
        ];

        return redirect()->route('blog.category.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogPostCategory::findOrFail($id)->delete();

        $noti = [
            'message' => 'Blog Category Deleted Sucessfully!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}
