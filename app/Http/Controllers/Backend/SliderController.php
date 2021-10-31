<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Carbon\Carbon;
use Image;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.backend.slider.index', compact('sliders'));
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
        $request->validate(['slider_image' => 'required']);

        if (!File::exists('upload/sliders')) {
            File::makeDirectory('upload/sliders/', 0777, true, true);
        }

            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1080)->save('upload/sliders/'.$name_gen);
            $save_url = 'upload/sliders/'.$name_gen;

            $slider = Slider::insert([
                'slider_image' => $save_url,
                'title_en' => $request->title_en,
                'title_pt' => $request->title_pt,
                'description_en' => $request->description_en,
                'description_pt' => $request->description_pt,
            ]);

        $noti = array(
            'message' => 'Slider Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::findOrFail($id);

        return view('admin.backend.slider.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

            if($request->file('slider_image')) {

                unlink($old_img);
                $image = $request->file('slider_image');
                $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(1920, 1080)->save('upload/sliders/'.$name_gen);
                $save_url = 'upload/sliders/'.$name_gen;

                Slider::findOrFail($slider_id)->update([
                    'slider_image' => $save_url,
                    'title_en' => $request->title_en,
                    'title_pt' => $request->title_pt,
                    'description_en' => $request->description_en,
                    'description_pt' => $request->description_pt,
                ]);

            } else {

                Slider::findOrFail($slider_id)->update([
                    'title_en' => $request->title_en,
                    'title_pt' => $request->title_pt,
                    'description_en' => $request->description_en,
                    'description_pt' => $request->description_pt,
                ]);
            }

        $noti = array(
            'message' => 'Slider Updated Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('slider.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $delete_image = $slider->slider_image;
        unlink($delete_image);

        Slider::findOrFail($id)->delete();

        $noti = array(
            'message' => 'Slider Deleted Successfully!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($noti);
    }

    // **************** Status *********************** //
    public function active($id) {
        Slider::findOrFail($id)->update([
            'status' => 1
        ]);

        $noti = array(
            'message' => 'Slider Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($noti);
    }

    public function inactive($id) {
        Slider::findOrFail($id)->update([
            'status' => 0
        ]);

        $noti = array(
            'message' => 'Slider Inactive',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($noti);
    }
}
