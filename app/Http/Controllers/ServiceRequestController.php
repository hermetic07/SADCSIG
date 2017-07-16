<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRequest;
use App\Clients;
use App\Establishments;
use App\Area;
use App\Province;
use App\Service;
use App\Nature;
use App\Contracts;
use Carbon\Carbon;
use App\ClientRegistration;


class ServiceRequestController extends Controller
{
    public function index(){
        $serviceRequests = ServiceRequest::latest('created_at')->get();
        $clients = Clients::all();
        $establishments = Establishments::all();
        $areas = Area::all();
        $provinces = Province::all();
        $services = Service::all();
        
        return view('AdminPortal.ClientRequests.ServiceRequests')->with('serviceRequests',$serviceRequests)->with('clients',$clients)->with('areas',$areas)->with('provinces',$provinces)->with('services',$services)->with('establishments',$establishments);
        
    }

    /*public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = ServiceRequest::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }*/
     public function remove(Request $request)
     {
         $id = $request -> id;
         $data = ServiceRequest::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }

     public function newContract($id){

        $serviceRequest = ServiceRequest::findOrFail($id);

        $client = Clients::findOrFail($serviceRequest->client_id);
        $areas = Area::all();
        $provinces = Province::all();
        $natures = Nature::all();
        $services = Service::all();
        $establishments = Establishments::all();
        $clientRegistrations = ClientRegistration::all();
        $contracts = Contracts::all();

        return view('AdminPortal.ClientRequests.NewContract')->with('areas',$areas)->with('provinces',$provinces)->with('natures',$natures)->with('services',$services)->with('client',$client)->with('serviceRequest',$serviceRequest)->with('establishments',$establishments)->with('clientRegistrations',$clientRegistrations)->with('contracts',$contracts);
     }
     public function saveContract(Request $request){

         $contractID;
        $clientID;
        $person_in_charge;
        $ctr = 0; $ctr2 = 0;
        $explod = explode('/',$request->from);
        $startDate = "$explod[2]-$explod[0]-$explod[1]";

        $explod = explode('/',$request->to);
        $endDate = "$explod[2]-$explod[0]-$explod[1]";

        Contracts::create(['id'=>$request->contract_code,'pic_fname'=>$request->firstName,'pic_mname'=>$request->middleName,'pic_lname'=>$request->lastName,'establishment_name'=>$request->estab_name,'services_id'=>$request->service,'address'=>$request->street_add,'areas_id'=>$request->area,'guard_count'=>$request->no_guards,'status'=>"active",'year_span'=>$request->span_mo,'start_date'=>$request->$startDate,'end_date'=>$request->$endDate,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);

        $contracts = Contracts::latest('created_at')->get();

        foreach ($contracts as $contract) {
            $ctr++;
            if($ctr == 1){
                $contractID = $contract->id;
                $person_in_charge = $contract->pic_fname." ".$contract->pic_mname." ".$contract->pic_lname;
            }
        }
                
        $clientID = $request->client_code;
        $date = Carbon::now();
        $explod = explode(' ',$date);
        $rand = explode(':',$explod[1]);
        
        if(explode(',',$request->regEstab)[0] != "-"){
            
            $estabID = explode(',',$request->regEstab)[0];

        }else{

            $estabID = "ESTAB-".$rand[2];
        }
        
        
        
        Establishments::create(['id'=>$estabID,'contract_id'=>$contractID,'name'=>$request->estab_name,'person_in_charge'=>$person_in_charge,'contactNo'=>$request->pic_no,'email'=>$request->pic_email,'address'=>$request->street_add,'natures_id'=>$request->nature,'areas_id'=>$request->area,'province_id'=>$request->province,'area_size'=>$request->area_size,'population'=>$request->population]);
        
        
        ClientRegistration::create(['admin'=>"EarlPogi",'contract_id'=>$contractID,'client_id'=>$clientID]);

        ServiceRequest::findOrFail($request->service_request_code)->update(['status'=>'done']);
        return redirect('/ServiceRequest');


    }
}
