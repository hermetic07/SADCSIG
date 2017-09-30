<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
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
use App\AcceptedGuards;
use App\ClientsPic;
use App\ClaimedDelivery;
use App\EstabGuards;
use App\GunType;
use App\vat;
use App\ewt;
use App\Collections;
use PDF;
use App\Agencyfee;
use App\GuardReplacement;
use App\GuardReplacementDetails;
use Carbon\Carbon;
use App\ClientSentRequests;
use App\AddGuardRequests;
use App\ClientCancelRequests;


class ClientPortalHomeController extends Controller
{
    public function clientImage(Request $request){
      
    }

    public function index($id,Request $request){

      $gunDeliveries2 = DB::table('tblGunRequests')
                        ->where('tblGunRequests.strClientID','=',$id)
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                        ->where('tblGunDeliveries.status','=','ONDELIVERY')
                        ->get();
      $gunDeliveriesCtr = $gunDeliveries2->count();

      $guards = DB::table('client_registrations')
                        ->where('client_registrations.client_id','=',$id)
                        ->join('contracts','contracts.id','=','client_registrations.contract_id')
                        
                        
                        ->join('tblestabGuards',function($join){
                            $join->on('tblestabGuards.strEstablishmentID','=','contracts.strEstablishmentID')
                                 ->on('tblestabGuards.contractID','=','contracts.id');
                        })
                        ->where('tblestabGuards.isReplaced','=','0')
                        ->join('establishments','tblestabGuards.strEstablishmentID','=','establishments.id')
                        ->join('employees','tblestabGuards.strGuardID','=','employees.id')
                        ->select('employees.id','employees.first_name','employees.middle_name','employees.last_name','employees.image','tblestabGuards.dtmDateDeployed','tblestabGuards.shiftFrom','tblestabGuards.shiftTo','establishments.name as establishment','tblestabGuards.role','establishments.id as estabID','contracts.id as contractID')
                        ->get();

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
        $clientPic = ClientsPic::all();

       /* $establishments_id = $establishment->id;
        $gunRequests = GunRequest::where('establishments_id',$establishments_id)->get();
        $gunDeliveries= GunDelivery::latest('created_at')->get();*/

        $areas = Area::all();
        $provinces = Province::all();

//return count($guards);
        return view('ClientPortal.ClientPortalHome
          ')->with('services',$Services)->with('client',$client)->with('guns',$guns)->with('contracts',$contracts)->with('establishments',$establishments)->with('serviceRequests',$serviceRequests)->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('areas',$areas)->with('provinces',$provinces)->with('clientRegistrations',$clientRegistrations)->with('gunRequests',$gunRequests)->with('gunDeliveries',$gunDeliveries)->with('gunDeliveryDetails',$gunDeliveryDetails)->with('gunRequestsDetails',$gunRequestsDetails)->with('clientPic',$clientPic)->with('gunDeliveriesCtr',$gunDeliveriesCtr)->with('guards',count($guards));
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
    $estabGuards = EstabGuards::all();
    $establishments = Establishments::all();
    $estabGuards = EstabGuards::all();

    $guards = DB::table('client_registrations')
                        ->where('client_registrations.client_id','=',$id)
                        ->join('contracts','contracts.id','=','client_registrations.contract_id')
                        
                        
                        ->join('tblestabGuards',function($join){
                            $join->on('tblestabGuards.strEstablishmentID','=','contracts.strEstablishmentID')
                                 ->on('tblestabGuards.contractID','=','contracts.id');
                        })
                        ->where('tblestabGuards.isReplaced','=','0')
                        ->join('establishments','tblestabGuards.strEstablishmentID','=','establishments.id')
                        ->join('employees','tblestabGuards.strGuardID','=','employees.id')
                        ->select('employees.id','employees.first_name','employees.middle_name','employees.last_name','employees.image','tblestabGuards.dtmDateDeployed','tblestabGuards.shiftFrom','tblestabGuards.shiftTo','establishments.name as establishment','tblestabGuards.role','establishments.id as estabID','contracts.id as contractID')
                        ->get();

    return view('ClientPortal.ClientPortalGuardsDTR')
            ->with('deployments',$deployments)
            ->with('deploymentDetails',$deploymentDetails)
            ->with('employees',$employees)
            ->with('serviceRequests',$serviceRequests)
            ->with('client',$client)
            ->with('services',$Services)
            ->with('contracts',$contracts)
            ->with('clientRegistrations',$clientRegistrations)
            ->with('estabGuards',$estabGuards)
            ->with('establishments',$establishments)
            ->with('estabGuards',$estabGuards)
            ->with('guards',$guards);
  }

  public function gunDeliveries($id,Request $request){
    $client = Clients::findOrFail($id);
    $gunDeliveryDetails = DB::table('tblGunRequests')
                        ->where('tblGunRequests.strClientID','=',$id)

                        ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                        
                        ->where('tblGunDeliveries.client_del','!=','1')
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status','tblGunRequests.created_at',
                            'clients.first_name as client_fname',
                            'clients.middle_name as client_mname','establishments.name as establishment','establishments.address as address','areas.name as area','provinces.name as province','tblGunDeliveries.strGunDeliveryID as deliveryCode','tblGunDeliveries.created_at as dateDelivered','tblGunDeliveries.deliveryPerson as deliveryPerson','tblGunDeliveries.status as deliveryStatus')
                          ->orderBy('tblGunDeliveries.created_at','desc')
                        ->get();
   // return $id;
    
    return view('ClientPortal.ClientPortalGunDeliveries')
            ->with('client',$client)
            ->with('gunDeliveryDetails',$gunDeliveryDetails);
    //return $id;
  }
  public function viewGunDel(Request $requests){
    if($requests->ajax()){
      $gunDeliveryDetails = DB::table('tblGunDeliveries')
                          ->where('tblGunDeliveries.strGunDeliveryID','=',$requests->gunDeliveryID)
                          ->join('tblGunDeliveryDetails','tblGunDeliveryDetails.strGunDeliveryID','=','tblGunDeliveries.strGunDeliveryID')
                          ->join('guns','guns.id','=','tblGunDeliveryDetails.strGunID')
                          ->join('gunType','gunType.id','=','guns.guntype_id')
                          ->select('tblGunDeliveries.created_at as deliveryDate',
                            'tblGunDeliveries.deliveryPerson as deliveryPerson',
                            'tblGunDeliveries.strGunDeliveryID as deliveryCode',
                            'tblGunDeliveryDetails.qtyOrdered as qtyOrdered',
                            'tblGunDeliveryDetails.quantity as qtyDelivered',
                            'tblGunDeliveryDetails.serialNo as serialNo',
                            'guns.name as gun',
                            'gunType.name as gunType')
                          ->get();
      return view('ClientPortal.formcomponents.view_gundel_modal')
              ->with('gunDeliveryDetails',$gunDeliveryDetails);
    }
  }
  public function claimDeliveryModal(Request $request){
    if($request->ajax()){
      $gunDeliveryDetails = DB::table('tblGunDeliveries')
                          ->where('tblGunDeliveries.strGunDeliveryID','=',$request->gunDeliveryID)
                          ->join('tblGunDeliveryDetails','tblGunDeliveryDetails.strGunDeliveryID','=','tblGunDeliveries.strGunDeliveryID')
                          ->join('guns','guns.id','=','tblGunDeliveryDetails.strGunID')
                          ->join('gunType','gunType.id','=','guns.guntype_id')
                          ->select('tblGunDeliveries.created_at as deliveryDate',
                            'tblGunDeliveries.deliveryPerson as deliveryPerson',
                            'tblGunDeliveries.deliveryPersonContact as deliveryPersonContact',
                            'tblGunDeliveries.strGunDeliveryID as deliveryCode',
                            'tblGunDeliveryDetails.qtyOrdered as qtyOrdered',
                            'tblGunDeliveryDetails.quantity as qtyDelivered',
                            'tblGunDeliveryDetails.serialNo as serialNo',
                            'guns.name as gun',
                            'guns.id as gunID',
                            'gunType.name as gunType')
                          ->get();
      return view('ClientPortal.formcomponents.claim_gundel_modal')
              ->with('gunDeliveryDetails',$gunDeliveryDetails);
              
     // return $gunRequests[0];
    }
  }

  public function saveClaim(Request $request){
    if($request->ajax()){
      $success = 0;
    $partial =0;

    $serialNos = Input::get('serialNos');
    $gunIDs = Input::get('gunIDs');
    $unchecked_serialNos = Input::get('unchecked_serialNos');
    $unchecked_gunIDs = Input::get('unchecked_gunIDs');
    $unclaimedCheck = 0;
    
    for($i = 0; $i < count($gunIDs); $i++){
      $claimedDeliveryID = "CLAIMEDDEL-".ClaimedDelivery::get()->count();
      $claimedDelivery = new ClaimedDelivery();
      $claimedDelivery['strClaimedDelID'] = $claimedDeliveryID;
      $claimedDelivery['strGunDeliveryID'] = $request->gunDeliveryID;
      $claimedDelivery['strGunID'] = $gunIDs[$i];
      $claimedDelivery['serialNo'] = $serialNos[$i];
      $claimedDelivery['status'] = "CLAIMED";
      
      if($claimedDelivery->save()){
        $success = 0;
      }else{
        $success = 1;
      }
      
    }
      for($i = 0; $i < count($unchecked_gunIDs); $i++){
        $unclaimedCheck = 1;
      $claimedDeliveryID = "CLAIMEDDEL-".ClaimedDelivery::get()->count();
      $claimedDelivery = new ClaimedDelivery();
      $claimedDelivery['strClaimedDelID'] = $claimedDeliveryID;
      $claimedDelivery['strGunDeliveryID'] = $request->gunDeliveryID;
      $claimedDelivery['strGunID'] = $unchecked_gunIDs[$i];
      $claimedDelivery['serialNo'] = $unchecked_serialNos[$i];
      $claimedDelivery['status'] = "UNCLAIMED";
      if($claimedDelivery->save()){
        $success = 0;

      }else{
        $success = 1;
      }
      
    }
    if( $unclaimedCheck == 1){
      //return $request->gunDeliveryID;
      $gunDeliveries= GunDelivery::findOrFail($request->gunDeliveryID)->update(['status'=>'PARTIALCLAIMED']);
    }else{
      $gunDeliveries= GunDelivery::findOrFail($request->gunDeliveryID)->update(['status'=>'CLAIMED']);
    }
   
      
    
     
    }
  }
  public function claimDelivery(Request $request){
   
    
    
    //return $partial;
    return redirect('/ClientPortalHome-GunDelivery-'.$request->gunRequestsID);
    if($request->ajax()){
      if($success == 0){
        return response("Success");
      }else{
        return response($success);
      }
    }
    
    
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
      $gunType = GunType::all();
      $nature = Nature::all();
      $estabGuards = EstabGuards::all();


      $clientContracts = DB::table('client_registrations')
                       ->where('client_registrations.client_id','=',$id)
                       ->join('contracts','contracts.id','=','client_registrations.contract_id')
                       ->select('contracts.id as contractCode')
                       ->get(); 
      $guards = DB::table('client_registrations')
                        ->where('client_registrations.client_id','=',$id)
                        ->join('contracts','contracts.id','=','client_registrations.contract_id')
                        
                        
                        ->join('tblestabGuards',function($join){
                            $join->on('tblestabGuards.strEstablishmentID','=','contracts.strEstablishmentID')
                                 ->on('tblestabGuards.contractID','=','contracts.id');
                        })
                        ->join('establishments','tblestabGuards.strEstablishmentID','=','establishments.id')
                        ->join('employees','tblestabGuards.strGuardID','=','employees.id')
                        ->select('employees.id','employees.first_name','employees.middle_name','employees.last_name','employees.image','tblestabGuards.dtmDateDeployed','tblestabGuards.shiftFrom','tblestabGuards.shiftTo','establishments.name as establishment','tblestabGuards.role','establishments.id as estabID','contracts.id as contractID')
                        ->get();
                        //return  $guards->toArray();
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
          ->with('gunType',$gunType)
          ->with('nature',$nature)
          ->with('clientContracts',$clientContracts)
          ->with('guards',$guards)
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
        $clientPic = ClientsPic::all();
        $estabGuards = EstabGuards::all();

      return view('ClientPortal.ClientPortalEstablishments')
            ->with('client',$client)
            ->with('establishments',$establishments)
            ->with('clientRegistrations',$clientRegistrations)
            ->with('contracts',$contracts)
            ->with('natures',$natures)
            ->with('areas',$areas)
            ->with('provinces',$provinces)
            ->with('estabGuards',$estabGuards)
            ->with('clientPic',$clientPic);
    }

    public function clientEstablishmentsdetails($id,$estabID){
      $client = Clients::findOrFail($id);
      $establishments = Establishments::findOrFail($estabID)->get();
      $clientRegistrations = ClientRegistration::where('client_id',$id)->get();
      $es = Establishments::findOrFail($estabID);
      $estabContracts = Establishments::all();
      $estabGuards = EstabGuards::all();
      $guardDeployed = EstabGuards::where('strEstablishmentID',$estabID)->get()->count();
       $clientPic = ClientsPic::all();
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
          $pic = $establishment->pic_fname." ".$establishment->pic_mname." ".$establishment->pic_lname;
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
      $natures = Nature::findOrFail($es->natures_id);
      $nature_name = $natures->name;
      $areas = Area::findOrFail($areas_id);
      $area_name = $areas->name;
      $provinces = Province::where('id',$provinces_id)->get();

      $clientGuns = DB::table('tblGunRequests')
                      ->where('tblGunRequests.establishments_id','=',$estabID)
                      ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                      ->join('tblClaimeddelivery','tblClaimeddelivery.strGunDeliveryID','=','tblGunDeliveries.strGunDeliveryID')
                      ->join('guns','guns.id','=','tblClaimeddelivery.strGunID')
                      ->join('gunType','gunType.id','=','guns.guntype_id')
                      ->select('guns.name as gun','gunType.name as gunType','tblClaimeddelivery.serialNo')
                      ->get();
      $guards = DB::table('client_registrations')
                        ->where('client_registrations.client_id','=',$id)
                        ->join('contracts','contracts.id','=','client_registrations.contract_id')
                        
                        
                        ->join('tblestabGuards',function($join){
                            $join->on('tblestabGuards.strEstablishmentID','=','contracts.strEstablishmentID')
                                 ->on('tblestabGuards.contractID','=','contracts.id');
                        })
                        ->where('tblestabGuards.isReplaced','=','0')
                        ->join('establishments','tblestabGuards.strEstablishmentID','=','establishments.id')
                        ->join('employees','tblestabGuards.strGuardID','=','employees.id')
                        ->select('employees.id','employees.first_name','employees.middle_name','employees.last_name','employees.image','tblestabGuards.dtmDateDeployed','tblestabGuards.shiftFrom','tblestabGuards.shiftTo','establishments.name as establishment','tblestabGuards.role','establishments.id as estabID','contracts.id as contractID','employees.status','employees.telephone','employees.cellphone')
                        ->get();
     // return $es->contract_id;
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
            ->with('clientPic',$clientPic)
            ->with('contractID',$es->contract_id)
            ->with('area_size',$area_size)
            ->with('population',$population)
            ->with('clientGuns',$clientGuns)
            ->with('estabGuards',$estabGuards)
            ->with('guardDeployed',$guardDeployed)
            ->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('employees',$employees)->with('clientPic',$clientPic)
            ->with('guards',$guards);
          
    }

    public function clientContracts($id,$estabID){
      $client = Clients::findOrFail($id);
      $establishments = Establishments::findOrFail($estabID);
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
        $contracts = Contracts::where('strEstablishmentID',$id)->get();
        $contracts2 = "";
        $shift2 = "";
        $count = 0;

        foreach($shifts as $shift){
          $shift2 = $shift2.'<option value="'.$shift->start.','.$shift->end.'">From: '.$shift->start.' - To:'.$shift->end.'</option>'.' ';
        }
        foreach($contracts as $contract){
          $contracts2 = $contracts2.'<li>'.$contract->id.' '.'<input type="radio" name="contracts" value="'.$contract->id.'" required></li> '.' ';
          $count = $count + 1;
        }
        //return view('ClientPortal.select')->with('shifts',$shifts);
        return response([$shift2,$contracts2,$count]);
      }
    }
    public function messages($id){
      $client = Clients::findOrFail($id);
      $clientInbox = ClientDeploymentNotif::where('client_id',$client->id)->latest('created_at')->get();
      $adminMessages = DeploymentNotifForClient::all();
      $tempDeployment = TempDeployments::all();
      $tempDeploymentDetails = TempDeploymentDetails::all();
      $clientRegistrations = ClientRegistration::where('client_id',$id)->get();
      
      $contracts = Contracts::all();
      $clientPic = ClientsPic::all();
      $collection = Collections::where('strClientId',$id)->where('strStatus','!=','notsent')->get();

      $swap = DB::table('tblswaprequest')
      ->join('employees','employees.id','=','tblswaprequest.emp_id')
      ->join('establishments','establishments.id','=','tblswaprequest.establishment_from')
      ->select('employees.first_name as fname',
               'employees.image as image',
               'employees.id as empid',
               'employees.last_name as lname',
               'establishments.name as estab',
               'establishments.address as address',
               'tblswaprequest.id as id')
      ->where('tblswaprequest.client_id',$client->id)
      ->where('tblswaprequest.clientstatus','pending')
      ->where('tblswaprequest.employeestatus','pending')
      ->get();

      return view('ClientPortal/ClientPortalMessages')->with('swap',$swap)->with('all',$collection)->with('client',$client)->with('clientInboxMessages',$clientInbox)->with('adminMessages',$adminMessages)->with('tempDeployments',$tempDeployment)->with('tempDeploymentDetails',$tempDeploymentDetails)->with('contracts',$contracts)->with('clientPic',$clientPic);
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
      $clientPic = ClientsPic::where('stringContractId',$tempDeployment->contract_ID)->get();
      
      $employees = Employee::all();
       return view('ClientPortal.Guardpool')->with('tempDeployments',$tempDeployment)->with('tempDeploymentDetails',$tempDeploymentDetails)->with('client',$client)->with('employees',$employees)->with('client_notif_id',$client_notif_id);
      //return $clientPic[0]->stringpic;
      
    }
    public function saveGuards(Request $request){
      $guards_accepted = explode(',',$request->accepted);
      $guards_rejected = explode(',',$request->rejected);
      $success = 0;
      $var = 0;
     // $notifResponse = new NotifResponse();
      
      

      if($request->ajax()){
        if($guards_accepted[0] != ""){
          for($ctr = 0; $ctr < sizeof($guards_accepted); $ctr = $ctr+1){
            
            NotifResponse::create(['client_deployment_notif_id'=>$request->client_notif_id,'guard_id'=>$guards_accepted[$ctr],'status'=>"accepted"]);
             AcceptedGuards::create(['client_deployment_notif_id'=>$request->client_notif_id,'guard_id'=>$guards_accepted[$ctr],'guard_reponse'=>""]);
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
        
        ClientDeploymentNotif::findOrFail($request->client_notif_id)->update(['status'=>'done']);
        return response(1);
      }
    }

    public function qout(Request $r){
      $ac = Agencyfee::all()->first();
      $nature = Nature::find($r->nature);
      
      $vat = vat::all()->first();
      $vattotal = $ac->value*($vat->value/100); //2000 is just sample agancee fee
      $ewt = ewt::all()->first();
      $ewttotal = $ac->value*($ewt->value/100);//2000 is just sample agancee fee
      $total = $nature->price+$ac->value+$vattotal;
      $sumtotal = $total - $ewttotal;
      $sumtotal2 =$sumtotal*$r->gnum;
      $inmonths = $sumtotal2 *  $r->months;
      $agencyfee = 
      $pdf = PDF::loadView('ClientPortal.qoute', [
        "months"=>$r->months,
        "sumtotal"=>$sumtotal,
        "sumtotal2"=>$sumtotal2,
        "inmonths"=>$inmonths,
        "vat"=>$vat->value,
        "ewt"=>$ewt->value,
        "totalvat"=>$vattotal,
        "totalewt"=>$ewttotal,
        "total"=>$total,
        "num"=>$r->gnum,
        "nature"=>$nature->name,
        "price"=>$nature->price,
        "ac"=>number_format($ac->value, 2, '.', ','),
      ]);
              
      return $pdf->stream('quote.pdf');
    }

    public function homeview(){
      $nature = Nature::All();
      return view('Website/Home')->with('n',$nature);
    }
    
    public function guardReplaceModal(Request $request){
      if($request->ajax()){
        
        $guards = $request->guardIDs;
        
        $estabGuards = DB::table('tblestabGuards')
                          ->where('tblestabGuards.strEstablishmentID','=',$request->establishment_id)
                          ->where('tblestabGuards.contractID','=',$request->contract_id)
                          ->join('employees','tblestabGuards.strGuardID','=','employees.id')
                          ->join('establishments','tblestabGuards.strEstablishmentID','=','establishments.id')
                          ->select('employees.id','employees.first_name','employees.middle_name','employees.last_name','employees.image','tblestabGuards.dtmDateDeployed','tblestabGuards.shiftFrom','tblestabGuards.shiftTo','tblestabGuards.role','establishments.name as establishment')
                          ->get();
                          
        
        return view('ClientPortal.formcomponents.guard_replacement_modal')
                ->with('guards',$guards)
                ->with('totalGuards',count($guards))
                ->with('estabGuards',$estabGuards);
      }
    }
    public function getGuards(Request $requests){
      if($requests->ajax()){
        $contract = Contracts::findOrFail($requests->contractID);
        $estabGuards = DB::table('tblestabGuards')
                          ->where('tblestabGuards.strEstablishmentID','=',$contract->strEstablishmentID)
                          ->where('tblestabGuards.contractID','=',$requests->contractID)
                          ->join('contracts','contracts.id','=','tblestabGuards.contractID')
                          ->where('contracts.status','=','active')
                          ->where('tblestabGuards.isReplaced','=','0')
                          ->join('employees','tblestabGuards.strGuardID','=','employees.id')
                          ->join('establishments','tblestabGuards.strEstablishmentID','=','establishments.id')
                          ->select('employees.id','employees.first_name','employees.middle_name','employees.last_name','employees.image','tblestabGuards.dtmDateDeployed','tblestabGuards.shiftFrom','tblestabGuards.shiftTo','tblestabGuards.role','establishments.name as establishment','establishments.id as estabID','tblestabGuards.contractID as contractID')
                          ->get();
        return view('ClientPortal.formcomponents.guard_table')
                ->with('estabGuards',$estabGuards);
      }
    }
    public function guardReplacementSubmit(Request $requests){
      if($requests->ajax()){

        $secuIDs = Input::get('secuIDs');
        $reasons = Input::get('reasons');

        $guardReplacement = new GuardReplacement();
        $guardReplacement['requestID'] = 'GRDRPLCMNT-'.GuardReplacement::get()->count();
        $guardReplacement['clients_id'] = $requests->clientID;
        $guardReplacement['contractID'] = $requests->contractID;
        $guardReplacement['status'] = 'active';
        $guardReplacement['contractID'] = $requests->contractID;
        $guardReplacement['read'] = '0';
        $guardReplacement['no_guards'] = count($secuIDs);
        $guardReplacement['guards_deployed'] = '0';
        $guardReplacement['created_at'] = Carbon::now();
        $guardReplacement['updated_at'] = Carbon::now();

        if($guardReplacement->save()){
          //return $guardReplacement;
        }
        

        
        for($ctr = 0; $ctr < count($secuIDs); $ctr++){
          $guardReplacementDetails = new GuardReplacementDetails();
          $guardReplacementDetails['replacement_requests_details_ID'] = 'GRDRPLCMNTDTLS-'.GuardReplacementDetails::get()->count();
          $guardReplacementDetails['replacement_requests_id'] = $guardReplacement->requestID;
          $guardReplacementDetails['employees_id'] = $secuIDs[$ctr];
          $guardReplacementDetails['reasons'] = $reasons[$ctr];
          $guardReplacementDetails['created_at'] = Carbon::now();
          $guardReplacementDetails['updated_at'] = Carbon::now();
          $guardReplacementDetails->save();
             
            
        }
        

      }
    }
    public function sentRequest($clientID){
      $client = Clients::findOrFail($clientID);
      $clientSentRequests = DB::table('client_sent_requests')
                              ->where('client_sent_requests.clientID','=',$clientID)
                              ->orderBy('client_sent_requests.changeTime','desc')
                              ->get();
      // $clientSentRequests = DB::table('clients')
      //                       ->where('clients.id','=',$clientID)
      //                       ->join('service_requests','service_requests.client_id','=','clients.id')
      //                       ->join('add_guard_requests','add_guard_requests.client_id','=','clients.id')
      //                       ->join('tblGunRequests','tblGunRequests.strClientID','=','clients.id')
      //                       ->join('guard_replacement_requests','guard_replacement_requests.clients_id','=','clients.id')
      //                       ->get();

      //return $clientSentRequests->toArray();
      //return $clientSentRequests->toArray();
      return view('ClientPortal.sentRequests')
              ->with('client',$client)
              ->with('clientSentRequests',$clientSentRequests);
    }

    public function sentRequest2($clientID,$transID){
      $client = Clients::findOrFail($clientID);
      $clientSentRequests = DB::table('client_sent_requests')
                              ->where('client_sent_requests.clientID','=',$clientID)
                              ->orderBy('client_sent_requests.changeTime','desc')
                              ->get();
      return view('ClientPortal.sentRequests2')
              ->with('client',$client)
              ->with('transID',$transID)
              ->with('clientSentRequests',$clientSentRequests);
    }

    public function cancelRequest(Request $request){
      if($request->ajax()){
        //return $request->toArray();
        if($request->requestType == 'GUARD REPLACEMENT'){
          $guard_replacement_requests = GuardReplacement::findOrFail($request->requestID);
          if($guard_replacement_requests->status != 'active'){
            return response($guard_replacement_requests->status);
          }else if($guard_replacement_requests->status == 'active' && $guard_replacement_requests->read == 1){
            return response($guard_replacement_requests->read);
          }
          else{
            
          }
          
        }else if($request->requestType == 'SERVICE REQUEST'){
          $service_requests = ServiceRequest::findOrFail($request->requestID);
          if($service_requests->status != 'active'){
            return response($service_requests->status);
          }else{
            
          }
        }else if($request->requestType == 'ADDGUARD REQUEST'){
          $add_guard_request = AddGuardRequests::findOrFail($request->requestID);
          if($add_guard_request->status != 'active'){
            return response($add_guard_request->status);
          }else{
            
          }
        }else if($request->requestType == 'ADDGUN REQUEST'){
          $gun_request = GunRequest::findOrFail($request->requestID);
          if($gun_request->status != 'active'){
            return response($gun_request->status);
          }else if($gun_request->status == 'active' && $gun_request->isRead == 1){
            return response($gun_request->isRead);
          }
          else{
            
          }
        }
        
      }
    }
    public function viewSentRequest(Request $request){
      if($request->ajax()){
       // return $request->type;
        if($request->type == 'GUARD REPLACEMENT'){
          $guard_replacement_requests = GuardReplacement::findOrFail($request->requestID);
          //$client_canceled_request = ClientCancelRequests::where()
          $client_canceled_request = ClientCancelRequests::where('requestID',$request->requestID)->get();
          return view('ClientPortal.formcomponents.view_sentRequest_modal')
                      ->with('request',$guard_replacement_requests)
                      ->with('client_canceled_request',$client_canceled_request)
                      ->with('requestID',$guard_replacement_requests->requestID);
        } else if($request->type == 'SERVICE REQUEST'){
          $client_canceled_request = ClientCancelRequests::where('requestID',$request->requestID)->get();
          $service_requests = ServiceRequest::findOrFail($request->requestID);
         
          return view('ClientPortal.formcomponents.view_sentRequest_modal')
                      ->with('request',$service_requests)
                      ->with('client_canceled_request',$client_canceled_request)
                      ->with('requestID',$service_requests->id);
        }
        else if($request->type == 'ADDGUARD REQUEST'){
          $client_canceled_request = ClientCancelRequests::where('requestID',$request->requestID)->get();
          $add_guard_request = AddGuardRequests::findOrFail($request->requestID);
          return view('ClientPortal.formcomponents.view_sentRequest_modal')
                      ->with('request',$add_guard_request)
                      ->with('client_canceled_request',$client_canceled_request)
                      ->with('requestID',$add_guard_request->id);
        }
        else if($request->type == 'ADDGUN REQUEST'){
          $client_canceled_request = ClientCancelRequests::where('requestID',$request->requestID)->get();
          $gun_request = GunRequest::findOrFail($request->requestID);
          return view('ClientPortal.formcomponents.view_sentRequest_modal')
                      ->with('request',$gun_request)
                      ->with('client_canceled_request',$client_canceled_request)
                      ->with('requestID',$gun_request->strGunReqID);
        }
      }
    }
    public function cancelRequestSave(Request $request){
      if($request->ajax()){
          $client_canceled_requestID = 'CLNT-CNCLD-REQ-'.ClientCancelRequests::get()->count();             
            $client_canceled_request = new ClientCancelRequests();
            $client_canceled_request['canceled_requests_id'] = $client_canceled_requestID;
            $client_canceled_request['trans_type'] = $request->requestType;
            $client_canceled_request['client_id'] = $request->clientID;
            $client_canceled_request['reasons'] = $request->reasons;
            $client_canceled_request['requestID'] = $request->requestID;
            $client_canceled_request['created_at'] = Carbon::now();
            $client_canceled_request['updated_at'] = Carbon::now();
            $client_canceled_request->save();
            //return $request->requestID;
            if($request->requestType== 'GUARD REPLACEMENT'){
              $guard_replacement_requests = GuardReplacement::findOrFail($request->requestID)
                                        ->update(['status'=>'c_cancel']);
            }else if($request->requestType == 'SERVICE REQUEST'){

              $service_requests = ServiceRequest::findOrFail($request->requestID)
                                        ->update(['status'=>'c_cancel']);
            }else if($request->requestType == 'ADDGUARD REQUEST'){
              $add_guard_request = AddGuardRequests::findOrFail($request->requestID)
                                        ->update(['status'=>'c_cancel']);
            }else if($request->requestType == 'ADDGUN REQUEST'){
              $gun_request = GunRequest::findOrFail($request->requestID)
                                        ->update(['status'=>'c_cancel']);
            }
            
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