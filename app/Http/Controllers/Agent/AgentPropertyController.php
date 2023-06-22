<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\User;
use App\Models\PackagePlan;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AgentPropertyController extends Controller
{
    public function AgentAllproperty(){
        $id = Auth::user()->id;
        $property = Property::where('agen_id', $id)->latest()->get();
        return view('agent.property.all_property', compact('property'));
    }

    public function AgentAddproperty(){
        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();

        $id = Auth::user()->id;
        $property = User::where('role', 'agent')->where('id', $id)->first();
        $pcount = $property->credit;

        if($pcount == 3 || $pcount == 9 ){
            return redirect()->route('buy.package');
        }else {
            return view('agent.property.add_property', compact('propertyType', 'amenities'));
        }
        
    }

    public function AgentStoreProperty(Request $request){
        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;
        $amen = $request->amenities_id;
        $amenites = implode(",", $amen );
        // dd($amenites);
        $pcode = IdGenerator::generate(['table' => 'properties', 'field' => 'property_code', 'length' => 5, 'prefix' => 'PC']);
        $data_thumbnail = $request->file('property_thambnail');
        if($data_thumbnail  == NULL){
            $property_id = Property::insertGetId([
                'ptype_id' => $request->ptype_id,
                'amenities_id' => $amenites,
                'agen_id' => $id,
                'property_name' => $request->property_name,
                'property_slug' => strtolower(str_replace(' ', '-',$request->property_name )),
                'property_code' => $pcode,
                'property_status' => $request->property_status,
                'lowest_price' => $request->lowest_price,
                'max_price' => $request->max_price,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'garage' => $request->garage,
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'garage_size' => $request->garage_size,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'portal_code' => $request->portal_code,
                'property_size' => $request->property_size,
                'property_video' => $request->property_video,
                'neighborhood' => $request->neighborhood,
                'latitude' => $request->latitude,
                'logitude' => $request->logitude,
                'status' => 1,
                'featured' => $request->featured,
                'hot' => $request->hot,
                'created_at' => Carbon::now(),
            ]);
        }else{
            $image = $request->file('property_thambnail');
        $filename = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(370,250)->save('upload/property/thambnail/'.$filename);
        $save_url = $filename;
            $property_id = Property::insertGetId([
                'ptype_id' => $request->ptype_id,
                'amenities_id' => $amenites,
                'agen_id' => $id,
                'property_name' => $request->property_name,
                'property_slug' => strtolower(str_replace(' ', '-',$request->property_name )),
                'property_code' => $pcode,
                'property_status' => $request->property_status,
                'lowest_price' => $request->lowest_price,
                'max_price' => $request->max_price,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'garage' => $request->garage,
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'garage_size' => $request->garage_size,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'portal_code' => $request->portal_code,
                'property_size' => $request->property_size,
                'property_video' => $request->property_video,
                'neighborhood' => $request->neighborhood,
                'latitude' => $request->latitude,
                'logitude' => $request->logitude,
                'status' => 1,
                'property_thambnail' => $save_url,
                'featured' => $request->featured,
                'hot' => $request->hot,
                'created_at' => Carbon::now(),
    
                
            ]);
        }
        
        if($request->file('multi_img') == !NULL){
                $images = $request->file('multi_img');
                foreach($images as $img){
                    $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                    Image::make($img)->resize(720,520)->save('upload/property/multi_image/'.$make_name);
                    $upload_path = 'upload/property/multi_image/'.$make_name;
                    MultiImage::insert([
                        'property_id' => $property_id,
                        'photo_name' => $upload_path,
                        'created_at' => Carbon::now(),
                    ]);
            }
        }
        User::where('id', $id)->update([
            'credit' => DB::raw('1+ '.$nid),

        ]);

        $notification = array(
            'message' => 'Property ID '.$property_id.' Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('agent.all.property')->with($notification);
    }

    public function AgentDeleteProperty($id){
        $data = Property::find($id);
        $property = $data->property_name;
        Property::findOrfail($id)->delete();
        @unlink(public_path('upload/property/thambnail/'.$data->property_thambnail));
        $notification = array(
            'message' => 'Data '.$property.' Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('agent.all.property')->with($notification);
    }

    public function PackageHistory(){
        $id = Auth::user()->id;
        $packageHistory = PackagePlan::where('user_id',$id)->get();
        return view('agent.package.all_package', compact('packageHistory'));
    }

    public function BuyPackage(){
        return view('agent.package.buy_package');
    }

    public function BuybussinessPlan(){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('agent.package.buy_bussiness', compact('data'));
    }

    public function StoreBussinessPlan(Request $request){
        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;
        PackagePlan::insert([
            'user_id' => $id,
            'package_name' => 'Bussiness',
            'package_credits' => '3',
            'invoice' => 'ERS'.mt_rand(1000000,99999999),
            'package_amount' => '20',
            'created_at' => Carbon::now(),

        ]);
        User::where('id', $id)->update([
            'credit' => DB::raw('3+ '.$nid),

        ]);
        $notification = array(
            'message' => 'Package Bussiness Create Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('agent.all.property');
    }

    public function AgentPackageInvoice($id){
        $packageHistory = PackagePlan::where('id', $id)->first();
        $pdf = Pdf::loadView('agent.package.package_history_invoice', compact('packageHistory'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('Invoice Packet '.$packageHistory->package_name.'-' .$packageHistory->user->name. '.pdf');
    }
}
