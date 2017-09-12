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
    public function view(Request $request){
        if($request->ajax()){
            $add_guard_requests = DB::table('add_guard_requests')
                            ->where('add_guard_requests.id','=',$request->id)
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
                            ->get();
            //return response($add_guard_requests);
            return view('AdminPortal.ClientRequests.AddGuardRequests.viewModal')
                    ->with('add_guard_request',$add_guard_requests[0]);
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
