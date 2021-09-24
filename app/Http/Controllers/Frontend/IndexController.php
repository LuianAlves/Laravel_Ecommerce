<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Slider;
use App\Models\Product;

use App\Models\User;
use Auth;
use Hash;

class IndexController extends Controller
{
    // Index Page
    public function index() {
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $category = Category::orderBy('category_name_en', 'ASC')->get(); // Sidebar/Navbar
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get(); // Sliders

        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals', 1)->orderBy('discount_price', 'DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer', 1)->orderBy('discount_price', 'DESC')->limit(4)->get(); 
        $special_deals = Product::where('special_deals', 1)->orderBy('discount_price', 'DESC')->limit(4)->get(); 

        return view('app.index', compact('category', 'sliders', 'products', 'featured', 'hot_deals', 'special_offer', 'special_deals'));
    }

    // Logout Profile
    public function Logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    // Edit Profile -- Encaminhar pra view
    public function Profile() {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('app.profile.user_profile_update', compact('user'));
    }

    // Update Profile
    public function Store(Request $request) {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('d_m_Y__Hi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'), $filename);

            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.home')->with($notification);
        
    }

    // Change Password -- encaminhar pra view
    public function ChangePass() {
       return view('app.profile.user_profile_change_password');
    }

    // Charge Password
    public function PassUpdate(Request $request) {
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashPassword = User::first()->password;
            if(Hash::check($request->oldpassword, $hashPassword)) {
                $admin = User::first();
                $admin->password = Hash::make($request->password);
                $admin->save();
                Auth::logout();

                return redirect()->route('user.logout');
            } else {
                return redirect()->back();
            }
    }
}
