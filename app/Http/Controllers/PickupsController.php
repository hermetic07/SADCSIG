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
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status','tblGunRequests.created_at','clients.name as client','establishments.name as establishment','establishments.address as address','areas.name as area','provinces.name as province','tblGunDeliveries.strGunDeliveryID as deliveryCode','tblGunDeliveries.created_at as dateDelivered')
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
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status','tblGunRequests.created_at','clients.name as client','establishments.name as establishment','establishments.address as address','areas.name as area','provinces.name as province','tblGunDeliveries.strGunDeliveryID as deliveryCode','tblGunDeliveries.created_at as dateDelivered')
                        ->get();
         // return $client;
          return view('AdminPortal.Pickups2')
			   ->with('clients',$clients);
			   
    }
}
