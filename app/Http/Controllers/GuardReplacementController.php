<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Establishments;
use App\Employees;
use App\Employee;
use App\Role;
use App\Shifts;
use App\GuardReplacement;
use App\Contracts;
use App\Clients;
use App\Area;
use App\Province;
use App\NotifResponse;
use App\ClientDeploymentNotif;
use App\DeploymentNotifForClient;
use App\TempDeployments;
use App\TempDeploymentDetails;
use App\AcceptedGuards;
use App\Nature;
use App\Deployments;
use App\DeploymentDetails;
use App\EstabGuards;
use Carbon\Carbon;
use App\GuardMessagesInbox;

class GuardReplacementController extends Controller
{
    public function index(){
    	return view('AdminPortal.ClientRequests.GuardReplace');
    }

    public function view(Request $requests){
    	if($requests->ajax()){
    		
    		$guardReplacementDetails = DB::table('guard_replacement_requests')
    								->where('guard_replacement_requests.requestID','=',$requests->reqID)
    								->join('replacement_requests_details','replacement_requests_details.replacement_requests_id','=','guard_replacement_requests.requestID')
    								->join('employees','employees.id','=','replacement_requests_details.employees_id')
    								->join('clients','clients.id','=','guard_replacement_requests.clients_id')
    								->join('contracts','contracts.id','=','guard_replacement_requests.contractID')
    								->join('establishments','establishments.id','=','contracts.strEstablishmentID')
                                    ->join('tblestabGuards',function($join){
                                            $join->on('tblestabGuards.strEstablishmentID','=','establishments.id')
                                                 ->on('tblestabGuards.contractID','=','guard_replacement_requests.contractID')
                                                 ->on('tblestabGuards.strGuardID','=','replacement_requests_details.employees_id');
                                        })
    								->join('areas','areas.id','=','establishments.areas_id')
                        			->join('provinces','provinces.id','=','areas.provinces_id')
                        			->orderBy('guard_replacement_requests.created_at','desc')
                        			->select('guard_replacement_requests.requestID as requestCode',
                                            'guard_replacement_requests.status as status',
                        					'contracts.id as contract',
                        					'establishments.name as establishment',
                        					'establishments.address as estabAddress',
                        					'areas.name as area',
                        					'provinces.name as province',
                        					'employees.id as empID',
                        					'employees.first_name',
                        					'employees.middle_name',
                        					'employees.last_name',
                        					'clients.last_name as c_lname',
                        					'clients.first_name as c_fname',
                        					'clients.middle_name as c_mname',
                        					'employees.image',
                        					'replacement_requests_details.reasons',
                                            'guard_replacement_requests.read',
                                            'tblestabGuards.role',
                                            'tblestabGuards.shiftFrom',
                                            'tblestabGuards.shiftTo')
    								->get();
              //  return $guardReplacementDetails->toArray();
    		return view('AdminPortal\ClientRequests\GuardReplacementRequests.viewModal')
    				->with('guardReplacementDetails',$guardReplacementDetails[0])
    				->with('guards',$guardReplacementDetails);
    	}
    }	

    public function deployReplacement($guardReplacementID){

        $guardReplacementRequests = DB::table('guard_replacement_requests')
                                    ->where('guard_replacement_requests.requestID','=',$guardReplacementID)
                                    ->get();
        $guardReplcReqst = GuardReplacement::findOrFail($guardReplacementID);
        $guardReplcReqst['read'] = '1';
        $guardReplcReqst->save();
        $contract = Contracts::findOrFail($guardReplacementRequests[0]->contractID);
        $employees = Employees::all();
        $roles = Role::all();
        $shifts = Shifts::all();
        return view('AdminPortal.ClientRequests.AddGuardRequests.deployAddGuards')
                ->with('employees',$employees)
                ->with('clientID',$guardReplacementRequests[0]->clients_id)
                ->with('estabID',$contract->strEstablishmentID)
                ->with('shifts',$shifts)
                ->with('no_guards',$guardReplacementRequests[0]->no_guards)
                ->with('contractID',$guardReplacementID)
                ->with('roles',$roles);
    }

    public function deploymentStatus($requestID){
        //$contract = Contracts::findOrFail($contractID);
        $guardReplacementRequests = DB::table('guard_replacement_requests')
                                    ->where('guard_replacement_requests.requestID','=',$requestID)
                                    ->get();
        $contract = Contracts::findOrFail($guardReplacementRequests[0]->contractID);
        //$clientRegistration = ClientRegistration::where('contract_id',$contractID)->get();
        $client = Clients::findOrFail($guardReplacementRequests[0]->clients_id);
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
        $employees = Employees::all();
        $natures = Nature::findOrFail($establishment->natures_id);
        $shifts = Shifts::where('estab_id',$establishment->id)->get();
        $area = Area::findOrFail($establishment->areas_id);
        $province = Province::findOrFail($area->provinces_id);
        $completeAdd = $establishment->address.",".$area->name." ,".$province->name;       

        return view('AdminPortal.ClientRequests.GuardReplacementRequests.DeploymentStatus')
                    ->with('tempDeployments',$tempDeployments)
                    ->with('tempDeploymentDetails',$tempDeploymentDetails)
                    ->with('notif_response',$notif_response)
                    ->with('clientDeploymentNotifs',$clientDeploymentNotifs)
                    ->with('employees',$employees)
                    ->with('acceptedGuards',$acceptedGuards)
                    ->with('requestID',$requestID)
                    ->with('establishment',$establishment)
                    ->with('client',$client)
                    ->with('natures',$natures)
                    ->with('shifts',$shifts)
                    ->with('guardReplacementRequests',$guardReplacementRequests[0])
                    ->with('completeAdd',$completeAdd);

        //return $tempDeployments;
    }
    
    public function deploy(Request $request){
        
         if($request->ajax()){

            $deployment = new Deployments();
            
            $guardReplacementRequests = GuardReplacement::findOrFail($request->guardReplID);
            $contract = Contracts::findOrFail($guardReplacementRequests->contractID);
            $guardDetails = DB::table('temp_deployments')
                            ->where('temp_deployments.contract_ID','=',$request->guardReplID)
                            ->join('temp_deployment_details','temp_deployments.temp_deployment_id','=','temp_deployment_details.temp_deployments_id')
                            ->where('temp_deployment_details.employees_id','=',$request->employeeID)
                            ->select('shift_from as shiftFrom','shift_to as shiftTo')
                            ->get();
                             
            $guardDeployedctr =  (int)$guardReplacementRequests->guards_deployed;
            //return $guardDeployedctr;
            $deployment['clients_id'] = $guardReplacementRequests->clients_id;
            $deployment['establishment_id'] = $request->estabID;
            $deployment['num_guards'] = $request->num_guards;
           // $deployment->save();

            $dep = Deployments::latest('created_at')->get();
             $deploymentDetails = new DeploymentDetails();
                $deploymentDetails['deployments_id'] = $dep[0]->id;
                $deploymentDetails['employees_id'] = $request->employeeID;
                $deploymentDetails['shift_from'] = $guardDetails[0]->shiftFrom;
                $deploymentDetails['shift_to'] = $guardDetails[0]->shiftTo;
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
                $emp = Employee::findOrFail($request->employeeID)->update(['deployed'=>'1','status'=>'deployed']);
                $emp2 = new Employee();
                $emp2 = Employee::findOrFail($request->employeeID);
                $emp2['status'] = 'deployed';
                if(!$emp2->save()){
                    return "Ear";
                }
                //Employee::findOrFail($request->employeeID)->update(['status'=>'deployed']);
                 EstabGuards::create(['strEstablishmentID'=>$request->estabID,'strGuardID'=>$request->employeeID,'dtmDateDeployed'=>Carbon::now(),'status'=>'active','shiftFrom'=>$request->shiftFrom,'shiftTo'=>$request->shiftTo,'contractID'=>$guardReplacementRequests->contractID,'role'=>$request->role,'isReplaced'=>'0']);

                $guardReplacementRequests->guards_deployed = $guardDeployedctr;
                $guardReplacementRequests->save();
                if($guardReplacementRequests->no_guards == $guardReplacementRequests->guards_deployed){
                    $guardReplacementRequests->status = "done";
                    $guardReplacementRequests->save();

                    $guardReplacementRequestsDetails = DB::table('replacement_requests_details')
                                                    ->where('replacement_requests_details.replacement_requests_id','=',$guardReplacementRequests->requestID)
                                                    ->get();
                    foreach($guardReplacementRequestsDetails as $guardReplacementRequestsDetail){
                        $emp3 = Employee::findOrFail($guardReplacementRequestsDetail->employees_id);
                        $emp3['deployed'] = '0';
                        $emp3['status'] = 'waiting';
                        $emp3->save();

                        $esatabGuards = EstabGuards::where('contractID',$guardReplacementRequests->contractID)->where('strGuardID',$guardReplacementRequestsDetail->employees_id)
                                        ->update(['isReplaced'=>'1']);
                       $guardInbox = new GuardMessagesInbox();
                        $guardInbox['guard_messages_ID'] = 'GRDINBX-'.GuardMessagesInbox::get()->count();
                        $guardInbox['guard_id'] = $guardReplacementRequestsDetail->employees_id;
                        $guardInbox['subject'] = 'REPLACEMENT';
                        $guardInbox['content'] = '';
                        $guardInbox['status'] = 'active';
                        $guardInbox['created_at'] = Carbon::now();
                        $guardInbox['updated_at'] = Carbon::now();
                        $guardInbox->save();

                    }
                    // $esatabGuards = EstabGuards::where(['contractID'=>$guardReplacementRequests->contractID,'strGuardID'=>$request->employeeID]);
                    // $estabGuards['isReplaced'] = '1';
                }
                $guardInbox = new GuardMessagesInbox();
                $guardInbox['guard_messages_ID'] = 'GRDINBX-'.GuardMessagesInbox::get()->count();
                $guardInbox['guard_id'] = $request->employeeID;
                $guardInbox['subject'] = 'Deployment';
                $guardInbox['content'] = '';
                $guardInbox['status'] = 'active';
                $guardInbox['created_at'] = Carbon::now();
                $guardInbox['updated_at'] = Carbon::now();
                $guardInbox->save();
               
                    return response($guardDeployedctr);
                
        }
    }

    public function deploy2(Request $request){
        
         if($request->ajax()){

            
            $ctr = 0;
            $guardReplacementRequests = GuardReplacement::findOrFail($request->guardReplID);
            $guardReplacementRequestsDetails = DB::table('replacement_requests_details')
                                                    ->where('replacement_requests_details.replacement_requests_id','=',$guardReplacementRequests->requestID)
                                                    ->get();
                    foreach($guardReplacementRequestsDetails as $guardReplacementRequestsDetail){
                        $emp3 = Employee::findOrFail($guardReplacementRequestsDetail->employees_id);
                        $emp3['deployed'] = '0';
                        $emp3['status'] = 'waiting';
                        $emp3->save();
                        $ctr ++;
                        $esatabGuards = EstabGuards::where('contractID',$guardReplacementRequests->contractID)->where('strGuardID',$guardReplacementRequestsDetail->employees_id)
                                        ->update(['isReplaced'=>'1']);
                       $guardInbox = new GuardMessagesInbox();
                        $guardInbox['guard_messages_ID'] = 'GRDINBX-'.GuardMessagesInbox::get()->count();
                        $guardInbox['guard_id'] = $guardReplacementRequestsDetail->employees_id;
                        $guardInbox['subject'] = 'REPLACEMENT';
                        $guardInbox['content'] = '';
                        $guardInbox['status'] = 'active';
                        $guardInbox['created_at'] = Carbon::now();
                        $guardInbox['updated_at'] = Carbon::now();
                        if($guardInbox->save()){
                            
                        }

                    }return response($esatabGuards);
        
    }
    }

    public function changeRejectedGuards(Request $request){
        $employees = Employee::all();
        $shifts = Shifts::all();
        $guardReplacementRequests = GuardReplacement::findOrFail($request->contractID);
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
                ->with('contract_ID',$addGuardRequest->contract)
                ->with('clientID',$request->clientID)
                ->with('establishments',$establishments)
                ->with('shifts',$shifts)
                ->with('accepted',$request->accepted)
                ->with('changeID',$request->changeID)
                ->with('refuseID',$request->refuseID)
                ->with('roles',$roles)
                ->with('contractID',$guardReplacementRequests->requestID)
                ->with('refuseCtr',$request->refuseCtr)
                ;
        //return $request->clientID;
    }
}
