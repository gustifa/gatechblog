<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function agentDashobard(){

        return view('agent.index');
    }//End Method

    public function AgentLogin(){
        return view('agent.agent_login');
    }

    public function AgentRegister(Request $request){
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'role' => 'agent',
            'status' => 'inactive',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::AGENT);
    }

    public function AgentProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
         return view('agent.agent_profile', compact('profileData'));
    }

    public function AgentProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/agent_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/agent_images'),$filename);
            $data['photo'] = $filename;
        }

        $notification = array(
            'message' => 'Admin Profile Update Succesfully',
            'alert-type' => 'success',
        );

        $data->save();
        return redirect()->back()->with($notification);
   
    }

    public function AgentPasswordChange(){
        return view('agent.agent_password_change');
   }

   public function AgentUpdatePassword(Request $request){
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

    public function AgentLogout(Request $request)
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

        return redirect('/agent/login')->with($notification);
    }
}
