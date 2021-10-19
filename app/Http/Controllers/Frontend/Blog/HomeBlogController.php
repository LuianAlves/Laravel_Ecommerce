<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;

class HomeBlogController extends Controller
{
    public function index() {
        $blog_cat = BlogPostCategory::latest()->get();
        $blog_post = BlogPost::latest()->limit(3)->get();

        return view('app.blog.posts', compact('blog_post', 'blog_cat'));
    }

    public function details($id) {
        $blog_cat = BlogPostCategory::latest()->get();
        $blog_post = BlogPost::findOrFail($id);

        return view('app.blog.details', compact('blog_post', 'blog_cat'));
    }

    public function category($id) {
        $blog_cat = BlogPostCategory::latest()->get();
        $blog_post = BlogPost::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();

        return view('app.blog.category_view', compact('blog_post', 'blog_cat'));
    }
}
