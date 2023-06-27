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
use App\Models\PropertyMessage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
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
                'agent_id' => $request->agen_id,
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
            $upload_path = 'upload/property/thambnail/'.$filename;
            $save_url = $upload_path;
            $property_id = Property::insertGetId([
                'ptype_id' => $request->ptype_id,
                'amenities_id' => $amenites,
                'agent_id' => $request->agen_id,
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
        $facilities = Count($request->facility_name);
        if($facilities != NULL){
            for ($i=0; $i < $facilities; $i++) { 
                $fcount = new Facility();
                $fcount->property_id = $property_id;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->distance = $request->distance[$i];
                $fcount->save();

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

        $multiImage = MultiImage::where('property_id', $id)->get();


        $propertyType = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role', 'agent')->latest()->get();
        return view('backend.property.edit_property', compact('propertyType', 'property_amenites','activeAgent','amenities','property', 'multiImage'));

    }

    public function UpdatePropertyTumbnail(Request $request){
        $pid = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('property_thambnail');
        $filename = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(370,250)->save('upload/property/thambnail/'.$filename);
        $upload_path = 'upload/property/thambnail/'.$filename;
        if(file_exists($oldImage)){
            unlink( $oldImage);
        }
        Property::findOrFail($pid)->update([
            'property_thambnail' => $upload_path,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' =>  'Property Thumnail Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
    }

    public function UpdateMultiImage(Request $request){

        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $imgDel = MultiImage::findOrFail($id);
            unlink($imgDel->photo_name);
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(720,520)->save('upload/property/multi_image/'.$make_name);
        $upload_path = 'upload/property/multi_image/'.$make_name;

        MultiImage::where('id', $id)->update([
            'photo_name' =>  $upload_path,
            'updated_at' => Carbon::now(),
        ]);

        }


        $notification = array(
            'message' =>  'Multi Image Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
    }

    public function StorePropertyMultiimage(Request $request){
        $NewImage = $request->imageid;
        //dd($NewImage);
        $image = $request->file('multi_img');
        foreach($image as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(720,520)->save('upload/property/multi_image/'.$make_name);
            $upload_path = 'upload/property/multi_image/'.$make_name;
            $save_url = $upload_path;
            $property_id = MultiImage::insert([
                'property_id' => $NewImage,
                'photo_name' =>  $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        

        $notification = array(
            'message' =>  'Multi Image Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
    }

    public function DeleteMultiImage($id){
        $img = MultiImage::find($id);
        unlink($img->photo_name);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' =>  'Multi Image Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
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
            'agent_id' => $request->agent_id,
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
        $property_thumb = $data->property_thambnail;

       
        //$img =  $dataMultiImage;
        // $image = $dataMultiImage->photo_name;
        //dd($img);
        Property::findOrfail($id)->delete();
        if(file_exists($property_thumb)){
            unlink($property_thumb);
        }

        $dataMultiImage = MultiImage::where('property_id',$id)->get();
        foreach($dataMultiImage as $img){
            unlink($img->photo_name);
            MultiImage::where('property_id', $id)->delete();
        }

        $facility = Facility::where('property_id',$id)->get();
        foreach($facility as $item){
            $item->facility_name;
            Facility::where('property_id', $id)->delete();
        }

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

    public function AdminPropertyMessage(){
        $email = Auth::user()->email;
        $message = PropertyMessage::latest()->get();
        return view('backend.message.all_message', compact('message','email'));
    }

    public function AdminMessageDetails($id){
        $email = Auth::user()->email;
        $countMessage = PropertyMessage::latest()->get();
        $messageDetail = PropertyMessage::findOrFail($id);
        // dd($messageDetail);
        return view('backend.message.details_message', compact('messageDetail','countMessage','email'));
    }

}
