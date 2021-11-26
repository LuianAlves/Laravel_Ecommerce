<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('status', 'DESC')->get();

        return view('admin.backend.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate([]);

        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);

        $noti = array(
            'message' => 'Coupon Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupons = Coupon::findOrFail($id);

        return view('admin.backend.coupon.edit', compact('coupons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([]);

        Coupon::findOrFail($id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now()
        ]);

        $noti = array(
            'message' => 'Coupon Updated Successfully!', 
            'alert-type' => 'info'
        );

        return redirect()->route('coupon.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();

        $noti = array(
            'message' => 'Coupon Deleted Successfully!', 
            'alert-type' => 'error'
        );

        return redirect()->route('coupon.index')->with($noti);
    }


    // ******* Status

    public function active($id) {

        Coupon::findOrFail($id)->update([
            'status' => 1
        ]);

        $noti = array(
            'message' => 'Coupon Active!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($noti);
    }   

    public function inactive($id) {

        Coupon::findOrFail($id)->update([
            'status' => 0
        ]);

        $noti = array(
            'message' => 'Coupon Inactive!',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($noti);
    }   

}
