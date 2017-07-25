<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRequest;
use App\Clients;
use App\Establishments;
use App\Area;
use App\Province;
use App\Gun;
use App\Contracts;
use App\Service;
use App\Deployments;
use App\DeploymentDetails;
use App\GunDelivery;
use App\GunDeliveryDetails;
use App\Employee;
use App\GunRequest;
use App\GunRequestsDetails;
use App\ClientRegistration;
use App\Nature;
use App\Shifts;
use App\DeploymentNotifForClient;
use App\TempDeployments;
use App\TempDeploymentDetails;
use App\ClientDeploymentNotif;
use App\NotifResponse;

class ClientPortalHomeController extends Controller
{
    
    public function index($id){
      $Services = Service::all();
      $client = Clients::findOrFail($id);
      $establishments = Establishments::all();
      $guns = Gun::all();
      $contracts = Contracts::all();
      $serviceRequests = ServiceRequest::all();
      $deployments = Deployments::all();
      $deploymentDetails = DeploymentDetails::all();
      $clientRegistrations = ClientRegistration::all();
      $gunRequests = GunRequest::all();
      $gunRequestsDetails = GunRequestsDetails::all();
      $gunDeliveries= GunDelivery::latest('created_at')->get();
      $gunDeliveryDetails = GunDeliveryDetails::all();
      

     /* $establishments_id = $establishment->id;
      $gunRequests = GunRequest::where('establishments_id',$establishments_id)->get();
      $gunDeliveries= GunDelivery::latest('created_at')->get();*/

      $areas = Area::all();
      $provinces = Province::all();
      

      return view('ClientPortal.ClientPortalHome
        ')->with('services',$Services)->with('client',$client)->with('guns',$guns)->with('contracts',$contracts)->with('establishments',$establishments)->with('serviceRequests',$serviceRequests)->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('areas',$areas)->with('provinces',$provinces)->with('clientRegistrations',$clientRegistrations)->with('gunRequests',$gunRequests)->with('gunDeliveries',$gunDeliveries)->with('gunDeliveryDetails',$gunDeliveryDetails)->with('gunRequestsDetails',$gunRequestsDetails);
   }

  public function guardDtr($id){
    $deployments = Deployments::all();
    $deploymentDetails = DeploymentDetails::latest('created_at')->get();
    $client = Clients::findOrFail($id);
    $employees = Employee::all();
    $serviceRequests = ServiceRequest::all();
    $Services = Service::all();
    $contracts = Contracts::all();
    $clientRegistrations = ClientRegistration::all();

    return view('ClientPortal.ClientPortalGuardsDTR')->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('employees',$employees)->with('serviceRequests',$serviceRequests)->with('client',$client)->with('services',$Services)->with('contracts',$contracts)->with('clientRegistrations',$clientRegistrations);
  }

  public function gunDeliveries($id,Request $request){
   // return $id;
    $establishments_id;
    $client = Clients::findOrFail($id);
    $establishment = Establishments::all();
    $client_id = $client->id;
    $guns = Gun::all();
    $gunRequests = GunRequest::where('client_id',$client_id)->get();
    $gunRequestsDetails = GunRequestsDetails::all();
    $gunDeliveries= GunDelivery::latest('created_at')->get();
    $gunDeliveryDetails = GunDeliveryDetails::all();
    return view('ClientPortal.ClientPortalGunDeliveries')->with('client',$client)->with('guns',$guns)->with('establishment',$establishment)->with('gunRequests',$gunRequests)->with('gunDeliveries',$gunDeliveries)->with('establishment',$establishment)->with('gunDeliveryDetails',$gunDeliveryDetails)->with('gunRequestsDetails',$gunRequestsDetails);
  }

  public function requests($id)
    {
      $Services = Service::all();
      $client = Clients::findOrFail($id);
      $establishments = Establishments::all();
      $guns = Gun::all();
      $contracts = Contracts::all();
      $serviceRequests = ServiceRequest::all();
      $deployments = Deployments::all();
      $deploymentDetails = DeploymentDetails::all();
      $employees = Employee::all();
      $clientRegistrations = ClientRegistration::all();


      return view('ClientPortal.ClientPortalRequest
        ')->with('services',$Services)
          ->with('client',$client)
          ->with('guns',$guns)
          ->with('contracts',$contracts)
          ->with('establishments',$establishments)
          ->with('serviceRequests',$serviceRequests)
          ->with('deployments',$deployments)
          ->with('deploymentDetails',$deploymentDetails)
          ->with('employees',$employees)
          ->with('clientRegistrations',$clientRegistrations);
     // return $client;
    }
    public function clientEstablishments($id){
        $client = Clients::findOrFail($id);
        $establishments = Establishments::all();
        $contracts = Contracts::all();
        $clientRegistrations = ClientRegistration::all();
        $natures = Nature::all();
        $areas = Area::all();
        $provinces = Province::all();

      return view('ClientPortal.ClientPortalEstablishments')->with('client',$client)->with('establishments',$establishments)->with('clientRegistrations',$clientRegistrations)->with('contracts',$contracts)->with('natures',$natures)->with('areas',$areas)->with('provinces',$provinces);
    }

    public function clientEstablishmentsdetails($id,$estabID){
      $client = Clients::findOrFail($id);
      $establishments = Establishments::findOrFail($estabID)->get();
      $estabContracts = Establishments::all();
      $estabID;
      $estab_name;
      $pic;
      $contactNo;
      $email;
      $adress;
      $natures_id;
      $areas_id;
      $provinces_id;
      $area_size;
      $population;

      $deployments = Deployments::all();
      $deploymentDetails = DeploymentDetails::all();
      $employees = Employee::all();

      foreach($establishments as $establishment){
        if($establishment->id == $estabID){
          $estabID = $establishment->id;
          $estab_name = $establishment->name;
          $pic = $establishment->person_in_charge;
          $contactNo = $establishment->contactNo;
          $email = $establishment->email;
          $adress = $establishment->address;
          $natures_id = $establishment->natures_id;
          $areas_id = $establishment->areas_id;
          $provinces_id = $establishment->province_id;
          $area_size = $establishment->area_size;
          $population = $establishment->population;
          break;
        }
      }

      $contracts = Contracts::all();
      $clientRegistrations = ClientRegistration::all();
      $natures = Nature::findOrFail('2');
      $nature_name = $natures->name;
      $areas = Area::findOrFail($areas_id);
      $area_name = $areas->name;
      $provinces = Province::where('id',$provinces_id)->get();
     

      return view('ClientPortal.ClientPortalEstabDetails')
            ->with('estabID',$estabID)
            ->with('client',$client)
            ->with('estabContracts',$estabContracts)
            ->with('clientRegistrations',$clientRegistrations)
            ->with('contracts',$contracts)
            ->with('estab_name',$estab_name)
            ->with('pic',$pic)
            ->with('contactNo',$contactNo)
            ->with('email',$email)
            ->with('adress',$adress)
            ->with('nature_name',$nature_name)
            ->with('area_name',$area_name)
            
            ->with('area_size',$area_size)
            ->with('population',$population)
            ->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('employees',$employees);
            //dd($provinces->province);
    }

    public function clientContracts($id,$estabID){
      $client = Clients::findOrFail($id);
      $establishments = Establishments::all();
      $contracts = Contracts::all();
      $clientRegistrations = ClientRegistration::all();
      $natures = Nature::all();
      $areas = Area::all();
      $provinces = Province::all();
      $services = Service::all();

        return view('ClientPortal.ClientPortalContracts')->with('client',$client)->with('establishments',$establishments)->with('clientRegistrations',$clientRegistrations)->with('contracts',$contracts)->with('natures',$natures)->with('areas',$areas)->with('provinces',$provinces)->with('estabID',$estabID)->with('services',$services);
    }
    public function shifts(Request $request,$id){
      if($request->ajax()){
        $shifts = Shifts::where('estab_id',$id)->get();

        return view('ClientPortal.select')->with('shifts',$shifts);
      }
    }
    public function messages($id){
      $client = Clients::findOrFail($id);
      $clientInbox = ClientDeploymentNotif::where('client_id',$client->id)->get();
      $adminMessages = DeploymentNotifForClient::all();
      $tempDeployment = TempDeployments::all();
      $tempDeploymentDetails = TempDeploymentDetails::all();

      return view('ClientPortal/ClientPortalMessages')->with('client',$client)->with('clientInboxMessages',$clientInbox)->with('adminMessages',$adminMessages)->with('tempDeployments',$tempDeployment)->with('tempDeploymentDetails',$tempDeploymentDetails);
    }
    public function messagesModal(Request $request,$messageID){
      if($request->ajax()){
        $clientInbox = ClientDeploymentNotif::findOrFail($messageID)->get();

        return response($clientInbox);
      }
      
    }
    public function guardPool($tempDeploymentID,$clientID,$client_notif_id){
      $client = Clients::findOrFail($clientID);
      $tempDeployment = TempDeployments::findOrFail($tempDeploymentID);
      $tempDeploymentDetails = $tempDeployment->tempDeploymentDetails;
      $employees = Employee::all();
      return view('ClientPortal.Guardpool')->with('tempDeployments',$tempDeployment)->with('tempDeploymentDetails',$tempDeploymentDetails)->with('client',$client)->with('employees',$employees)->with('client_notif_id',$client_notif_id);
    }
    public function saveGuards(Request $request){
      $guards_accepted = explode(',',$request->accepted);
      $guards_rejected = explode(',',$request->rejected);
      $success = 0;
      $var = 0;
      $notifResponse = new NotifResponse();
      
      if($request->ajax()){
        if($guards_accepted[0] != ""){
          for($ctr = 0; $ctr < sizeof($guards_accepted); $ctr = $ctr+1){
            
            NotifResponse::create(['client_deployment_notif_id'=>$request->client_notif_id,'guard_id'=>$guards_accepted[$ctr],'status'=>"accepted"]);
          }
        }else{
          $var = $var + 1;
        }
        if($guards_rejected[0] != ""){
          for($ctr = 0; $ctr < sizeof($guards_rejected); $ctr = $ctr+1){
            
            NotifResponse::create(['client_deployment_notif_id'=>$request->client_notif_id,'guard_id'=>$guards_rejected[$ctr],'status'=>"rejected"]);
          }
        }else{
          $var = $var + 1;
        }
        if($var > 1){
          return response(1);
        }
        return response(1);
      }
    }
}
// for($ctr = 0; $ctr < sizeof($guards_accepted); $ctr++){
//             $notifResponse['guard_id'] = $guards_accepted[$ctr];
//             $notifResponse['status'] = "accepted"

//             if($notifResponse->save()){
//                 return response("Success");
//             }
//         }