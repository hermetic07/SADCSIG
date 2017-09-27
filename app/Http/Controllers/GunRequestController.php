<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Clients;
use App\Establishments;
use App\Gun;
use App\GunRequest;
use App\Area;
use App\Province;
use App\GunRequestsDetails;
use App\Contracts;
use App\ClientRegistration;
use App\GunDelivery;
use App\ClaimedDelivery;
use App\ClientCancelRequests;
class GunRequestController extends Controller
{
    
    public function index(){
        $gunRequests = GunRequest::latest('created_at')->get();

        $gunRequestsDetails = GunRequestsDetails::all();
        $clients = Clients::all();
        $establishments = Establishments::all();
        $guns = Gun::all();
        $areas = Area::all();
        $provinces = Province::all();
        $contracts = Contracts::all();
        $clientRegistrations = ClientRegistration::all();

        //return view('AdminPortal.ClientRequests.GunRequests')->with('gunRequests',$gunRequests)->with('clients',$clients)->with('guns',$guns)->with('areas',$areas)->with('provinces',$provinces)->with('establishments',$establishments);
        
      return view('AdminPortal.ClientRequests.Sendgun')->with('gunRequests',$gunRequests)->with('clients',$clients)->with('guns',$guns)->with('areas',$areas)->with('provinces',$provinces)->with('establishments',$establishments)->with('gunRequestsDetails',$gunRequestsDetails)->with('contracts',$contracts)->with('clientRegistrations',$clientRegistrations);
    }
    public function viewGunRequest(Request $request){
        if($request->ajax()){
            $gunRequest = GunRequest::findOrFail($request->gunReqstID);
            $gunRequestDetails = DB::table('tblGunRequests')
                                ->where('tblGunRequests.strGunReqID','=',$request->gunReqstID)
                                ->join('tblGunReqDetails','tblGunReqDetails.strGunReqID','=','tblGunRequests.strGunReqID')
                                //->join('clients','clients.id','=','tblGunRequests.strClientID')
                                ->join('guns','guns.id','=','tblGunReqDetails.strGunID')
                                ->select('tblGunRequests.strGunReqID as orderNo','tblGunReqDetails.quantity','guns.name as gun')
                                ->get();
            $clientCancelRequest = ClientCancelRequests::where('requestID',$request->gunReqstID)->get();
            return view('AdminPortal.ClientRequests.GunRequestComponents.viewModal')
                    ->with('gunRequest',$gunRequest)
                    ->with('gunRequestDetails',$gunRequestDetails)
                    ->with('clientCancelRequest',$clientCancelRequest);
        }
    }
    public function deliveryStats(Request $request){
        if($request->ajax()){
          $gunDelivery = GunDelivery::where('strGunReqID',$request->gunReqstID)->get();
          $claimedDelivery = ClaimedDelivery::where('strGunDeliveryID',$gunDelivery[0]->strGunDeliveryID)->get();
          $gunRequestsDetails = GunRequestsDetails::where('strGunReqID',$request->gunReqstID)->get();
          $guns = Gun::all();
          return view('AdminPortal.ClientRequests.GunRequestComponents.delStatsModal')
                  ->with('gunDelivery',$gunDelivery[0])
                  ->with('claimedDeliveries',$claimedDelivery)
                  ->with('guns',$guns)
                  ->with('gunRequestsDetails',$gunRequestsDetails)
                  ->with('gunRequestID',$request->gunReqstID);
          //return response($gunRequestsDetails);
                  
        }
    }
    public function getGuns(Request $request){
      if($request->ajax()){
        $guns = Gun::where('guntype_id',$request->gunTypeID)->get();
        return view('ClientPortal.formcomponents.table_guns_for_requests')
                ->with('guns',$guns);
      }
    }
    public function remove(Request $request)
     {
         $id = $request -> id;
         $data = GunRequest::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }
}
