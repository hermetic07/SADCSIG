<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeAttributes;
use App\EmployeeDegree;
use App\EmployeeEducation;
use App\EmployeeLicense;
use App\EmployeeMilitary;
use App\EmployeeSeminar;
use App\EmployeeRequirements;
use App\EmployeeSkills;
use App\Swap;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
use App\ClientDeploymentNotif;
use App\AcceptedGuards;
use App\TempDeployments;
use App\TempDeploymentDetails;
use App\Clients;
use App\Contracts;
use App\Establishments;
use App\Area;
use App\Province;
use App\Leave;
use App\LeaveRequest;
use App\LeaveResponse;
use Illuminate\Support\Facades\DB;
use App\GuardMessagesInbox;

class SwapControl extends Controller
{
    public function index(Request $request){
        $value = $request->session()->get('user');
        $u = Employee::find($value);
        $Establishments = DB::table('establishments')
        ->join('areas', 'areas.id', '=', 'establishments.areas_id')
        ->join('provinces', 'provinces.id', '=', 'establishments.province_id')
        ->select('establishments.id as id', 'establishments.name as name', 'establishments.address as address', 'provinces.name as pname', 'areas.name as aname')
        ->get();
        return view("SecurityGuardsPortal.Swap")->with('employee',$u)->with('es',$Establishments);
    }

    public function two($id, Request $request)
    {
        $value = $request->session()->get('user');
        $u = Employee::find($value);
        $guards = DB::table('tblestabguards')
        ->join('employees', 'employees.id', '=', 'tblestabguards.strGuardID')
        ->select('employees.id as eid', 'tblestabguards.strEstablishmentID as esid', 'employees.image as image', 'employees.first_name as fname', 'employees.middle_name as mname', 'employees.last_name as lname', 'tblestabguards.shiftFrom as shiftfrom', 'tblestabguards.shiftTo as shiftto' )
        ->where('tblestabguards.strEstablishmentID',$id)
        ->where('employees.id','!=',$u->id)
        ->get();
        return view("SecurityGuardsPortal.SwapTwo")->with('emp',$guards)->with('employee',$u);
    }

    public function three(Request $request){
        $data = DB::table('deployments')
        ->select('deployments.clients_id as cid')
        ->where('deployments.establishment_id',$request->est)
        ->first();
        $value = $request->session()->get('user');
        $estabfrom = DB::table('tblestabguards')
                    ->select('tblestabguards.strEstablishmentID as estabfrom')
                    ->where('tblestabguards.strGuardID',$value)
                    ->orderBy('updated_at', 'DESC')
                    ->first();
        $s = new Swap();
        $s->emp_id= $value;
        $s->client_id=  $data->cid;
        $s->swap_emp_id= $request->emp;
        $s->establishment_id= $request->est;
        $s->establishment_from= $estabfrom->estabfrom;
        $s->clientstatus = "pending";
        $s->employeestatus= "pending";
        $s->save();
        return "true";
    }

    public function clientaccept(Request $request){
        $s = Swap::find($request->id);
        $s->clientstatus = "accepted";
        $s->save();
        return "success";
    }

    public function guardaccept(Request $request){
        
    }
}