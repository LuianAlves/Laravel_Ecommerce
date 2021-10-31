<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\ProductReview;
use Carbon\Carbon;
use Auth;

class ProductReviewController extends Controller
{
    // Dashboard
    public function pedding()
    {
        $reviews = ProductReview::where('status', 0)->latest()->get();

        return view('admin.backend.users_reviews.index', compact('reviews'));
    }

    public function publish(){
        $reviews = ProductReview::where('status', '!=', 0)->latest()->get();

        return view('admin.backend.users_reviews.all_reviews', compact('reviews'));
    }

    public function aprove($id) {
        $ewview = ProductReview::where('id', $id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);
        
        $noti = [
            'message' => 'Review Aproved',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }

    public function recuse($id) {
        $ewview = ProductReview::where('id', $id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()
        ]);
        
        $noti = [
            'message' => 'Review Recused',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }

    // ==========================

    // Form no Frontend
    public function store(Request $request)
    {
        // $request->validate([]);

        $product = $request->product_id;

        ProductReview::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'rating' => $request->quality,
            'comment' => $request->comment,
            'summary' => $request->summary,
            'created_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Review Will Aprove By Admin',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }
  
}
