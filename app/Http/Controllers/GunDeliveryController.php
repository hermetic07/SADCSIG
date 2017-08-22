<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request,$gunRequestID){
        $gunRequest = GunRequest::findOrFail($gunRequestID);
        $gunRequest['isRead'] = 1;
        $gunRequests = DB::table('tblGunRequests')
                        
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status','tblGunRequests.created_at','clients.name as client','establishments.name as establishment','establishments.address as address','areas.name as area','provinces.name as province')
                        ->get();
        if($gunRequest->save()){
            return view('AdminPortal/DeliverGuns')
                ->with('gunRequestID',$gunRequest->strGunReqID)
                ->with('gunRequests',$gunRequests);
            }else{
                return "Earl Pogi- Something Went wrong!!";
            }

        
    }
    public function view(Request $request){
        if($request->ajax()){
            $gunRequest = GunRequest::findOrFail($request->gunReqstID);
            $gunRequestDetails = DB::table('tblGunRequests')
                                ->where('tblGunRequests.strGunReqID','=',$request->gunReqstID)
                                ->join('tblGunReqDetails','tblGunReqDetails.strGunReqID','=','tblGunRequests.strGunReqID')
                                //->join('clients','clients.id','=','tblGunRequests.strClientID')
                                ->join('guns','guns.id','=','tblGunReqDetails.strGunID')
                                ->select('tblGunRequests.strGunReqID as orderNo','tblGunReqDetails.quantity','guns.name as gun')
                                ->get();
            
            return view('AdminPortal.ClientRequests.GunDeliveries.viewModal')
                    ->with('gunRequest',$gunRequest)
                    ->with('gunRequestDetails',$gunRequestDetails);
        }
    }
    public function table(Request $request){
        if($request->ajax()){
            $gunRequests = DB::table('tblGunRequests')
                        ->where('isRead','=','1')
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status','tblGunRequests.created_at','clients.name as client','establishments.name as establishment','establishments.address as address','areas.name as area','provinces.name as province')
                        ->get();
            return view('AdminPortal.ClientRequests.GunDeliveries.table_gunDeliveries')
                    ->with('gunRequests',$gunRequests)
                    ->with('gunRequestID',$request->gunRequestID);
        }
        else {
            return response("Something went wrong !!!!");
        }
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
