<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PackagePlan;

class AdminController extends Controller
{
    public function adminDashobard(){
        return view('admin.index');
    } //End Menthod


    public function adminLogout(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $username = $data->name;
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => ''.$username.' Logout Succesfully',
            'alert-type' => 'success',
        );

        return redirect('/admin/login')->with($notification);
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
         return view('admin.admin_profile', compact('profileData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $notification = array(
            'message' => 'Admin Profile Update Succesfully',
            'alert-type' => 'success',
        );

        $data->save();
        return redirect()->back()->with($notification);
   
    }

    public function adminPasswordChange(){
         return view('admin.admin_password_change');
    }

    public function AdminUpdatePassword(Request $request){
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

    public function AllAgent(){
        $agent = User::where('role', 'agent')->latest()->get();
        return view('backend.agentuser.all_agent', compact('agent'));
    }

    public function AddAgent(){
        return view('backend.agentuser.add_agent');
    }

    public function StoreAgent(Request $request){
        $user_id = $request->id;
        
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role' => 'agent',
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Password Change Susccesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.agent')->with($notification);
    }

    public function UpdateAgent(Request $request){
        $user_id = $request->id;
        User::findOrfail($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Update Change Susccesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.agent')->with($notification);
    }

    public function EditAgent($id){
        $userAgent = User::find($id);
        return view('backend.agentuser.edit_agent', compact('userAgent'));
    }

    public function DeleteAgent($id){
        $data = User::find($id);
        $agent = $data->name;
        User::findOrfail($id)->delete();
        @unlink(public_path('upload/agent_images/'.$data->photo));
        $notification = array(
            'message' => 'Data '.$agent.' Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.agent')->with($notification);
    }

    public function AdminPackageHistory(){
        $packageHistory = PackagePlan::latest()->get();
        return view('backend.agentuser.package_history', compact('packageHistory'));

    }

    public function AdminPackageInvoice($id){
        $packageHistory = PackagePlan::findOrFail($id);
        $pdf = Pdf::loadView('backend.agentuser.package_history_invoice', compact('packageHistory'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('Invoice Packet '.$packageHistory->package_name.'-' .$packageHistory->user->name. '.pdf');
    }

    

}

