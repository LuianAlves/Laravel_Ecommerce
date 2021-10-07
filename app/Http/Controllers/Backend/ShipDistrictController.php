<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use App\Models\ShipDivision;
use Carbon\Carbon;

class ShipDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $states = ShipState::orderBy('state_name', 'ASC')->get();
        $districts = ShipDistrict::with('division')->orderBy('district_name', 'ASC')->get();

        return view('admin.backend.ship.district.index', compact('districts', 'states', 'divisions'));
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
            'district_name' => 'required|unique:ship_districts'
        ]);

        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'state_id' => $request->state_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now()
        ]);

        $noti = array(
            'message' => 'District Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipDistrict  $shipDistrict
     * @return \Illuminate\Http\Response
     */
    // public function show(ShipDistrict $shipDistrict)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipDistrict  $shipDistrict
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $states = ShipState::orderBy('state_name', 'ASC')->get();
        $districts = ShipDistrict::findOrFail($id);

        return view('admin.backend.ship.district.edit', compact('districts', 'states', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipDistrict  $shipDistrict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'division_id' => 'required',
        //     'district_name' => 'required|unique:ship_districts'
        // ]);

        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'state_id' => $request->state_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now()
        ]);

        $noti = array(
            'message' => 'District Updated Successfully!', 
            'alert-type' => 'info'
        );

        return redirect()->route('district.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipDistrict  $shipDistrict
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShipDistrict::findOrFail($id)->delete();

        $noti = array(
            'message' => 'District Deleted Successfully!', 
            'alert-type' => 'error'
        );

        return redirect()->route('district.index')->with($noti);
    }

    // AJAX

    public function getState($division_id) {
        $state = ShipState::where('division_id', $division_id)->orderBy('state_name', 'ASC')->get();

        return json_encode($state);
    }
}
