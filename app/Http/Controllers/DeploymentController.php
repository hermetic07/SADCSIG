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

class DeploymentController extends Controller
{
    
    public function saveDepl(Request $request){
        
        $l = $request->avGuards;
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
        //return $request->clientID;
    }
}
