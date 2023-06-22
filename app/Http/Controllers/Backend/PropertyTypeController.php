<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Amenities;

class PropertyTypeController extends Controller
{
    public function AllType(){
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    }

    public function AddType(){
        return view('backend.type.add_type');
    }

    public function StoreType(Request $request){
        //Validate
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'icon_name' => 'required',
        ]);
        PropertyType::insert([
            'type_name' => $request->type_name,
            'icon_name' => $request->icon_name,
        ]);
        $notification = array(
            'message' => 'Property Type Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    }

    public function EditType($id){
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type', compact('types'));

    }

    public function UpdateType(Request $request){
        
        $pid = $request->id;
        $data = PropertyType::find($pid);
        $dataType = $data->type_name;
        PropertyType::findOrfail($pid)->update([
            'type_name' => $request->type_name,
            'icon_name' => $request->icon_name,
        ]);
        $notification = array(
            'message' => 'Property Type '.$dataType.' Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    }

    public function DeleteType($id){
        $data = PropertyType::find($id);
        $dataType = $data->type_name;
        PropertyType::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Property Type '.$dataType.' Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    }

    // Amenities
    public function AllAmenities(){
        $types = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('types'));
    }

    public function AddAmenities(){
        return view('backend.amenities.add_amenities');
    }

    public function StoreAmenities(Request $request){
        //Validate
        $request->validate([
            'amenities_name' => 'required|unique:amenities|max:200',
        ]);
        Amenities::insert([
            'amenities_name' => $request->amenities_name,
        ]);
        $notification = array(
            'message' => 'Property Type Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenities')->with($notification);
    }

    public function EditAmenities($id){
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenities', compact('amenities'));

    }

    public function UpdateAmenities(Request $request){
        
        $pid = $request->id;
        $data = Amenities::find($pid);
        $amenities_name = $data->amenities_name;
        Amenities::findOrfail($pid)->update([
            'amenities_name' => $request->amenities_name,
        ]);
        $notification = array(
            'message' => ''.$amenities_name.' Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenities')->with($notification);
    }

    public function DeleteAmenities($id){
        $data = Amenities::find($id);
        $dataType = $data->amenities_name;
        Amenities::findOrfail($id)->delete();
        $notification = array(
            'message' => ''.$dataType.' Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenities')->with($notification);
    }


    
}
