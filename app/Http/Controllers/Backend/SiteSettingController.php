<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SiteSetting;

use Carbon\Carbon;
use Image;
use File;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SiteSetting::latest()->limit(1)->get();

        return view('admin.site_settings.index', compact('settings'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([]);

        if($request->file('logo')) {
            $image = $request->file('logo');
            $gen_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            if (File::exists('upload/settings/logo/')) {
                Image::make($image)->resize(300, 200)->save('upload/settings/logo/'.$gen_name);
                $save_url = 'upload/settings/logo/'.$gen_name;

            } else {
                File::makeDirectory('upload/settings/logo/', 0777, true, true);
                Image::make($image)->resize(300, 200)->save('upload/settings/logo/'.$gen_name);
                $save_url = 'upload/settings/logo/'.$gen_name;
            }

            SiteSetting::insert([
                'logo' => $save_url,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'created_at' => Carbon::now()
            ]);

        } else {

            SiteSetting::insert([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'created_at' => Carbon::now()
            ]);
        }

        $noti = [
            'message' => 'Settings Inserted Sucessfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = SiteSetting::findOrFail($id);

        return view('admin.site_settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([]);

        $logo_image = SiteSetting::findOrFail($id);
        $old_image = $request->old_img;

        if($request->file('logo')) {

            if($old_image != null) {
                unlink($old_image);
            }

            $image = $request->file('logo');
            $gen_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 200)->save('upload/settings/logo/'.$gen_name);
            $save_url = 'upload/settings/logo/'.$gen_name;
            
            SiteSetting::findOrFail($id)->update([
                'logo' => $save_url,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'updated_at' => Carbon::now()
            ]);

        } else {

            SiteSetting::findOrFail($id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'updated_at' => Carbon::now()
            ]);
        }

        $noti = [
            'message' => 'Settings Updated Sucessfully!',
            'alert-type' => 'info'
        ];

        return redirect()->route('setting.site.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $settings = SiteSetting::find($id);

        if (File::exists($settings->logo)) {
            unlink($settings->logo);
        }

        $settings->delete();

        $noti = [
            'message' => 'Settings Deleted Sucessfully!',
            'alert-type' => 'error'
        ];

        return redirect()->route('setting.site.index')->with($noti);

    }
}
