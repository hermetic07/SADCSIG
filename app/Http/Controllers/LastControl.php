<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GunRequest;
use App\AddGuardRequests;
use App\Service;
use App\Nature;
use App\Gun;
use App\Attribute;
use App\License;
use App\Requirement;
use App\Rank;
use App\Military;
use App\GunType;
use App\Province;
use App\Area;
use App\ServiceRequest;
use App\Clients;
use App\Establishments;
use App\Contract;
use Exception;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\ClientSentRequests;
use App\Employees;
use App\Deployments;
use App\DeploymentDetails;
use App\GunRequestsDetails;
use Carbon\Carbon;

class LastControl extends Controller
{
    public function clientAuth()
    {
     
      return view('last.login');
    }
    public function authenticate(Request $request){

      return $request->toArray();
    }
    /*public function index()
    {
      $Services = Service::all();
      $clients = Clients::all();
      $establishment = Establishments::findOrFail('2');
      $guns = Gun::all();
      $contracts = Contract::all();
      $serviceRequests = ServiceRequest::all();
      $deployments = Deployments::all();
      $deploymentDetails = DeploymentDetails::all();
      $employees = Employees::all();

      return view('ClientPortal.ClientPortalRequest
        ')->with('services',$Services)->with('clients',$clients)->with('guns',$guns)->with('contracts',$contracts)->with('establishment',$establishment)->with('serviceRequests',$serviceRequests)->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('employees',$employees);
     // return $client;
    }
*/
    public function index2()
    {
      $n = Nature::all();
      $p = Province::all();
      $a = Area::all();
      $g = Gun::all();
      $gt = GunType::all();
      return view('last.clients')->with('a',$a)->with('p',$p)->with('n',$n)->with('g',$g)->with('gt',$gt);
    }

    public function index3()
    {
      $g = Gun::all();
      return view('last.Sendgun')->with('g',$g);
    }

    public function index4()
    {
      $g = Gun::all();
      return view('last.Deploy')->with('g',$g);
    }

    public function index5()
    {
      $g = Gun::all();
      return view('last.login')->with('g',$g);
    }

    public function index6()
    {
      $a = Attribute::all();
      $r = Requirement::all();
      $l = License::all();
      $ra = Rank::all();
      $m = Military::all();
      return view('last.secus')->with('a',$a)->with('r',$r)->with('l',$l)->with('ra',$ra)->with('m',$m);
    }

    public function saveReq($id,Request $request){
     
      $explod = explode('/',$request->meetSched);
      $meetDt = "$explod[2]-$explod[0]-$explod[1]";
      $service_request_id = 'SERVREQ-'.ServiceRequest::get()->count();
      
      ServiceRequest::create(['id'=>$service_request_id,'client_id'=>$id,'services_id'=>$request->service,'desc_of_service'=>$request->servDesc,'date_start'=>Carbon::now(),'meetingPlace'=>$request->meeting,'meetingSchedule'=>$meetDt,'status'=>'active','read'=>'1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);

      return redirect('Request-'.$id);
      //return $request->toArray();
    
       
    }

    public function saveGunReq($id, Request $request){
      $ctr2 = 0;
      $ctr3 = 0;
      $gunReqID = "GUNREQ-".GunRequest::get()->count();
      
     
      
      for($ctr = 0; $ctr < $request->gunCount; $ctr++){
        if($request->$ctr != null){
          
          $ctr2++;
          if($ctr2==1){
            GunRequest::create(['strGunReqID'=>$gunReqID,'strAdmin'=>'Earl Pogi','strClientID'=>$id,'establishments_id'=>$request->establishment_id,'status'=>"active",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
            $GunRequests = GunRequest::latest('created_at')->get();
           

          }
          $strGunReqDetailsID = "GUNREQDTLS-".GunRequestsDetails::get()->count();
          $quantity = "quantity".((string)$ctr);
          GunRequestsDetails::create(['strGunReqDetailsID'=>$strGunReqDetailsID,'strGunReqID'=>$gunReqID,'strGunID'=>$request->$ctr,'quantity'=>$request->$quantity,'status'=>"active"]);

        }
      }
      //$gun = Gun::findOrFail($request->);
     /* GunRequest::create(['establishments_id'=>$id,'gun_for'=>$request->service_requested,'guns_id'=>$gun->id,'status'=>'active','read'=>'1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
*/
      return redirect('Request-'.$id);
     //return $GunRequests;
 
    }

    public function saveAddGuardReq($id,Request $request){

      $shifts = explode(',',$request->shifts);
      $shift_start = $shifts[0];
      $shif_end =  $shifts[1];
      $add_guard_reques_id = 'ADDGUARDREQ-'.AddGuardRequests::get()->count();
       AddGuardRequests::create(['client_id'=>$id,'establishments_id'=>$request->establishment_id,'no_guards'=>$request->no_guards,'shift_start'=>$shift_start,'shift_end'=>$shif_end,'date_needed'=>$request->date_needed,'status'=>'active','created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'contract'=>$request->contracts]);
       return redirect('Request-'.$id);
    }

    public function viewSentReq(Request $request){
      /*$clientSentRequests = ClientSentRequests::latest('changeTime')->get();
      $serviceRequests = ServiceRequest::where('establishments_id',$request->establishment_id)->first();
      $gunRequests = GunRequest::where('establishments_id',$request->establishment_id)->first();
      $establishment = Establishments::findOrFail($request->establishment_id);*/
      return view('ClientPortal.sentRequests');
    }
    
    public function saveGuardReplReqst($id,Request $request){
      //return $request->numGuards;
      for($i = 0; $i < $request->numGuards; $i++){
        if($request->$i == null){
          echo $i."<br>";
        }
      }
    }
}
