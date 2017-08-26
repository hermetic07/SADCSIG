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
use PDF;

class ClientPortalHomeController extends Controller
{
    public function clientImage(Request $request){
      
    }

    public function index($id,Request $request){

      $gunDeliveries2 = DB::table('tblGunRequests')
                        ->where('tblGunRequests.strClientID','=',$id)
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                        ->get();
      $gunDeliveriesCtr = $gunDeliveries2->count();

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


        return view('ClientPortal.ClientPortalHome
          ')->with('services',$Services)->with('client',$client)->with('guns',$guns)->with('contracts',$contracts)->with('establishments',$establishments)->with('serviceRequests',$serviceRequests)->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('areas',$areas)->with('provinces',$provinces)->with('clientRegistrations',$clientRegistrations)->with('gunRequests',$gunRequests)->with('gunDeliveries',$gunDeliveries)->with('gunDeliveryDetails',$gunDeliveryDetails)->with('gunRequestsDetails',$gunRequestsDetails)->with('clientPic',$clientPic)->with('gunDeliveriesCtr',$gunDeliveriesCtr);
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
            ->with('estabGuards',$estabGuards);
  }

  public function gunDeliveries($id,Request $request){
    $client = Clients::findOrFail($id);
    $gunDeliveryDetails = DB::table('tblGunRequests')
                        ->where('tblGunRequests.strClientID','=',$id)
                        ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status','tblGunRequests.created_at',
                            'clients.first_name as client_fname',
                            'clients.middle_name as client_mname','establishments.name as establishment','establishments.address as address','areas.name as area','provinces.name as province','tblGunDeliveries.strGunDeliveryID as deliveryCode','tblGunDeliveries.created_at as dateDelivered','tblGunDeliveries.deliveryPerson as deliveryPerson','tblGunDeliveries.status as deliveryStatus')
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
    
    
    for($i = 0; $i < count($gunIDs); $i++){
      $claimedDeliveryID = "CLAIMEDDEL-".ClaimedDelivery::get()->count();
      $claimedDelivery = new ClaimedDelivery();
      $claimedDelivery['strClaimedDelID'] = $claimedDeliveryID;
      $claimedDelivery['strGunDeliveryID'] = $request->gunDeliveryID;
      $claimedDelivery['strGunID'] = $gunIDs[$i];
      $claimedDelivery['serialNo'] = $serialNos[$i];
      
      if($claimedDelivery->save()){
        $success = 0;
      }else{
        $success = 1;
      }
      
    }
   
      $gunDeliveries= GunDelivery::findOrFail($request->gunDeliveryID)->update(['status'=>'CLAIMED']);
    
     
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
            ->with('estabGuards',$estabGuards)
            ->with('guardDeployed',$guardDeployed)
            ->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('employees',$employees)->with('clientPic',$clientPic);
          
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

        return view('ClientPortal.select')->with('shifts',$shifts);
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


      return view('ClientPortal/ClientPortalMessages')->with('client',$client)->with('clientInboxMessages',$clientInbox)->with('adminMessages',$adminMessages)->with('tempDeployments',$tempDeployment)->with('tempDeploymentDetails',$tempDeploymentDetails)->with('contracts',$contracts)->with('clientPic',$clientPic);
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
      $nature = Nature::find($r->nature);
      $total = $r->gnum*$nature->price;
      $vat = vat::all()->first();
      $vattotal = 2000*($vat->value/100); //2000 is just sample agancee fee
      $ewt = ewt::all()->first();
      $ewttotal = 2000*($ewt->value/100);//2000 is just sample agancee fee
      $sumtotal = $total + 2000 + $vattotal - $ewttotal;
      $inmonths = $sumtotal *  $r->months;
      
      $pdf = PDF::loadView('ClientPortal.qoute', [
        "months"=>$r->months,
        "sumtotal"=>$sumtotal,
        "inmonths"=>$inmonths,
        "vat"=>$vat->value,
        "ewt"=>$ewt->value,
        "totalvat"=>$vattotal,
        "totalewt"=>$ewttotal,
        "total"=>$total,
        "num"=>$r->gnum,
        "nature"=>$nature->name,
        "price"=>$nature->price,
      ]);
              
      return $pdf->stream('quote.pdf');
    }

    public function homeview(){
      $nature = Nature::All();
      return view('Website/Home')->with('n',$nature);
    }
}
// for($ctr = 0; $ctr < sizeof($guards_accepted); $ctr++){
//             $notifResponse['guard_id'] = $guards_accepted[$ctr];
//             $notifResponse['status'] = "accepted"

//             if($notifResponse->save()){
//                 return response("Success");
//             }
//         }