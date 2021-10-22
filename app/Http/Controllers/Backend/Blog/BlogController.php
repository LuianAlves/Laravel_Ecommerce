<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use File;
use Image;

use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_post = BlogPost::with('blogCategory')->latest()->get();

        return view('admin.backend.blog.post.index', compact('blog_post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_cat = BlogPostCategory::orderBy('blog_category_name_en', 'ASC')->get();

        return view('admin.backend.blog.post.create', compact('blog_cat'));
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
            'blog_category_id' => 'required',
            'post_title_en' => 'required',
            'post_image' => 'required',
            'post_details_en' => 'required'
        ]);

        $image = $request->file('post_image');
        $gen_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        

        if (File::exists('upload/blog/posts')) {

            Image::make($image)->resize(1920, 1080)->save('upload/blog/posts/'.$gen_name);
            $save_url = 'upload/blog/posts/' . $gen_name;

        } else {
            
            File::makeDirectory('upload/blog/posts/', 0777, true, true);
            Image::make($image)->resize(1920, 1080)->save('upload/blog/posts/'.$gen_name);
            $save_url = 'upload/blog/posts/' . $gen_name;
        }

        BlogPost::insert([
            'blog_category_id' => $request->blog_category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_pt' => $request->post_title_pt,
            'post_slug_en' => strtolower(str_replace(' ', '_', $request->post_title_en)),
            'post_slug_pt' => strtolower(str_replace(' ', '-', $request->post_title_pt)),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_pt' => $request->post_details_pt,
            'created_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Blog Post Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('blog.post.index')->with($noti);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog_post = BlogPost::findOrFail($id);
        $blog_cat = BlogPostCategory::findOrFail($id)->get();

        return view('admin.backend.blog.post.edit', compact('blog_cat', 'blog_post'));
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
            'blog_category_id' => 'required',
            'post_title_en' => 'required',
            'post_details_en' => 'required'
        ]);

        $old_image = $request->old_image;
        
        if($request->file('post_image')) {
            unlink($old_image);
            $image = $request->file('post_image');
            $gen_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1080)->save('upload/blog/posts/'.$gen_name);
            $save_url = 'upload/blog/posts/' . $gen_name;
            
            BlogPost::findOrfail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_pt' => $request->post_title_pt,
                'post_slug_en' => strtolower(str_replace(' ', '_', $request->post_title_en)),
                'post_slug_pt' => strtolower(str_replace(' ', '-', $request->post_title_pt)),
                'post_image' => $save_url,
                'post_details_en' => $request->post_details_en,
                'post_details_pt' => $request->post_details_pt,
                'updated_at' => Carbon::now()
            ]);
        } else {
            
            BlogPost::findOrfail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_pt' => $request->post_title_pt,
                'post_slug_en' => strtolower(str_replace(' ', '_', $request->post_title_en)),
                'post_slug_pt' => strtolower(str_replace(' ', '-', $request->post_title_pt)),
                'post_details_en' => $request->post_details_en,
                'post_details_pt' => $request->post_details_pt,
                'updated_at' => Carbon::now()
            ]);
        }

        $noti = [
            'message' => 'Blog Post Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('blog.post.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogPost::findOrFail($id)->delete();

        $noti = [
            'message' => 'Blog Post Deleted Sucessfully!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}
