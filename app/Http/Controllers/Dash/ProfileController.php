<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isEmpty;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:profile-list|profile-settings', ['only' => ['index']]);
        $this->middleware('permission:profile-settings', ['only' => ['accountSettings']]);
        $this->middleware('permission:profile-edit-basicInfo', ['only' => ['updateBasicInfo']]);
        $this->middleware('permission:profile-edit-email', ['only' => ['updateEmail']]);
        $this->middleware('permission:profile-edit-password', ['only' => ['updatePassword']]);
    }
    public function index(){
        return view('dashboard.profile.index');
    }

    public function accountSettings(){
        return view('dashboard.profile.settings');
    }

    public function updateBasicInfo(Request $request){

        Admin::updateImage($request, Auth::user()->image_path);
        Auth::guard('admin')->user()->update($request->except('email'));

        return redirect()->route('dashboard.profile.settings')->with([
            'success' => 'Profile Updated Successfully'
        ]);
    }

    public function updateEmail(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Hash::check($request->password, Auth::guard('admin')->user()->password)){
            Auth::guard('admin')->user()->update($request->only('email'));
            return redirect()->route('dashboard.profile.settings')->with([
                'success' => 'Email Address Updated Successfully'
            ]);
        }else{
            return redirect()->route('dashboard.profile.settings')->with([
                'error' => 'Wrong Password'
            ]);
        }
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Check if the current password matches the authenticated user's password
                    if (!Hash::check($value, Auth::guard('admin')->user()->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'new_password' => 'required|string|min:8|confirmed', // Ensure 'new_password_confirmation' field is present and matches 'new_password'
        ]);

        $user = Auth::guard('admin')->user();
        $user->password = Hash::make($request->new_password);
        $user->save();


        return redirect()->route('dashboard.profile.settings')->with([
            'success' => 'Password Updated Successfully'
        ]);

    }
}
