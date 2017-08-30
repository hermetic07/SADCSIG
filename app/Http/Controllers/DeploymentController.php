<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Area;
use App\Province;
use App\Contracts;
use App\Establishments;
use App\ServiceRequest;
use App\Service;
use App\AddGuardRequests;
use App\Employee;
use App\Deployments;
use App\DeploymentDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\DeploymentNotifForClient;
use App\TempDeployments;
use App\TempDeploymentDetails;
use App\ClientDeploymentNotif;
use App\AcceptedGuards;
use App\NotifResponse;
use App\EstabGuards;

class DeploymentController extends Controller
{
    
    public function saveDepl(Request $request){
        
        /*$l = $request->avGuards;
        $ctr2 = 0;
        
        $deploymentsID = random_int(1, 100);
        //echo $deploymentsID;
        for($ctr = 0; $ctr < $l; $ctr++){
            $shift = "shift".((string)$ctr);
            $role = "role".((string)$ctr);
            if($request->$shift != null){
              // echo $request->$shiftFrom ."--". $request->$shiftTo."<br><br>";
                $ctr2++;
                //echo $ctr2;
                if($ctr2==1){
                    Deployments::create(['id'=>$deploymentsID,'clients_id'=>$request->clientID,'establishment_id'=>$request->establishmentID,'num_guards'=>$request->numGuards,'status'=>'active','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
                }
                $explod = explode(',',$request->$shift);
                $from = $explod[0];
                $secuID = $explod[2];
                
                $to = $explod[1];
                DeploymentDetails::create(['deployments_id'=>$deploymentsID,'employees_id'=>$secuID,'shift_from'=>$from,'shift_to'=>$to,'role'=>$request->$role,'status'=>'active']);
                Employee::findOrFail($secuID)->update(['deployed'=>1]);
                Contracts::findOrFail($request->contractID)->update(['init_deploy_status'=>'done']);
                
            }
        }

        
      return redirect('/Dashboard');
        //return $request->clientID;*/
        $message_ID = 'NOTIF-'.$request->contractID;
        $temp_deployment_id = 'TMPDPLY-'.$request->contractID;
        $temp_deployment_details_id ='';
        $client_inbox_id = '';

        $count1 = Contracts::get()->count();
        //return $message_ID;
        DeploymentNotifForClient::create(['notif_id'=>$message_ID,'trans_id'=>$request->contractID,'sender'=>'Admin','receiver'=>$request->clientID,'subject'=>'DEPLOYMENT','status'=>'active']);

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
                    TempDeployments::create(['temp_deployment_id'=> $temp_deployment_id,'messages_ID'=>$message_ID,'admin'=>'Earl','clients_id'=>$request->clientID,'contract_ID'=>$request->contractID,'establishment_id'=>$request->establishmentID,'num_guards'=>$request->numGuards]);
                }
                $explod = explode(',',$request->$shift);
                $from = $explod[0];
                $secuID = $explod[2];
                
                $to = $explod[1];
                $client_inbox_id = 'CLNTNTF-'.$request->contractID.$count1;
                $temp_deployment_details_id= 'TMPDPLY-DTLS-'.$request->contractID;
                TempDeploymentDetails::create(['temp_deployment_details_id'=>$temp_deployment_details_id,'temp_deployments_id'=>$temp_deployment_id,'employees_id'=>$secuID,'shift_from'=>$from,'shift_to'=>$to,'role'=>$request->$role,'status'=>'active']);
                Employee::findOrFail($secuID)->update(['deployed'=>1]);
               
                
            }
        }
         ClientDeploymentNotif::create(['client_deloyment_notif_id'=>$client_inbox_id,'client_id'=>$request->clientID,'notif_id'=>$message_ID,'date_received'=>Carbon::now()]);
                Contracts::findOrFail($request->contractID)->update(['init_deploy_status'=>'pending']);
         return redirect('/Dashboard');
    }
    public function deploy(Request $request){
        
         if($request->ajax()){
            $deployment = new Deployments();
            $contract = Contracts::findOrFail($request->contractID);
            $guardDeployedctr =  (int)$contract->guardDeployed;
            
            $deployment['clients_id'] = $request->clientID;
            $deployment['establishment_id'] = $request->estabID;
            $deployment['num_guards'] = $request->num_guards;
            $deployment->save();

            $dep = Deployments::latest('created_at')->get();
             $deploymentDetails = new DeploymentDetails();
                $deploymentDetails['deployments_id'] = $dep[0]->id;
                $deploymentDetails['employees_id'] = $request->employeeID;
                $deploymentDetails['shift_from'] = $request->shiftFrom;
                $deploymentDetails['shift_to'] = $request->shiftTo;
                $deploymentDetails['role'] = $request->role;
                $deploymentDetails['status'] = "active";
                if($deploymentDetails->save()){
                     //return response("sucess");
                    $guardDeployedctr++;
                }else{
                    return response("OOOPS Something went wrong!");
                }
            
            //return response($dep);
                $ac = AcceptedGuards::where('guard_id',$request->employeeID)->update(['guard_reponse'=>'deployed']);
                $nr = NotifResponse::where('guard_id',$request->employeeID)->update(['status'=>'deployed']);
                $emp = Employee::findOrFail($request->employeeID)->update(['deployed'=>'1']);
                $emp = Employee::findOrFail($request->employeeID)->update(['status'=>'active']);
                EstabGuards::create(['strEstablishmentID'=>$request->estabID,'strGuardID'=>$request->employeeID,'dtmDateDeployed'=>Carbon::now(),'status'=>'active','shiftFrom'=>$request->shiftFrom,'shiftTo'=>$request->shiftTo,'contractID'=>$request->contractID]);

                $contract->guardDeployed = $guardDeployedctr;
                $contract->save();
                if($contract->guard_count == $contract->guardDeployed){
                    $contract->status = "active";
                    $contract->save();
                }
                return response($guardDeployedctr);
        }
    }
}
