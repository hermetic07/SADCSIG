<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GunDelivery;
use App\GunDeliveryDetails;
use App\Gun;
use App\GunRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Contracts;
use App\ContractGuns;

class InitialDeliveryController extends Controller
{
    public function initialGunDelv($contractID){
        $contract_guns = DB::table('contract_guns')
            ->where('contract_id','=',$contractID)
            ->get();
        //return $contract_guns->toArray();
            $contract = Contracts::findOrFail($contractID);
       
        $gunRequests =  DB::table('contract_guns')
                        ->where('contract_guns.contract_id','=',$contractID)
                        ->join('contracts','contracts.id','=','contract_guns.contract_id')
                        ->join('client_registrations','client_registrations.contract_id','=','contract_guns.contract_id')
                        ->join('clients','clients.id','=','client_registrations.client_id')
                        ->join('establishments','establishments.id','=','contracts.strEstablishmentID')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('contract_guns.contract_id as strGunReqID',
                            'contract_guns.status',
                            'contract_guns.created_at',
                            'clients.first_name as client_fname',
                            'clients.middle_name as client_mname',
                            'clients.last_name as client_lname',
                            'establishments.name as establishment',
                            'establishments.address as address',
                            'areas.name as area',
                            'provinces.name as province')
                        ->orderBy('contract_guns.created_at','desc')
                        ->get();
        
            return view('AdminPortal.ClientRequests.Contracts.InitialGunDelivery')
                
                ->with('gunRequests',$gunRequests);
        
    }
    public function initialDelivery(Request $request){
        if($request->ajax()){
            $gunRequestDetails = DB::table('contract_guns')
                                ->where('contract_id','=',$request->gunReqstID)
                                ->join('guns','guns.id','=','contract_guns.gun_id')
                                ->join('gunType','guns.guntype_id','=','gunType.id')
                                ->select('guns.name as gun','guns.id as gunID','gunType.name as gunType','contract_guns.quantity')
                                ->get();
            return view('AdminPortal.ClientRequests.GunDeliveries.deliver')
                    ->with('gunReqstID',$request->gunReqstID)
                    ->with('gunRequestDetails',$gunRequestDetails);
        }
    }
    public function viewInitDelivery(Request $request){
        if($request->ajax()){
            //$contract_guns = ContractGuns::findOrFail();
           // $gunRequest = GunRequest::findOrFail($request->gunReqstID);
            $gunRequestDetails = DB::table('contract_guns')
                                ->where('contract_guns.contract_id','=',$request->gunReqstID)
                                
                                ->join('guns','guns.id','=','contract_guns.gun_id')
                                ->select('contract_guns.contract_id as orderNo','contract_guns.quantity','guns.name as gun','contract_guns.created_at')
                                ->get();
            
            return view('AdminPortal.ClientRequests.GunDeliveries.viewModal_initdelv')
                   // ->with('gunRequest',$gunRequest)
                    ->with('gunRequestDetails',$gunRequestDetails);
        }
    }
    public function deliverModal(Request $request){
        if($request->ajax()){
            $quantity = Input::get('quantity');
            $gunsIDs = Input::get('gunsID');

            $gunDeliveryID = "GUNDELV-".GunDelivery::get()->count();
            // $guns = DB::table('Guns')
            //             ->join('gunType','guns.guntype_id','=','gunType.id')
            //             ->join('tblGunReqDetails',function($join){
            //                 $join->on('tblGunReqDetails.strGunReqDetailsID','=',$request->gunReqstID)
            //                      ->on('tblGunReqDetails.strGunID','=','Guns.id');
            //             })
            //             ->select('guns.name as gun','guns.id as gunID','gunType.name as gunType','tblGunReqDetails.quantity as qtyOrdered')
            //             ->get();

            $guns = DB::table('contract_guns')
                                ->where('contract_guns.contract_id','=',$request->gunReqstID)
                                
                                //->join('clients','clients.id','=','tblGunRequests.strClientID')
                                ->join('guns','guns.id','=','contract_guns.gun_id')
                                ->join('gunType','guns.guntype_id','=','gunType.id')
                                ->select('guns.name as gun','guns.id as gunID','gunType.name as gunType','contract_guns.quantity as qtyOrdered')
                                ->get();
            return view('AdminPortal.ClientRequests.GunDeliveries.deliver_modal')
                    ->with('quantity',$quantity)
                    ->with('gunsIDs',$gunsIDs)
                    ->with('guns',$guns)
                    ->with('gunDeliveryID',$gunDeliveryID)
                    ->with('gunReqID',$request->gunReqstID);
                       // return response($gunRequestDetails);

            
        }
    }
    public function updateContractStats(Request $request){
    	if($request->ajax()){
    		$contract = Contracts::findOrFail($request->contractID);
    		$contract['status'] = "active";
    		if($contract->save()){
    			return response('0');
    		}else{
    			return response('1');
    		}
    	}
    }
}
