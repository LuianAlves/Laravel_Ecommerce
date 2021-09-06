<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class AdminProfileController extends Controller
{
    public function AdminProfile() {
        $admin = Admin::first();
        return view('admin.profile.admin_profile_view', compact('admin'));
    }

    public function AdminProfileEdit() {
        $edit = Admin::first();
        return view('admin.profile.admin_profile_edit', compact('edit'));
    }

    public function AdminProfileStore(Request $request) {
        $data = Admin::first();

        $data->name = $request->name;
        $data->email = $request->email;
        
        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('dmYHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);

            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePass() {
        return view('admin.profile.admin_change_password');
    }

    public function UpdateChangePass(Request $request) {
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashPassword = Admin::first()->password;
            if(Hash::check($request->oldpassword, $hashPassword)) {
                $admin = Admin::first();
                $admin->password = Hash::make($request->password);
                $admin->save();
                Auth::logout();

                return redirect()->route('admin.logout');
            } else {
                return redirect()->back();
            }
    }
}
