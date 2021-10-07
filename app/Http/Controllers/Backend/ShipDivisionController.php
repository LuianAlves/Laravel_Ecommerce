<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use Carbon\Carbon;

class ShipDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();

        return view('admin.backend.ship.division.index', compact('divisions'));
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
        $request->validate([
            'division_name' => 'required|unique:ship_divisions'
        ]);
        
        ShipDivision::insert([
            'division_name' => $request->division_name
        ]);

        $noti = array(
            'message' => 'Division Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipDivision  $shipDivision
     * @return \Illuminate\Http\Response
     */
    // public function show(ShipDivision $shipDivision)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipDivision  $shipDivision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisions = ShipDivision::findOrFail($id);

        return view('admin.backend.ship.division.edit', compact('divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipDivision  $shipDivision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'division_name' => 'required|unique:ship_divisions'
        ]);
        
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now()
        ]);

        $noti = array(
            'message' => 'Division Updated Successfully!', 
            'alert-type' => 'info'
        );

        return redirect()->route('division.index')->with($noti);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipDivision  $shipDivision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShipDivision::findOrFail($id)->delete();

        $noti = array(
            'message' => 'Division Deleted Successfully!', 
            'alert-type' => 'error'
        );

        return redirect()->route('division.index')->with($noti);

    }
}
