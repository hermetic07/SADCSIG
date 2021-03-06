<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Swap;
use App\swapestab;
use App\swapnotif;
use App\SecurityLicense;
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
use Carbon\Carbon;
class SwapControl extends Controller
{
    public function index(Request $request){
        $value = $request->session()->get('user');
        $u = Employee::find($value);
        $estabid =  DB::table('tblestabguards')->where('strGuardID',$value)->first();
        try {
          $Establishments = DB::table('establishments')
          ->join('areas', 'areas.id', '=', 'establishments.areas_id')
          ->join('provinces', 'provinces.id', '=', 'establishments.province_id')
          ->select('establishments.id as id', 'establishments.name as name', 'establishments.address as address', 'provinces.name as pname', 'areas.name as aname')
          ->where('establishments.id','!=',$estabid->strEstablishmentID)
          ->get();
        } catch (Exception $e) {
          $Establishments = DB::table('establishments')
          ->join('areas', 'areas.id', '=', 'establishments.areas_id')
          ->join('provinces', 'provinces.id', '=', 'establishments.province_id')
          ->select('establishments.id as id', 'establishments.name as name', 'establishments.address as address', 'provinces.name as pname', 'areas.name as aname')
          ->get();
        }

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
        $s = Swap::find($request->id);
        $s->employeestatus = "accepted";

        $emp1 = $s->emp_id;
        $emp2 = $s->swap_emp_id;
        $estab1 = $s->establishment_from;
        $estab2 = $s->establishment_id;

        $tblestab1 = swapestab::All()->where('strEstablishmentID',$estab1)->where('strGuardID',$emp1)->first();
        $tblestab2 = swapestab::All()->where('strEstablishmentID',$estab2)->where('strGuardID',$emp2)->first();

        try{

            $swap1 = swapestab::where('strGuardID',$emp1)->first();
            $swap2 = swapestab::where('strGuardID',$emp2)->first();
            DB::table('tblestabguards')->where('strGuardID', '=', $emp1)->delete();
            DB::table('tblestabguards')->where('strGuardID', '=',$emp2)->delete();
            DB::table('tblestabguards')->insert(
                ['strEstablishmentID'=>$swap1->strEstablishmentID, 'contractID'=>$swap1->contractID, 'strGuardID'=>$emp2, 'dtmDateDeployed'=>$swap1->dtmDateDeployed, 'role'=>$swap1->role, 'status'=>$swap1->status, 'shiftFrom'=>$swap1->shiftFrom, 'shiftTo'=>$swap1->shiftTo, 'isReplaced'=>$swap1->isReplaced, 'created_at'=>$swap1->created_at, 'updated_at'=>$swap1->updated_at ]
            );
            DB::table('tblestabguards')->insert(
                ['strEstablishmentID'=>$swap2->strEstablishmentID, 'contractID'=>$swap2->contractID, 'strGuardID'=>$emp1, 'dtmDateDeployed'=>$swap2->dtmDateDeployed, 'role'=>$swap2->role, 'status'=>$swap2->status, 'shiftFrom'=>$swap2->shiftFrom, 'shiftTo'=>$swap2->shiftTo, 'isReplaced'=>$swap2->isReplaced, 'created_at'=>$swap2->created_at , 'updated_at'=>$swap2->updated_at ]
            );

        }catch(Exception $e){
            return $e;
        }
        $s->save();
        $notif = new swapnotif();
        $notif->emp_id = $s->emp_id;
        $notif->message = "Congratulations your swap request has been approved, report to the agency to finalize your request";
        $notif->status = "accepted";
        $notif->save();
        return "You have now been swaped to another establishment";
    }

    public function clientreject(Request $request){
        $s = Swap::find($request->id);
        $s->clientstatus = "rejected";
        $s->save();
        $notif = new swapnotif();
        $notif->emp_id = $s->emp_id;
        $notif->message = "Sorry but your request has been rejected by the guard's employer";
        $notif->status = "rejected";
        $notif->save();
        return "Request has been rejected";
    }

    public function guardreject(Request $request){
        $s = Swap::find($request->id);
        $s->employeestatus = "rejected";
        $s->save();
        $notif = new swapnotif();
        $notif->emp_id = $emp1;
        $notif->message = "Sorry but your request has been rejected by the guard";
        $notif->status = "rejected";
        $notif->save();
        return "Request has been rejected";
    }

    public function sampledate(Request $request){
        $s = SecurityLicense::All()->where('date_expired', '>=', date('2017-12-27'));
        return Carbon::today()->toDateString();
    }
}
