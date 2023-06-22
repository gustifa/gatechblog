<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }

    public function FrontendLogin(){
        return view('frontend.frontend_login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.edit_profile', compact('profileData'));
    }

    public function UserLogout(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $name = $data->name;
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => ''.$name.' Logout Succesfully',
            'alert-type' => 'success',
        );

        return redirect('/login')->with($notification);
    }

    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->updated_at = Carbon::now();
        
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }

        $notification = array(
            'message' => 'User Profile Update Succesfully',
            'alert-type' => 'success',
        );

        $data->save();
        return redirect()->back()->with($notification);
   
    }

    public function UserPasswordChange(){
        return view('frontend.dashboard.edit_password');
   }

   public function UserUpdatePassword(Request $request){
    //Validate
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed',
    ]);
    ///Match teh old password
    if (!Hash::check($request->old_password, auth::user()->password)) {
        $notification = array(
            'message' => 'Old Password Does Not Match!',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }

    ///Update New Password
    User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)
    ]);
    $notification = array(
        'message' => 'Password Change Susccesfully',
        'alert-type' => 'success'
    );
    return back()->with($notification);

} //End Method


}
