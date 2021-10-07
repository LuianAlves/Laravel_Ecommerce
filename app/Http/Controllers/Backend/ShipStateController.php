<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ShipDivision;
use App\Models\ShipState;
use Carbon\Carbon;

class ShipStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = ShipDivision::orderBy('id', 'ASC')->get();
        $states = ShipState::with('division')->orderBy('state_name', 'ASC')->get();

        return view('admin.backend.ship.state.index', compact('divisions', 'states'));
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
            'division_id' => 'required',
            'state_name' => 'required|unique:ship_states',
        ]);

        ShipState::insert([
            'division_id' => $request->division_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now()
        ]);

        $noti = array(
            'message' => 'State Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipState  $shipState
     * @return \Illuminate\Http\Response
     */
    // public function show(ShipState $shipState)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipState  $shipState
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $states = ShipState::findOrFail($id);

        return view('admin.backend.ship.state.edit', compact('divisions', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipState  $shipState
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ShipState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now()
        ]);

        $noti = array(
            'message' => 'State Updated Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('state.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipState  $shipState
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShipState::findOrfail($id)->delete();

        $noti = array(
            'message' => 'State Deleted Successfully!',
            'alert-type' => 'error'
        );

        return redirect()->route('state.index')->with($noti);
    }
}
