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

class ClientPortalHomeController extends Controller
{

    public function index(Request $request){
      $value = $request->session()->get('client');
      if ($value!=="") {
        $Services = Service::all();
        $client = Clients::findOrFail($value);
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
}
