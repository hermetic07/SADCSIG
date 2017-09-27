<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AddGuardRequests;
use App\Clients;
use App\Establishments;
use App\Area;
use App\Service;
use App\Province;
use App\Contracts;
use App\ServiceRequest;
use App\Employees;
use App\ClientRegistration;
use App\Role;
use App\NotifResponse;
use App\ClientDeploymentNotif;
use App\DeploymentNotifForClient;
use App\TempDeployments;
use App\TempDeploymentDetails;
use App\Shifts;
use App\AcceptedGuards;
use App\Employee;
use App\Nature;
use App\Deployments;
use App\DeploymentDetails;
use App\EstabGuards;
use Carbon\Carbon;
use App\GuardMessagesInbox;
use App\ClientCancelRequests;

class AdditionalGuardRequesController extends Controller
{
    public function index2(Request $request){

        $contracts = Contracts::all();
        $services = Service::all();
        $serviceRequests = ServiceRequest::all();
        $clients = Clients::all();
        $establishments = Establishments::all();
        $areas = Area::all();
        $provinces = Province::all();
        $employees = Employees::all();
        $clientRegistrations = ClientRegistration::all();

        $addGuardRequests = AddGuardRequests::latest('created_at')->get();

        return view('AdminPortal.ClientRequests.Deploy2')->with('clients',$clients)->with('contracts',$contracts)->with('addGuardRequest',$addGuardRequests)->with('areas',$areas)->with('provinces',$provinces)->with('serviceRequests',$serviceRequests)->with('establishments',$establishments)->with('services',$services)->with('employees',$employees)->with('clientRegistrations',$clientRegistrations);

        //return view('AdminPortal.Deploy');
    }

    public function deploymentStatus($requestID){
        //$contract = Contracts::findOrFail($contractID);
        $addGuardRequests = AddGuardRequests::findOrFail($requestID);
        //$clientRegistration = ClientRegistration::where('contract_id',$contractID)->get();
        $client = Clients::findOrFail($addGuardRequests->client_id);
        $tempDeployments = TempDeployments::all();
        $establishment = Establishments::findOrFail($addGuardRequests->establishments_id);
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

        return view('AdminPortal.ClientRequests.AddGuardRequests.DeploymentStatus')
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
                    ->with('addGuardRequests',$addGuardRequests)
                    ->with('completeAdd',$completeAdd);

        //return $tempDeployments;
    }

    public function deploy(Request $request){
        
         if($request->ajax()){

            $deployment = new Deployments();
            $addGuardRequest = AddGuardRequests::findOrFail($request->addGuardID);
            $guardDetails = DB::table('temp_deployments')
                            ->where('temp_deployments.contract_ID','=',$request->addGuardID)
                            ->join('temp_deployment_details','temp_deployments.temp_deployment_id','=','temp_deployment_details.temp_deployments_id')
                            ->where('temp_deployment_details.employees_id','=',$request->employeeID)
                            ->select('shift_from as shiftFrom','shift_to as shiftTo')
                            ->get();
                             
            $guardDeployedctr =  (int)$addGuardRequest->guardDeployed;
            //return $guardDeployedctr;
            $deployment['clients_id'] = $addGuardRequest->client_id;
            $deployment['establishment_id'] = $request->estabID;
            $deployment['num_guards'] = $request->num_guards;
            $deployment->save();

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
                EstabGuards::create(['strEstablishmentID'=>$request->estabID,'strGuardID'=>$request->employeeID,'dtmDateDeployed'=>Carbon::now(),'status'=>'active','shiftFrom'=>$request->shiftFrom,'shiftTo'=>$request->shiftTo,'contractID'=>$addGuardRequest->contract,'role'=>$request->role,'isReplaced'=>'0']);

                $addGuardRequest->guardDeployed = $guardDeployedctr;
                $addGuardRequest->save();
                if($addGuardRequest->no_guards == $addGuardRequest->guardDeployed){
                    $addGuardRequest->status = "done";
                    $addGuardRequest->save();
                }
                $guardInbox = new GuardMessagesInbox();
                $guardInbox['guard_messages_ID'] = 'GRDINBX-'.GuardMessagesInbox::get()->count();
                $guardInbox['guard_id'] = $request->employeeID;
                $guardInbox['subject'] = 'Deployment';
                $guardInbox['content'] = '';
                $guardInbox['status'] = 'active';
                $guardInbox['created_at'] = Carbon::now();
                $guardInbox['updated_at'] = Carbon::now();

                if($guardInbox->save()){
                    return response($guardDeployedctr);
                }
        }
    }

    public function view(Request $request){
        if($request->ajax()){
            $add_guard_requests = DB::table('add_guard_requests')
                            ->where('add_guard_requests.id','=',$request->id)
                            ->join('clients','clients.id','=','add_guard_requests.client_id')
                            ->join('establishments','establishments.id','=','add_guard_requests.establishments_id')
                            ->join('areas','areas.id','=','establishments.areas_id')
                            ->join('provinces','provinces.id','=','areas.provinces_id')
                            ->select('add_guard_requests.id','add_guard_requests.no_guards','add_guard_requests.status',
                                'add_guard_requests.contract as contract',
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
                            ->get();
           $clientCancelRequest = ClientCancelRequests::where('requestID',$request->id)->get();
            return view('AdminPortal.ClientRequests.AddGuardRequests.viewModal')
                    ->with('add_guard_request',$add_guard_requests[0])
                    ->with('clientCancelRequest',$clientCancelRequest);
        }
    }

    public function deployAddGuards($addGuardRequestsID){
        //return $addGuardRequestsID;
        $addGuardRequest = AddGuardRequests::findOrFail($addGuardRequestsID);
        $employees = Employees::all();
        $roles = Role::all();
        $shifts = Shifts::all();
        return view('AdminPortal.ClientRequests.AddGuardRequests.deployAddGuards')
                ->with('employees',$employees)
                ->with('clientID',$addGuardRequest->client_id)
                ->with('estabID',$addGuardRequest->establishments_id)
                ->with('shifts',$shifts)
                ->with('no_guards',$addGuardRequest->no_guards)
                ->with('contractID',$addGuardRequest->id)
                ->with('roles',$roles);
               
    }

    public function changeRejectedGuards(Request $request){
        $employees = Employee::all();
        $shifts = Shifts::all();
        $addGuardRequest = AddGuardRequests::findOrFail($request->contractID);
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
                ->with('contractID',$addGuardRequest->id)
                ->with('refuseCtr',$request->refuseCtr)
                ;
        //return $request->clientID;
    }
    public function remove(Request $request)
     {
         $id = $request -> id;
         $data = AddGuardRequests::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }


}
