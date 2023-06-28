<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Amenities;
use App\Models\PropertyMessage;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function PropertyDetails($id, $slug){
        
        $property = Property::findOrFail($id);
        $amenities = Amenities::latest()->get();
        

        $amen = $property->amenities_id;
        $property_amenites = explode(',', $amen);
        $multiImage = MultiImage::where('property_id',$id)->get();
        return view('frontend.property.property_details', compact('property', 'multiImage','property_amenites','amenities'));
    }

    public function PropertyMessage(Request $request){
        $pid = $request->property_id;
        $aid = $request->agen_id;

        if (Auth::check()) {
            PropertyMessage::insert([
                'user_id' => Auth::user()->id,
                'property_id' => $pid,
                'agent_id' => $aid,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Send Message Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);

        }else{
            $notification = array(
                'message' => 'Please Login Your Account',
                'alert-type' => 'error',
            );  
        }
        
        return redirect()->back()->with($notification);
    }


    // Agent
    public function AgentDetails($id){

        $agents = User::findOrFail($id);

        $property = Property::where('agent_id', $id)->get();

        $fetuaredProperty = Property::where('agent_id', $id)->where('status', '1')->where('featured', '1')->limit(3)->get();

        return view('frontend.agent.agent_details', compact('agents', 'property', 'fetuaredProperty'));
    }
}
