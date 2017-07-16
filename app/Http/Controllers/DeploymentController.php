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
use App\Employees;
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
            $shiftTo = "shiftTo".((string)$ctr);
            $shiftFrom = "shiftFrom".((string)$ctr);
            $role = "role".((string)$ctr);
            if($request->$shiftTo != null){
              // echo $request->$shiftFrom ."--". $request->$shiftTo."<br><br>";
                $ctr2++;
                //echo $ctr2;
                if($ctr2==1){
                    Deployments::create(['id'=>$deploymentsID,'establishment_id'=>$request->servReqID,'num_guards'=>$request->numGuards,'status'=>'active','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
                }
                $explod = explode(',',$request->$shiftFrom);
                $from = $explod[0];
                $secuID = $explod[1];
                $explod2 = explode(',',$request->$shiftTo);
                $to = $explod2[0];
                DeploymentDetails::create(['deployments_id'=>$deploymentsID,'employees_id'=>$secuID,'shift_from'=>$from,'shift_to'=>$to,'role'=>$request->$role,'status'=>'active']);
                Employees::findOrFail($secuID)->update(['deployed'=>1]);
                AddGuardRequests::findOrFail($request->addGuardReqID)->update(['status'=>'done']);
                //echo $from;
            }
        }

        
       return redirect('/AddGuardRequests');
    }
}
