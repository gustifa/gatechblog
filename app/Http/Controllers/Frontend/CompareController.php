<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\User;
use App\Models\PropertyMessage;
use App\Models\Compare;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;

class CompareController extends Controller
{
    public function AddComparelist(Request $request, $property_id){
        if(Auth::check()){
            $user = Auth::user()->id;
            $exists = Compare::where('user_id',  $user)->where('property_id', $property_id)->first();

            if (!$exists) {
                Compare::insert([
                    'user_id' =>Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added on Your Compare']);

            }else{
                return response()->json(['error' => 'This Property Exists Your Compare']);
            }
        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }

    } //End Method AddToWishlist

    public function UserCompareDetails(){
        return view('frontend.property.comparelist_details');
    }

    public function GetCompareProperty(){
        $compare = Compare::with('property')->where('user_id', Auth::id())->latest()->get();

        $compareQty = compare::count();

        return response()->json(['compare' => $compare, 'compareQty' => $compareQty]); 
    }

    public function CompareRemove($id){
        Compare::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully Property Remove']);
    }
}
