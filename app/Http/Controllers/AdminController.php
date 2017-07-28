<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddGuardRequests;
use App\Clients;
use App\Establishments;
use App\Area;
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

class AdminController extends Controller
{
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

        

        return view('AdminPortal.Deploy')->with('clients',$clients)->with('contracts',$contracts)->with('areas',$areas)->with('provinces',$provinces)->with('establishments',$establishments)->with('services',$services)->with('employees',$employees)->with('clientRegistrations',$clientRegistrations)->with('shifts',$shifts);
    }
    public function selectShifts(Request $request){
        if($request->ajax()){
            $establishment = Establishments::where('contract_id',$request->contractID)->get();
            $shifts = Shifts::where('estab_id',$establishment[0]->id)->get();
            return view('AdminPortal.selectShifts')
                    ->with('shifts',$shifts)
                    ->with('employeeID',$request->employeeID);
            //return response($request->employeeID);
        }
    }
    public function pending_client_requests(){
        $contracts = Contracts::latest('created_at')->get();
        $establishments = Establishments::all();
        $natures = Nature::all();
        $areas = Area::all();
        $provinces = Province::all();
        $shifts = Shifts::all();
        return view('AdminPortal/PendingClientRequests')
                ->with('contracts',$contracts)
                ->with('establishments',$establishments)
                ->with('natures',$natures)
                ->with('areas',$areas)
                ->with('provinces',$provinces);
                
    }

    public function deploymentStatus($contractID){
        $contract = Contracts::findOrFail($contractID);
        $clientRegistration = ClientRegistration::where('contract_id',$contractID)->get();
        $client = Clients::findOrFail($clientRegistration[0]->client_id);
        $tempDeployments = TempDeployments::all();
        $establishment = Establishments::where('contract_id',$contractID)->get();
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
        $natures = Nature::findOrFail($establishment[0]->natures_id);
        $shifts = Shifts::where('estab_id',$establishment[0]->id)->get();
        
        return view('AdminPortal.DeploymentStatus')
                    ->with('tempDeployments',$tempDeployments)
                    ->with('tempDeploymentDetails',$tempDeploymentDetails)
                    ->with('notif_response',$notif_response)
                    ->with('clientDeploymentNotifs',$clientDeploymentNotifs)
                    ->with('employees',$employees)
                    ->with('acceptedGuards',$acceptedGuards)
                    ->with('contractID',$contractID)
                    ->with('establishment',$establishment[0])
                    ->with('client',$client)
                    ->with('natures',$natures)
                    ->with('shifts',$shifts)
                    ->with('contract',$contract);
        //return $tempDeployments;
    }
    public function changeRejectedGuards(Request $request){
        $employees = Employee::all();
        $shifts = Shifts::all();
        $establishments = Establishments::all();
        $empCtr = 0;
        foreach($employees as $employee){
            $empCtr = $empCtr + 1;
        }
        return view('AdminPortal.ChangeRejectedGuards')
                ->with('employees',$employees)
                ->with('rejects',$request->rejectedIDs)
                ->with('rejectCtr',$request->rejectedCtr)
                ->with('empCtr',$empCtr)
                ->with('contractID',$request->contractID)
                ->with('clientID',$request->clientID)
                ->with('establishments',$establishments)
                ->with('shifts',$shifts)
                ->with('accepted',$request->accepted)
                ->with('changeID',$request->changeID)
                ->with('refuseID',$request->refuseID)
                ->with('refuseCtr',$request->refuseCtr)
                ;
        //return $request->clientID;
    }
    public function saveChangedGuards(Request $request){
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
                Contracts::findOrFail($request->contractID)->update(['init_deploy_status'=>'pending']);

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

}
