<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRequest;
use App\Clients;
use App\Establishments;
use App\Area;
use App\Province;
use App\Gun;
use App\Contract;
use App\Service;
use App\Deployments;
use App\DeploymentDetails;
use App\Employees;

class ClientPortalHomeController extends Controller
{
    
    public function index(){
    	$Services = Service::all();
	    $clients = Clients::all();
	    $establishment = Establishments::findOrFail('1');
     	$guns = Gun::all();
      $contracts = Contract::all();
      $serviceRequests = ServiceRequest::all();
      $deployments = Deployments::all();
      $deploymentDetails = DeploymentDetails::all();
      $deploymentDetails = DeploymentDetails::all();

	    return view('ClientPortal.ClientPortalHome
        ')->with('services',$Services)->with('clients',$clients)->with('guns',$guns)->with('contracts',$contracts)->with('establishment',$establishment)->with('serviceRequests',$serviceRequests)->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails);
	}

  public function guardDtr(){
    $deployments = Deployments::all();
    $deploymentDetails = DeploymentDetails::latest('created_at')->get();
    $establishment = Establishments::findOrFail('1');
    $employees = Employees::all();
    $serviceRequests = ServiceRequest::all();
    $Services = Service::all();

    return view('ClientPortal.ClientPortalGuardsDTR')->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('employees',$employees)->with('serviceRequests',$serviceRequests)->with('establishment',$establishment)->with('services',$Services);
  }
}
