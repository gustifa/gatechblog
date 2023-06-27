<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $property_id){
        if(Auth::check()){
            $user = Auth::user()->id;
            $exists = Wishlist::where('user_id',  $user)->where('property_id', $property_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' =>Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added on Your Wishlist']);

            }else{
                return response()->json(['error' => 'This Property Exists Your Wishlist']);
            }
        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }

    } //End Method AddToWishlist


    public function UserWishlistDetails(){
        return view('frontend.property.wishlist_details');
    }

    public function GetWishlistProperty(){
        $wishlist = Wishlist::with('property')->where('user_id', Auth::id())->latest()->get();

        $wishQty = wishlist::count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]); 
    }
}
