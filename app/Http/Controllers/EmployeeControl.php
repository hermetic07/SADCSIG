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
use Illuminate\Support\Facades\DB;

class EmployeeControl extends Controller
{

    public function SLogin(Request $request)
    {
      try
      {
        $count = Employee::where('email','=',$request->secu_username)->where('password','=',$request->secu_password)->where('status','!=','deleted')->count();

        if ($count===1) {
          $employee = Employee::where('email','=',$request->secu_username)->where('password','=',$request->secu_password)->get();
          foreach ($employee as $emp) {
            $key = $emp->id;
          }
          session(['user' => $key]);
          $e = Employee::find($key);
          return view('SecurityGuardsPortal.SecurityGuardsPortalHome')->with('employee',$e);
        }
        else {
            return view('clientloginform');
        }
      }
      catch (Exception $e)
      {
        return view('clientloginform');
      }


    }

    public function home(Request $request)
    {
      try {
        $value = $request->session()->get('user');
        $u = Employee::find($value);
        return view('SecurityGuardsPortal/SecurityGuardsPortalHome')->with('employee',$u);
      } catch (Exception $e) {
        return view('clientloginform');
      }

    }

    public function profile(Request $request)
    {
      try {
        $value = $request->session()->get('user');
        if($value!==null){
          $u = Employee::find($value);
          $education = EmployeeEducation::where("id",$value)->get();
          $degree = EmployeeDegree::where("id",$value)->get();
          $seminar = EmployeeSeminar::where("id",$value)->get();
          $military = EmployeeMilitary::where("id",$value)->get();
          $skill = EmployeeSkills::where("id",$value)->get();
          $attr = EmployeeAttributes::where("id",$value)->get();
          $count = 1;
          return view('SecurityGuardsPortal.SecurityGuardsPortalProfile')->with('employee',$u)->with('count',$count)->with('ed',$education)->with('d',$degree)->with('s',$seminar)->with('m',$military)->with('skill',$skill)->with('attr',$attr);
        }
        return view('clientloginform');

      } catch (Exception $e) {
        return view('clientloginform');
      }

    }

    public function messages(Request $request)
    {

      try {
        $value = $request->session()->get('user');
        if ($value!==null) {
          $u = Employee::find($value);
          $acceptedGuards = AcceptedGuards::where('guard_id',$u->id)->get();
          
          return view('SecurityGuardsPortal/SecurityGuardsPortalMessages')
                  ->with('employee',$u)
                  ->with('acceptedGuards',$acceptedGuards);
          //return $acceptedGuards;

        }
      } catch (Exception $e) {
        return view($e);
      }

    }
    public function showModal(Request $request){
      if($request->ajax()){
        $clientDeploymentNotif = ClientDeploymentNotif::findOrFail($request->deployment_notif_id);
        $tempDeployments = TempDeployments::where('messages_ID',$clientDeploymentNotif->notif_id)->get();
        $client = Clients::findOrFail($tempDeployments[0]->clients_id);
        $contract = Contracts::findOrFail($tempDeployments[0]->contract_ID);
        $establishment = Establishments::findOrFail($tempDeployments[0]->establishment_id);
        $tempDeploymentDetails = TempDeploymentDetails::where('temp_deployments_id',$tempDeployments[0]->temp_deployment_id)->get();
        $area = Area::findOrFail($establishment->areas_id);
        $province = Province::findOrFail($area->provinces_id);
        $completeAdd = $establishment->address.",".$area->name." ,".$province->name;
        $shift = "";
        foreach($tempDeploymentDetails as $tempDeploymentDetail){
          if($tempDeploymentDetail->employees_id == $request->secuID){
            $shift = $tempDeploymentDetail->shift_from." am-".$tempDeploymentDetail->shift_to." pm";
            break;
          }
        }
        return view('SecurityGuardsPortal.modal')
                ->with('client',$client)
                ->with('contract',$contract)
                ->with('shift',$shift)
                ->with('clientDeploymentNotif',$clientDeploymentNotif)
                ->with('completeAdd',$completeAdd)
                ->with('establishment',$establishment)
                ->with('secuID',$request->secuID)
                ->with('deployment_notif_id',$request->deployment_notif_id);
        //return response($completeAdd);
      }
    }
    public function saveResponse(Request $request){
      $acceptedGuard = DB::table('accepted_guards')
                           ->where('client_deployment_notif_id', $request->deployment_notif_id)
                           ->where('guard_id', $request->secuID);
      $acceptedGuard->update(['guard_reponse'=>'confirmed']);
      return redirect('/SecurityGuardsPortalMessages');
    }
    public function guardReject(Request $request){
      if($request->ajax()){
        $acceptedGuard = DB::table('accepted_guards')
                           ->where('client_deployment_notif_id', $request->deployment_notif_id)
                           ->where('guard_id', $request->secuID);
      
        if($acceptedGuard->update(['guard_reponse'=>'reject'])){
          $acceptedGuard->update(['reasons'=>$request->reason]);
          return response("Success!! We've sent your reasons.");
        }
      }
    }
    public function getReason(Request $request){
      if($request->ajax()){
        $acceptedGuard = DB::table('accepted_guards')
                        ->where('client_deployment_notif_id', $request->client_deployment_notif_id)
                        ->where('guard_id', $request->secuID)->get();
        return response($acceptedGuard[0]->reasons);
      }
    }
    public function request(Request $request)
    {
      try {
        $value = $request->session()->get('user');
        if ($value!==null) {
          $u = Employee::find($value);
          return view('SecurityGuardsPortal.SecurityGuardsPortalProfile')->with('employee',$u);
        }
      } catch (Exception $e) {
        return view('clientloginform');
      }

    }

    public function attendance(Request $request)
    {
      try {
        $value = $request->session()->get('user');
        if ($value!==null) {
          $u = Employee::find($value);
          return view('SecurityGuardsPortal/SecurityGuardsPortalAttendance')->with('employee',$u);
        }
      } catch (Exception $e) {
        return view('clientloginform');
      }

    }

    public function settings(Request $request)
    {
      try {
        $value = $request->session()->get('user');
        if ($value!==null) {
          $u = Employee::find($value);
          return view('SecurityGuardsPortal/SecurityGuardsPortalSettings')->with('employee',$u);
        }
      } catch (Exception $e) {
        return view('clientloginform');
      }

    }

    public function SLogout(Request $request)
    {
      $request->session()->forget('user');
      return view('clientloginform');
    }

    public function UpdateProfile(Request $request)
    {

      try {
        $value = $request->session()->get('user');
        if ($value!==null) {
          $u = Employee::find($value);
          $u->email = $request->email;
          $u->telephone = $request->telephone;
          $u->cellphone = $request->cellphone;
          $u->save();
          return "Update Success";
        }
      } catch (Exception $e) {
        return $e;
      }

    }

    public function UpdatePassword(Request $request)
    {

      try {
        $value = $request->session()->get('user');
        if ($value!==null) {
          $u = Employee::find($value);
          if ($u->password===$request->oldp) {
            $u->password=$request->oldp;
            $u->save();
            return "Password Has Been Changed";
          }
          else {
            return "Old password doesn't match";
          }
        }
      } catch (Exception $e) {
        return $e;
      }

    }

}
