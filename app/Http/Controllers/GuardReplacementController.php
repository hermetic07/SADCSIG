<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Establishments;
use App\Employees;
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
    								->join('areas','areas.id','=','establishments.areas_id')
                        			->join('provinces','provinces.id','=','areas.provinces_id')
                        			->orderBy('guard_replacement_requests.created_at','desc')
                        			->select('guard_replacement_requests.requestID as requestCode',
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
                        					'replacement_requests_details.reasons')
    								->get();
    		return view('AdminPortal\ClientRequests\GuardReplacementRequests.viewModal')
    				->with('guardReplacementDetails',$guardReplacementDetails[0])
    				->with('guards',$guardReplacementDetails);
    	}
    }	

    public function deployReplacement($guardReplacementID){

        $guardReplacementRequests = DB::table('guard_replacement_requests')
                                    ->where('guard_replacement_requests.requestID','=',$guardReplacementID)
                                    ->get();
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
}
