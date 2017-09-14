<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\GunDelivery;

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
                        ->orderBy('tblGunDeliveries.created_at','desc')
                        ->get();
         // return $client;
          return view('AdminPortal.Pickups')
			   ->with('clients',$clients)
			   ->with('gunDeliveryId',$gunDeliveryId);
    }

    public function index2(){
    	$clients = DB::table('tblGunRequests')
                        ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                        ->where('tblGunDeliveries.admin_del','!=','1')
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status','tblGunRequests.created_at',
                            'clients.first_name as client_fname',
                            'clients.middle_name as client_mname',
                            'clients.last_name as client_lname','establishments.name as establishment','establishments.address as address','areas.name as area','provinces.name as province','tblGunDeliveries.strGunDeliveryID as deliveryCode','tblGunDeliveries.created_at as dateDelivered',
                                'tblGunDeliveries.status as gunDelvStatus')
                        ->orderBy('tblGunDeliveries.created_at','desc')
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
                                ->select('guns.name as gun',
                                    'guns.id as gunID',
                                    'gunType.name as gunType',
                                    'tblClaimeddelivery.serialNo as serialNo',
                                    'tblClaimeddelivery.status as status')
                                 ->get();   
            $delivery = DB::table('tblGunDeliveries')
                            ->where('tblGunDeliveries.strGunDeliveryID','=',$request->deliveryCode)
                            ->get();
            return view('AdminPortal.ClientRequests.Pickups.showDetail_modal')
                        ->with('claimedDeliveries',$claimedDeliveries)
                        ->with('delivery',$delivery[0]);
        }
    }
    public function deliverReplacement(Request $request){
        if($request->ajax()){
            $unclaimed_items_serials = Input::get('unclaimed_items_serials');
            $unclaimed_items_id = Input::get('unclaimed_items_id');
            //return $request->toArray();
            //$gunDeliveryID = $request->gunDeliveryID;

             $gunDeliveryID = "GUNDELV-".GunDelivery::get()->count();
            // $guns = DB::table('Guns')
            //             ->join('gunType','guns.guntype_id','=','gunType.id')
            //             ->join('tblGunReqDetails',function($join){
            //                 $join->on('tblGunReqDetails.strGunReqDetailsID','=',$request->gunReqstID)
            //                      ->on('tblGunReqDetails.strGunID','=','Guns.id');
            //             })
            //             ->select('guns.name as gun','guns.id as gunID','gunType.name as gunType','tblGunReqDetails.quantity as qtyOrdered')
            //             ->get();

            $guns = DB::table('tblGunDeliveries')
                                ->where('tblGunDeliveries.strGunDeliveryID','=',$request->gunDeliveryID)
                                ->join('tblclaimeddelivery','tblGunDeliveries.strGunDeliveryID','=','tblclaimeddelivery.strGunDeliveryID')
                                
                                ->where('tblclaimeddelivery.status','=','UNCLAIMED')
                                //->join('clients','clients.id','=','tblGunRequests.strClientID')
                                ->join('guns','guns.id','=','tblclaimeddelivery.strGunID')
                                ->join('gunType','guns.guntype_id','=','gunType.id')
                                ->select('guns.name as gun','guns.id as gunID','gunType.name as gunType','tblclaimeddelivery.serialNo')
                                ->get();

            return view('AdminPortal.ClientRequests.Pickups.delRepl_modal')
                                    ->with('guns',$guns)
                                    ->with('unclaimed_items_serials',$unclaimed_items_serials)
                                    ->with('unclaimed_items_id',$unclaimed_items_id)
                                    ->with('gunDeliveryID',$gunDeliveryID)
                    ;
                       // return response($gunRequestDetails);

            
        }
    }

    public function redelivery(){
        
    }
}
