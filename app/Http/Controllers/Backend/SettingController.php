<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class SettingController extends Controller
{
    public function SiteSetting(){
        $siteSetting = SiteSetting::find(1);
        return view('backend.setting.site_setting', compact('siteSetting'));
    }

    public function SettingUpdate(Request $request){
        $oldImage = $request->old_img;
        $image = $request->file('logo');
        if( $image == !NULL){
            $filename = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1500,386)->save('upload/logo/'.$filename);
            $upload_path = 'upload/logo/'.$filename;
            if(file_exists($oldImage)){
                unlink( $oldImage);
            }
        SiteSetting::findOrfail(1)->update([
            'logo' => $upload_path,
            'support_phone' => $request->support_phone,
            'company_address' => $request->company_address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
            'updated_at' => Carbon::now(),
        ]);
        }else{
            SiteSetting::findOrfail(1)->update([
                'logo' => $oldImage,
                'support_phone' => $request->support_phone,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'updated_at' => Carbon::now(),
            ]); 
        }
                
        $notification = array(
            'message' => ' Site Setting Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
       
        
    }
}
