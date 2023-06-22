<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;


class PropertyController extends Controller
{
    public function AllProperty(){
        $property = Property::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role', 'agent')->latest()->get();
        return view('backend.property.all_property', compact('property', 'amenities', 'activeAgent'));
    }

    public function AddProperty(){
        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role', 'agent')->latest()->get();
        return view('backend.property.add_property', compact('propertyType', 'amenities', 'activeAgent'));
    }

    public function StoreProperty(Request $request){
        $amen = $request->amenities_id;
        $amenites = implode(",", $amen );
        // dd($amenites);
        $pcode = IdGenerator::generate(['table' => 'properties', 'field' => 'property_code', 'length' => 5, 'prefix' => 'PC']);
        $data_thumbnail = $request->file('property_thambnail');
        if($data_thumbnail  == NULL){
            $property_id = Property::insertGetId([
                'ptype_id' => $request->ptype_id,
                'amenities_id' => $amenites,
                'agen_id' => $request->agen_id,
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
                'agen_id' => $request->agen_id,
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

        $notification = array(
            'message' => 'Property ID '.$property_id.' Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
    }

    public function EditProperty($id){
        $property = Property::findOrFail($id);
        $amen = $property->amenities_id;
        $property_amenites = explode(',', $amen );
        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role', 'agent')->latest()->get();

        return view('backend.property.edit_property', compact('propertyType', 'property_amenites','activeAgent','amenities','property'));

    }

    public function UpdateProperty(Request $request){
        $amen = $request->amenities_id;
        $amenites = implode(",", $amen );
        $property_id = $request->id;
        $data = Property::find($property_id);
        $dataProperty = $data->property_name;
        Property::findOrfail($property_id)->update([
            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenites,
            'agen_id' => $request->agen_id,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-',$request->property_name )),
            'property_status' => $request->property_status,

            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'garage_size' => $request->garage_size,

            'property_size' => $request->property_size,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'portal_code' => $request->portal_code,
            'property_video' => $request->property_video,

            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'logitude' => $request->logitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => ' '.$dataProperty.' Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
    }
    public function Detailproperty($id){
        $property = Property::findOrFail($id);
        $amen = $property->amenities_id;
        $property_amenites = explode(',', $amen );
        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role', 'agent')->latest()->get();
        return view('backend.property.detail_property', compact('propertyType', 'property_amenites','activeAgent','amenities','property'));
    }

    public function DeleteProperty($id){
        $data = Property::find($id);
        $property = $data->property_name;
        Property::findOrfail($id)->delete();
        @unlink(public_path('upload/property/thambnail/'.$data->property_thambnail));
        $notification = array(
            'message' => 'Data '.$property.' Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
    }

    public function InactiveProperty(Request $request){
        $pid = $request->id;
        Property::findOrFail($pid)->update([
            'status' => 0,
        ]);

        $notification = array(
            'message' => 'Property Inactive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);

    }
    public function ActiveProperty(Request $request){
        $pid = $request->id;
        Property::findOrFail($pid)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Property Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);

    }
}
