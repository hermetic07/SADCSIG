<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GunDelivery;
use App\GunDeliveryDetails;
use App\Gun;
use App\GunRequest;
use Carbon\Carbon;

class GunDeliveryController extends Controller
{
    public function adminDeliveries(){

        $gunDeliveries = GunDelivery::all();
        $gunDeliveryDetails = GunDeliveryDetails::all();
        return view('AdminPortal.ClientRequests.GunDeliveriesAdmin')->with('gunDeliveries',$gunDeliveries)->with('gunDeliveryDetails',$gunDeliveryDetails);
    }
    public function saveDelivery(Request $request){
    	 $ctr2 = 0;
     	 $ctr3 = 0;

     	 $gunDeliveryID = "GUNDELV-".GunDelivery::get()->count();;
    	for($ctr = 0; $ctr<$request->gunCount ; $ctr++){
            $qtyOrder = "qtyOrder".((string)$ctr);
    		$qty = "qty".((string)$ctr);
    		$gunID = "gunID".((string)$ctr);
    		if($request->$qty != null){
    			$ctr2++;
    			if($ctr2 == 1){
    				GunDelivery::create(['strGunDeliveryID'=>$gunDeliveryID,'strGunReqID'=>$request->gunReqstID,'status'=>"ONDELIVERY",'dateTimeReceived'=>Carbon::now()]);
    			}
    			$strGunDelivDetailsID = "GUNDELVDTLS-".GunDeliveryDetails::get()->count();
    			GunDeliveryDetails::create(['strGunDeliveryDetailsID'=>$strGunDelivDetailsID,'strGunDeliveryID'=>$gunDeliveryID,'strGunID'=>$request->$gunID,'qtyOrdered'=>$request->$qtyOrder,'quantity'=>$request->$qty]);
                GunRequest::findOrFail($request->gunReqstID)->update(['status'=>'active']);
    		}
    	}
    	return redirect('/GunRequest');
    }

    public function claim(Request $request)
     {
         $id = $request -> id;
         $data = GunDelivery::findOrFail($id);
         $data->status = "CLAIMED";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }

     public function remove(Request $request)
     {
         $id = $request -> id;
         $data = GunDelivery::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }
}
