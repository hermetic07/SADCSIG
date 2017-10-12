<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\AddGuardRequests;
use App\Clients;
use App\Establishments;
use App\Area;
use App\vat;
use App\ewt;
use App\Service;
use App\Province;
use App\Contracts;
use App\ServiceRequest;
use App\Employee;
use App\ClientRegistration;
use App\GunRequest;
use App\Shifts;
use App\Nature;
use App\NotifResponse;
use App\ClientDeploymentNotif;
use App\DeploymentNotifForClient;
use App\TempDeployments;
use App\TempDeploymentDetails;
use App\AcceptedGuards;
use Carbon\Carbon;
use App\Deployments;
use App\DeploymentDetails;
use App\ClientsPic;
use App\EstabGuards;
use App\Role;
use App\ClientCancelRequests;
use App\GuardReplacement;
use App\AcceptedServRequests;


class AdminController extends Controller
{
    public function shit(Request $request){
        return "jhhj";
    }
    public function dashboardIndex(){
    	$serviceRequests = ServiceRequest::latest('created_at')->get();
    	$gunRequests = GunRequest::latest('created_at')->get();
    	return view('AdminPortal.Dashboard')->with('serviceRequests',$serviceRequests)->with('gunRequests',$gunRequests);
    }
    public function manualDeploy(){
     	$contracts = Contracts::latest('created_at')->get();
        $services = Service::all();
        $clients = Clients::all();
        $establishments = Establishments::all();
        $areas = Area::all();
        $provinces = Province::all();
        $employees = Employee::all();
        $clientRegistrations = ClientRegistration::all();
        $shifts = Shifts::all();
        $clientPic = ClientsPic::all();
        $roles = Role::all();
    
        return view('AdminPortal.Deploy')
                ->with('clients',$clients)
                ->with('contracts',$contracts)
                ->with('areas',$areas)
                ->with('provinces',$provinces)
                ->with('establishments',$establishments)
                ->with('services',$services)
                ->with('employees',$employees)
                ->with('clientRegistrations',$clientRegistrations)
                ->with('shifts',$shifts)
                ->with('roles',$roles)
                ->with('clientPic',$clientPic);
    }
    public function view(Request $request){
        if($request->ajax()){
            $clientBodyPreferences = DB::table('tbl_clientbodypreference')
                               ->where('tbl_clientbodypreference.stringContractId','=',$request->contractID) 
                               ->join('attributes','attributes.id','=','tbl_clientbodypreference.intAttributeId')
                               ->select('attributes.name as attribute',
                                'attributes.measurement as measurement',
                                'tbl_clientbodypreference.intLowest as low',
                                'tbl_clientbodypreference.intGreatest as high')
                               ->get();  
            $clientLicensePreferences = DB::table('tbl_clientlicensepreference')
                                     ->where('tbl_clientlicensepreference.stringContractId','=',$request->contractID)
                                     ->join('licences','licences.id','=','tbl_clientlicensepreference.intLicenseId')
                                     ->select('licences.name as license')
                                     ->get();   
            $clientPeferences = DB::table('tbl_clientpreference')
                                    ->where('tbl_clientpreference.stringContractId','=',$request->contractID)
                                  ->get(); 
            $tbl_clientrequirementpreferences = DB::table('tbl_clientrequirementpreference')
                                        ->where('tbl_clientrequirementpreference.stringContractId','=',$request->contractID)
                                        ->join('requirements','requirements.id','=','tbl_clientrequirementpreference.intRequirementId')
                                        ->select('requirements.name as requirement')
                                               ->get();                       
            return view('AdminPortal.Deployments.viewModal')
                        ->with('clientBodyPreferences',$clientBodyPreferences)
                        ->with('clientPeferences',$clientPeferences)
                        ->with('tbl_clientrequirementpreferences',$tbl_clientrequirementpreferences)
                        ->with('clientLicensePreferences',$clientLicensePreferences);
        }
    }
    public function selectShifts(Request $request){
        if($request->ajax()){
           
            $contract = Contracts::findOrFail($request->contractID);
            $establishment = Establishments::findOrFail($contract->strEstablishmentID);
            $shifts = Shifts::where('estab_id',$establishment->id)->get();
            return view('AdminPortal.selectShifts')
                    ->with('shifts',$shifts);
                    
            //return response($request->employeeID);
        }
    }
    public function pending_deployments(){
        $contracts = Contracts::latest('created_at')->get();
        $establishments = Establishments::all();
        $natures = Nature::all();
        $areas = Area::all();
        $provinces = Province::all();
        $shifts = Shifts::all();
        $tempDeployments = TempDeployments::all();
        $tempDeploymentDetails = TempDeploymentDetails::all();
        $acceptedGuards = AcceptedGuards::all();
        $clientDeploymentNotifs = ClientDeploymentNotif::all();
        $clientPic = ClientsPic::all();
        $clientRegistrations = ClientRegistration::all();
        $clients = Clients::all();

        return view('AdminPortal.PendingDeployment')
                ->with('contracts',$contracts)
                ->with('establishments',$establishments)
                ->with('natures',$natures)
                ->with('areas',$areas)
                ->with('provinces',$provinces)
                ->with('tempDeployments',$tempDeployments)
                ->with('tempDeploymentDetails',$tempDeploymentDetails)
                ->with('acceptedGuards',$acceptedGuards)
                ->with('clientDeploymentNotifs',$clientDeploymentNotifs)
                ->with('clientPic',$clientPic)
                ->with('clientRegistrations',$clientRegistrations)
                ->with('clients',$clients);
                

    }
    public function pending_client_requests(){
        $contracts = Contracts::latest('created_at')->get();
        $establishments = Establishments::all();
        $natures = Nature::all();
        $areas = Area::all();
        $provinces = Province::all();
        $shifts = Shifts::all();
        $tempDeployments = TempDeployments::all();
        $tempDeploymentDetails = TempDeploymentDetails::all();
        $acceptedGuards = AcceptedGuards::all();
        $clientDeploymentNotifs = ClientDeploymentNotif::all();
        $clientPic = ClientsPic::all();
        $clientRegistrations = ClientRegistration::all();
        $clients = Clients::all();
        $gunRequests = DB::table('tblGunRequests')
                        ->where('tblGunRequests.status','!=','deleted')
                        ->join('clients','clients.id','=','tblGunRequests.strClientID')
                        ->join('establishments','establishments.id','=','tblGunRequests.establishments_id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('tblGunRequests.strGunReqID','tblGunRequests.status',
                            'tblGunRequests.isRead','tblGunRequests.created_at',
                            'clients.first_name as client_fname',
                            'clients.middle_name as client_mname',
                            'clients.last_name as client_lname',
                            'establishments.name as establishment',
                            'establishments.address as address',
                            'areas.name as area',
                            'provinces.name as province')
                        ->orderBy('tblGunRequests.created_at','desc')
                        ->get();

        $service_requests = DB::table('service_requests')
                        ->join('clients','clients.id','=','service_requests.client_id')
                        ->join('services','services.id','=','service_requests.services_id')
                        ->select('service_requests.id as requestCode',
                                 'service_requests.status as status', 
                                 'service_requests.client_id as client_id',
                                 'service_requests.created_at as dateRequested', 
                                 'service_requests.meetingPlace',
                                 'service_requests.meetingSchedule',
                                 'clients.id as client_id',
                                 'clients.first_name as client_fname',
                                 'clients.middle_name as client_mname',
                                 'clients.last_name as client_lname',
                                 'services.name' )
                         ->orderBy('service_requests.created_at','desc')
                        ->get(); 

    $guard_replacement_requests = DB::table('guard_replacement_requests')
                                ->join('clients','clients.id','=','guard_replacement_requests.clients_id')
                                ->join('contracts','contracts.id','=','guard_replacement_requests.contractID')
                                ->select('guard_replacement_requests.requestID as requestCode',
                                         'guard_replacement_requests.status as status', 
                                         'guard_replacement_requests.clients_id as client_id',
                                         'guard_replacement_requests.created_at as dateRequested', 
                                         'guard_replacement_requests.contractID',
                                         'clients.id as client_id',
                                         'clients.first_name as client_fname',
                                         'clients.middle_name as client_mname',
                                         'clients.last_name as client_lname'
                                         )
                                 ->orderBy('guard_replacement_requests.created_at','desc')
                                ->get();
        $add_guard_requests = DB::table('add_guard_requests')
                            ->where('add_guard_requests.status','!=','deleted')
                            ->join('clients','clients.id','=','add_guard_requests.client_id')
                            ->join('establishments','establishments.id','=','add_guard_requests.establishments_id')
                            ->join('areas','areas.id','=','establishments.areas_id')
                            ->join('provinces','provinces.id','=','areas.provinces_id')
                            ->select('add_guard_requests.id','add_guard_requests.no_guards','add_guard_requests.status',
                                'add_guard_requests.created_at',
                                'clients.id as client_id',
                                'clients.first_name as client_fname',
                                'clients.middle_name as client_mname',
                                'clients.last_name as client_lname',
                                'establishments.id as establishmentID',
                                'establishments.name as establishment',
                                'establishments.address as address',
                                'areas.name as area',
                                'provinces.name as province')
                            ->orderBy('add_guard_requests.created_at','desc')
                            ->get();

        return view('AdminPortal.PendingClientRequests')
                ->with('gunRequests',$gunRequests)
                ->with('service_requests',$service_requests)
                ->with('guard_replacement_requests',$guard_replacement_requests)
                ->with('add_guard_requests',$add_guard_requests);
                

    }

    public function deploymentStatus($contractID){
        $contract = Contracts::findOrFail($contractID);
        $clientRegistration = ClientRegistration::where('contract_id',$contractID)->get();
        $client = Clients::findOrFail($clientRegistration[0]->client_id);
        $tempDeployments = TempDeployments::all();
        $establishment = Establishments::findOrFail($contract->strEstablishmentID);
        // if($tempDeployments->isEmpty()){
        //     $tempDeployments = collect([]);
        // }
        //$message_ID = $tempDeployment[3]->messages_ID;
        $tempDeploymentDetails = TempDeploymentDetails::all();
        $clientDeploymentNotifs = ClientDeploymentNotif::all();
        //$client_deployment_notif_id = $clientDeploymentNotifs[0]->client_deloyment_notif_id;
        $notif_response = NotifResponse::all();
        $acceptedGuards = AcceptedGuards::all();
        $employees = Employee::all();
        $natures = Nature::findOrFail($establishment->natures_id);
        $shifts = Shifts::where('estab_id',$establishment->id)->get();
        $area = Area::findOrFail($establishment->areas_id);
        $province = Province::findOrFail($area->provinces_id);
        $completeAdd = $establishment->address.",".$area->name." ,".$province->name;       

        return view('AdminPortal.DeploymentStatus')
                    ->with('tempDeployments',$tempDeployments)
                    ->with('tempDeploymentDetails',$tempDeploymentDetails)
                    ->with('notif_response',$notif_response)
                    ->with('clientDeploymentNotifs',$clientDeploymentNotifs)
                    ->with('employees',$employees)
                    ->with('acceptedGuards',$acceptedGuards)
                    ->with('contractID',$contractID)
                    ->with('establishment',$establishment)
                    ->with('client',$client)
                    ->with('natures',$natures)
                    ->with('shifts',$shifts)
                    ->with('contract',$contract)
                    ->with('completeAdd',$completeAdd);

        //return $tempDeployments;
    }
    public function changeRejectedGuards(Request $request){
        //return $request->toArray();
        $employees = Employee::all();
        $shifts = Shifts::all();
        $establishments = Establishments::all();
        $empCtr = 0;
        $roles = Role::all();
        foreach($employees as $employee){
            $empCtr = $empCtr + 1;
        }
        return view('AdminPortal.ChangeRejectedGuards')
                ->with('employees',$employees)
                ->with('rejects',$request->rejectedIDs)
                ->with('rejectCtr',$request->rejectedCtr)
                ->with('empCtr',$empCtr)
                ->with('contract_ID',$request->contractID)
                ->with('clientID',$request->clientID)
                ->with('establishments',$establishments)
                ->with('shifts',$shifts)
                ->with('accepted',$request->accepted)
                ->with('changeID',$request->changeID)
                ->with('refuseID',$request->refuseID)
                ->with('roles',$roles)
                ->with('refuseCtr',$request->refuseCtr)
                ;
        //return $request->clientID;
    }
    public function changeRejectedGuards2(Request $request){
        return $request->toArray();
        $employees = Employee::all();
        $shifts = Shifts::all();
        $establishments = Establishments::all();
        $empCtr = 0;
        $roles = Role::all();
        foreach($employees as $employee){
            $empCtr = $empCtr + 1;
        }
        return view('AdminPortal.ChangeRejectedGuards')
                ->with('employees',$employees)
                ->with('rejects',$request->rejectedIDs)
                ->with('rejectCtr',$request->rejectedCtr)
                ->with('empCtr',$empCtr)
                ->with('contract_ID',$request->contractID)
                ->with('clientID',$request->clientID)
                ->with('establishments',$establishments)
                ->with('shifts',$shifts)
                ->with('accepted',$request->accepted)
                ->with('changeID',$request->changeID)
                ->with('refuseID',$request->refuseID)
                ->with('roles',$roles)
                ->with('refuseCtr',$request->refuseCtr)
                ;
        //return $request->clientID;
    }
    public function saveChangedGuards(Request $request){
        return explode(',.', $request->refuseID);
        $notif_id = 'NOTIF'.DeploymentNotifForClient::get()->count().'-'.$request->contractID;
        $temp_deployment_id = 'TMPDPLY'.TempDeployments::get()->count().'-'.$request->contractID;
        $temp_deployment_details_id ='';
        $client_inbox_id = '';
        //return $message_ID;
        DeploymentNotifForClient::create(['notif_id'=>$notif_id,'trans_id'=>$request->contractID,'sender'=>'Admin','receiver'=>$request->clientID,'subject'=>'DEPLOYMENT','status'=>'active']);
 

        $l = $request->avGuards;
        $ctr2 = 0;

        //$deploymentsID = random_int(1, 100);
        //echo $deploymentsID;
        for($ctr = 0; $ctr < $l; $ctr++){
            $shift = "shift".((string)$ctr);
            $role = "role".((string)$ctr);
            if($request->$shift != null){
              // echo $request->$shiftFrom ."--". $request->$shiftTo."<br><br>";
                $ctr2++;
                //echo $ctr2;
                if($ctr2==1){
                    TempDeployments::create(['temp_deployment_id'=> $temp_deployment_id,'messages_ID'=>$notif_id,'admin'=>'Earl','clients_id'=>$request->clientID,'contract_ID'=>$request->contractID,'establishment_id'=>$request->establishmentID,'num_guards'=>$request->numGuards]);
                }
                $explod = explode(',',$request->$shift);
                $from = $explod[0];
                $secuID = $explod[2];

                $to = $explod[1];
                $client_inbox_id = 'CLNTNTF'.ClientDeploymentNotif::get()->count().'-'.$request->clientID;
                $temp_deployment_details_id= 'TMPDPLY-DTLS'.TempDeploymentDetails::get()->count().'-'.$request->contractID.((string)$ctr);
                TempDeploymentDetails::create(['temp_deployment_details_id'=>$temp_deployment_details_id,'temp_deployments_id'=>$temp_deployment_id,'employees_id'=>$secuID,'shift_from'=>$from,'shift_to'=>$to,'role'=>$request->$role,'status'=>'active']);
               // Employee::findOrFail($secuID)->update(['deployed'=>1]);


            }
        }
        
         ClientDeploymentNotif::create(['client_deloyment_notif_id'=>$client_inbox_id,'client_id'=>$request->clientID,'notif_id'=>$notif_id,'date_received'=>Carbon::now()]);
                

        $rejected = explode(',.',$request->rejects);
        for($c = 0; $c < sizeof($rejected); $c++){
            NotifResponse::where('guard_id',$rejected[$c])->update(['status'=>'changed']);
        }
        if($request->refuseID != ""){
            $refused = explode(',.', $request->refuseID);
            for($c = 0; $c < sizeof($refused); $c++){
            AcceptedGuards::where('guard_id',$refused[$c])->update(['guard_reponse'=>'changed']);
            NotifResponse::where('guard_id',$refused[$c])->update(['status'=>'changed']);
        }
        }

        //return $rejected[0];
         return redirect('/PendingClientRequests');
    }
    public function notifications(Request $request){
       
        $notifications = DB::table('contracts')
                           ->join('client_registrations','contracts.id','=','client_registrations.contract_id')
                           ->join('clients','client_registrations.client_id','=','clients.id')
                           ->join('establishments','contracts.strEstablishmentID','=','establishments.id')
                           ->select('establishments.name as establishment',
                            'establishments.id as estab_id',
                            'clients.id as client_id',
                            'clients.first_name as client_fname',
                            'clients.middle_name as client_mname',
                            'clients.last_name as client_lname',
                            'clients.image','contracts.guard_count',
                            'contracts.created_at as date',
                            'contracts.updated_at as date',
                            'contracts.status')
                           //->where('contracts.status','=','pending')
                           ->orderBy('contracts.updated_at','desc')
                          // ->orderBy('contracts.updated_at','asc')
                           ->get(); 
        return view('AdminPortal.notification')
                ->with('notifications',$notifications);
    }

    public function activeClientDetails($contractID){
        $client = Clients::findOrFail($contractID);
        $establishments = Establishments::all();
        $contracts = Contracts::all();
        $clientRegistrations = ClientRegistration::all();
        $natures = Nature::all();
        $areas = Area::all();
        $provinces = Province::all();
        $clientPic = ClientsPic::all();
        $estabGuards = EstabGuards::all();
        return view('AdminPortal.ClientEstablishment')
                ->with('establishments',$establishments)
                ->with('natures',$natures)
                ->with('provinces',$provinces)
                ->with('client',$client)
                ->with('clientRegistrations',$clientRegistrations)
                ->with('contracts',$contracts)
                ->with('clientPic',$clientPic)
                ->with('areas',$areas)
                ->with('estabGuards',$estabGuards)
                ;
       // return $picture;

    }
    public function estabDetails($id,$estabID){
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
      $natures_id = "";
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
          $pic = $establishment->pic_fname." ".$establishment->pic_mname."".$establishment->pic_lname;
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
      $natures = Nature::findOrFail($natures_id);
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
      return view('AdminPortal.ClientsDetails')
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
            ->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('employees',$employees)->with('clientPic',$clientPic)->with('guards',$guards);;
    }

    public function contracts($id,$estabID){
      $client = Clients::findOrFail($id);
      $establishments = Establishments::findOrFail($estabID);
      $contracts = Contracts::all();
      $clientRegistrations = ClientRegistration::all();
      $natures = Nature::all();
      $areas = Area::all();
      $provinces = Province::all();
      $services = Service::all();

        return view('AdminPortal.ClientEstablishmentsContracts')
                ->with('client',$client)
                ->with('establishments',$establishments)
                ->with('clientRegistrations',$clientRegistrations)
                ->with('contracts',$contracts)
                ->with('natures',$natures)
                ->with('areas',$areas)
                ->with('provinces',$provinces)
                ->with('estabID',$estabID)
                ->with('services',$services);
    }

    public function viewContract(Request $request){
        if($request->ajax()){
            $contract = DB::table('contracts')
                        ->where('contracts.id','=',$request->contractID)
                        ->join('establishments','contracts.strEstablishmentID','=','establishments.id')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('natures','natures.id','=','establishments.natures_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('contracts.id','contracts.start_date','contracts.end_date','contracts.year_span','contracts.guardDeployed','establishments.name','establishments.pic_fname','establishments.pic_mname','establishments.pic_lname','establishments.address','areas.name as area','provinces.name as province','natures.name as nature')
                        ->get();

            $guards = DB::table('contracts')
                        ->where('contracts.id','=',$request->contractID)
                        ->join('establishments','contracts.strEstablishmentID','=','establishments.id')
                        ->join('tblestabGuards',function($join){
                            $join->on('tblestabGuards.strEstablishmentID','=','establishments.id')
                                 ->on('tblestabGuards.contractID','=','contracts.id');
                        })
                        ->where('tblestabGuards.isReplaced','=','0')
                        ->join('employees','tblestabGuards.strGuardID','=','employees.id')
                        ->select('employees.id','employees.first_name','employees.middle_name','employees.last_name','employees.image','tblestabGuards.dtmDateDeployed','tblestabGuards.shiftFrom','tblestabGuards.shiftTo')
                        ->get();

            return view('AdminPortal.ClientRequests.Contracts.viewModal')
                    ->with('contract',$contract[0])
                    ->with('guards',$guards);
            
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
                                        ->update(['status'=>'a_cancel']);
            }else if($request->requestType == 'SERVICE REQUEST'){

              $service_requests = ServiceRequest::findOrFail($request->requestID)
                                        ->update(['status'=>'a_cancel']);
            }else if($request->requestType == 'ADDGUARD REQUEST'){
              $add_guard_request = AddGuardRequests::findOrFail($request->requestID)
                                        ->update(['status'=>'a_cancel']);
            }else if($request->requestType == 'ADDGUN REQUEST'){
              $gun_request = GunRequest::findOrFail($request->requestID)
                                        ->update(['status'=>'a_cancel']);
            }
            
      }
    }
    public function accept_serv_req(Request $request){
        // $strServiceRequestsNotifID = 'SERV-REQ-NOTIF-'.AcceptedServRequests::get()->count();
        // if($request->ajax()){
        //     $accepted_serv_req = new AcceptedServRequests();
        //     $accepted_serv_req['strServiceRequestsNotif'] = $strServiceRequestsNotifID;
        //     $accepted_serv_req['strAdmin'] = 'Earl Macho';
        //     $accepted_serv_req['strServiceRequestID'] = $request->transID;
        //     $accepted_serv_req['created_at'] = Carbon::now();
        //     $accepted_serv_req['updated_at'] = Carbon::now();
        //     if($accepted_serv_req->save()){
        //         
        //     }
            //return $request->toArray();
        //}
        if(ServiceRequest::findOrFail($request->transID)
                                        ->update(['status'=>'accepted'])){
            return '0';
        }
    }
}
