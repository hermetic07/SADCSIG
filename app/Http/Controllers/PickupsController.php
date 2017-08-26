<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PickupsController extends Controller
{
    public function index($gunDeliveryId){
    	// $gunDeliveryDetails = DB::table('tblGunDeliveries')
    	// 	->where('tblGunDeliveries.strGunDeliveryID','=','$gunDeliveryId')
    	// 	->join('tblGunReqDetails','tblGunReqDetails.strGunDeliveryID','=','tblGunDeliveries.strGunDeliveryID')
    	// 	->get();

    	$clients = DB::table('tblGunRequests')
                        ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                        ->where('tblGunDeliveries.strGunDeliveryID','=',$gunDeliveryId)
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status','tblGunRequests.created_at',
                            'clients.first_name as client_fname',
                            'clients.middle_name as client_mname',
                            'clients.last_name as client_lname','establishments.name as establishment','establishments.address as address','areas.name as area','provinces.name as province','tblGunDeliveries.strGunDeliveryID as deliveryCode','tblGunDeliveries.created_at as dateDelivered')
                        ->get();
         // return $client;
          return view('AdminPortal.Pickups')
			   ->with('clients',$clients)
			   ->with('gunDeliveryId',$gunDeliveryId);
    }

    public function index2(){
    	$clients = DB::table('tblGunRequests')
                        ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                        
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status','tblGunRequests.created_at',
                            'clients.first_name as client_fname',
                            'clients.middle_name as client_mname',
                            'clients.last_name as client_lname','establishments.name as establishment','establishments.address as address','areas.name as area','provinces.name as province','tblGunDeliveries.strGunDeliveryID as deliveryCode','tblGunDeliveries.created_at as dateDelivered')
                        ->get();
         // return $client;
          return view('AdminPortal.Pickups2')
			   ->with('clients',$clients);
			   
    }
    public function show(Request $request){
        if($request->ajax()){
            $claimedDeliveries = DB::table('tblClaimeddelivery')
                                 ->where('tblClaimeddelivery.strGunDeliveryID','=',$request->deliveryCode)
                                ->join('guns','guns.id','=','tblClaimeddelivery.strGunID')
                                ->join('gunType','guns.guntype_id','=','gunType.id')
                                ->select('guns.name as gun','gunType.name as gunType','tblClaimeddelivery.serialNo as serialNo')
                                 ->get();   
            $delivery = DB::table('tblGunDeliveries')
                            ->where('tblGunDeliveries.strGunDeliveryID','=',$request->deliveryCode)
                            ->get();
            return view('AdminPortal.ClientRequests.Pickups.showDetail_modal')
                        ->with('claimedDeliveries',$claimedDeliveries)
                        ->with('delivery',$delivery[0]);
        }
    }
}
