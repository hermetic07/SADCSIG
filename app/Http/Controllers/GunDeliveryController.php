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
                        //->where('isRead','=','1')
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID',
                        	'tblGunRequests.status','tblGunRequests.created_at',
                        	'clients.first_name as client_fname',
                        	'clients.middle_name as client_mname',
                        	'clients.last_name as client_lname',
                        	'establishments.name as establishment',
                        	'establishments.address as address',
                        	'areas.name as area',
                        	'provinces.name as province')
                        ->orderBy('tblGunRequests.created_at','desc')
                        ->get();
        if($gunRequest->save()){
            return view('AdminPortal/DeliverGuns')
                ->with('gunRequestID',$gunRequest->strGunReqID)
                ->with('gunRequests',$gunRequests);
            }else{
                return "Earl Pogi- Something Went wrong!!";
            }
    }
    public function index2(){
        $gunRequests = DB::table('tblGunRequests')
                        ->where('isRead','=','1')
                        ->where('tblGunRequests.status','!=','deleted')
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID',
                        	'tblGunRequests.status as status',
                        	'tblGunRequests.created_at',
                        	'clients.first_name as client_fname',
                        	'clients.middle_name as client_mname',
                        	'clients.last_name as client_lname',
                        	'establishments.name as establishment',
                        	'establishments.address as address',
                        	'areas.name as area','provinces.name as province')
                        ->orderBy('tblGunRequests.created_at','desc')
                        ->get();
                return view('AdminPortal/DeliverGuns2')
                
                ->with('gunRequests',$gunRequests);
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
    public function deliver(Request $request){
        if($request->ajax()){
            $gunRequestDetails = DB::table('tblGunReqDetails')
                                ->where('strGunReqID','=',$request->gunReqstID)
                                ->join('guns','guns.id','=','tblGunReqDetails.strGunID')
                                ->join('gunType','guns.guntype_id','=','gunType.id')
                                ->select('guns.name as gun','guns.id as gunID','gunType.name as gunType','tblGunReqDetails.quantity')
                                ->get();
            return view('AdminPortal.ClientRequests.GunDeliveries.deliver')
                    ->with('gunReqstID',$request->gunReqstID)
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

            $guns = DB::table('tblGunRequests')
                                ->where('tblGunRequests.strGunReqID','=',$request->gunReqstID)
                                ->join('tblGunReqDetails','tblGunReqDetails.strGunReqID','=','tblGunRequests.strGunReqID')
                                //->join('clients','clients.id','=','tblGunRequests.strClientID')
                                ->join('guns','guns.id','=','tblGunReqDetails.strGunID')
                                ->join('gunType','guns.guntype_id','=','gunType.id')
                                ->select('guns.name as gun','guns.id as gunID','gunType.name as gunType','tblGunReqDetails.quantity as qtyOrdered')
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
    public function table(Request $request){
        if($request->ajax()){
            $gunRequests = DB::table('tblGunRequests')
                        ->where('isRead','=','1')
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID',
                        	'tblGunRequests.status',
                        	'tblGunRequests.created_at',
                        	'clients.first_name as client_fname',
                        	'clients.middle_name as client_mname',
                        	'clients.last_name as client_lname',
                        	'establishments.name as establishment',
                        	'establishments.address as address',
                        	'areas.name as area','provinces.name as province')
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
        if($request->ajax()){
            $isSuccess = 0;
            $gunIDs = Input::get('gunIDs');
            $qtyToBeDel = $request->qtyToBeDel;
            $serialNo = Input::get('serialNo');
            $gunDeliveryID = $request->delCode;

           
            //GunDelivery::create(['strGunDeliveryID'=>$gunDeliveryID,'strGunReqID'=>$request->gunReqstID,'status'=>"ONDELIVERY",'dateTimeReceived'=>Carbon::now()]);
            $gunDelivery = new GunDelivery();
            $gunDelivery['strGunDeliveryID'] = $gunDeliveryID;
            $gunDelivery['strGunReqID'] = $request->gunReqstID;
            $gunDelivery['status'] = "ONDELIVERY";
            $gunDelivery['deliveryPerson'] = $request->delBoy;
            $gunDelivery['deliveryPersonContact'] = $request->delBoyContact;
            $gunDelivery['dateTimeReceived'] = Carbon::now();
            if(!$gunDelivery->save()){
                $isSuccess = 1;
            }
            for($ctr = 0; $ctr < count($gunIDs); $ctr++){
                $qtyOrdered = DB::table('tblGunRequests')
                                ->where('tblGunRequests.strGunReqID','=',$request->gunReqstID)
                                ->join('tblGunReqDetails','tblGunReqDetails.strGunReqID','=','tblGunRequests.strGunReqID')
                                //->join('clients','clients.id','=','tblGunRequests.strClientID')
                                ->join('guns','guns.id','=','tblGunReqDetails.strGunID')
                                ->where('guns.id','=',$gunIDs[$ctr])
                                ->join('gunType','guns.guntype_id','=','gunType.id')
                                ->select('tblGunReqDetails.quantity as qtyOrdered','guns.id as gunID')
                                ->get();
                $strGunDelivDetailsID = "GUNDELVDTLS-".GunDeliveryDetails::get()->count();

                $gunDeliveryDetails = new GunDeliveryDetails();
                $gunDeliveryDetails['strGunDeliveryDetailsID'] = $strGunDelivDetailsID;
                $gunDeliveryDetails['strGunDeliveryID'] = $gunDeliveryID;
                $gunDeliveryDetails['strGunID'] = $gunIDs[$ctr];
                $gunDeliveryDetails['serialNo'] = $serialNo[$ctr];
                $gunDeliveryDetails['qtyOrdered'] = $qtyOrdered[0]->qtyOrdered;
                $gunDeliveryDetails['quantity'] = $qtyToBeDel;
                if(!$gunDeliveryDetails->save()){
                    $isSuccess = 1;
                }
               // GunDeliveryDetails::create(['strGunDeliveryDetailsID'=>$strGunDelivDetailsID,'strGunDeliveryID'=>$gunDeliveryID,'strGunID'=>$gunIDs[$ctr],'qtyOrdered'=>$qtyOrdered[0]->qtyOrdered,'quantity'=>$qtyToBeDel[$ctr]]);
                
            }
            GunRequest::findOrFail($request->gunReqstID)->update(['status'=>'ONDELIVERY']);
            if($request->deliveryID != ''){
                GunDelivery::findOrFail($request->deliveryID)->update(['status'=>'REDELIVERED']);
            }
            return response($isSuccess);
        }
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
         $data->admin_del = 1;
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }

     public function client_delete(Request $request)
     {
         $id = $request -> id;
         $data = GunDelivery::findOrFail($id);
         $data->client_del = 1;
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }
}
