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
use App\TempDeployments;
use App\TempDeploymentDetails;
use App\AcceptedGuards;

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
    public function pending_client_requests(){
        $contracts = Contracts::latest('created_at')->get();
        $establishments = Establishments::all();
        $natures = Nature::all();
        return view('AdminPortal/PendingClientRequests')
                ->with('contracts',$contracts)->with('establishments',$establishments)->with('natures',$natures);
    }

    public function deploymentStatus($contractID){
        $tempDeployment = TempDeployments::where('contract_ID',$contractID)->get();
        $message_ID = $tempDeployment[0]->messages_ID;
        $tempDeploymentDetails = TempDeploymentDetails::all();
        $clientDeploymentNotifs = ClientDeploymentNotif::where('notif_id',$message_ID)->get();
        $client_deployment_notif_id = $clientDeploymentNotifs[0]->client_deloyment_notif_id;
        $notif_response = NotifResponse::where('client_deployment_notif_id',$client_deployment_notif_id)->get();
        $acceptedGuards = AcceptedGuards::where('client_deployment_notif_id',$client_deployment_notif_id)->get();
        $employees = Employee::all();
        
        return view('AdminPortal.DeploymentStatus')
                    ->with('tempDeployment',$tempDeployment)
                    ->with('tempDeploymentDetails',$tempDeploymentDetails)
                    ->with('notif_response',$notif_response)
                    ->with('clientDeploymentNotifs',$clientDeploymentNotifs)
                    ->with('employees',$employees)
                    ->with('acceptedGuards',$acceptedGuards);
        //return $notif_response;
    }
}
