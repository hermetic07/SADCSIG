<?php

namespace App\Http\Controllers;

use App\Establishments;
use App\Deployments;
use App\DeploymentDetails;
use Illuminate\Http\Request;
use App\Employees;
use App\EmployeeEducation;


class SGPortalHomeController extends Controller
{

    public function home(){
    	$establishments = Establishments::all();
		$deployments = Deployments::all();
		$deploymentDetails = DeploymentDetails::all();
		$employee = Employees::findOrFail('SECU0');
    	return view('SecurityGuardsPortal.SecurityGuardsPortalHome')->with('establishments',$establishments)->with('deployments',$deployments)->with('deploymentDetails',$deploymentDetails)->with('employee',$employee);
    }
    public function sgprofile(){
    	$employee = Employees::findOrFail('SECU0');
    	$educs =  EmployeeEducation::all();
    	return view('SecurityGuardsPortal.SecurityGuardsPortalProfile')->with('employee',$employee)->with('educs',$educs);
    }
}
