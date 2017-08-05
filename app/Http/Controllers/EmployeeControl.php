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
use App\Leave;
use App\LeaveRequest;
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

    public function requests(Request $request)
    {
      try {
        $value = $request->session()->get('user');
        $u = Employee::find($value);
        $L = Leave::All();
        return view('SecurityGuardsPortal/SecurityGuardsPortalRequest')->with('employee',$u)->with('leave',$L);
      } catch (Exception $e) {
        return view('clientloginform');
      }

    }

    public function leaveInfo(Request $request)
    {
      try {
        $L = Leave::find($request->leave);
        return $L;
      } catch (Exception $e) {
        return $e;
      }

    }

    public function saveLeave(Request $request)
    {
      try {

        $LR = new LeaveRequest();
        $LR->employees_id=$request->id;
        $LR->leaves_id=$request->leave;
        $explod = explode('/',$request->notday);
        $LR->notif_date="$explod[2]-$explod[0]-$explod[1]";
        $explod = explode('/',$request->startday);
        $LR->start_date="$explod[2]-$explod[0]-$explod[1]";
        $explod = explode('/',$request->endday);
        $LR->end_date="$explod[2]-$explod[0]-$explod[1]";
        $LR->reason = $request->reason;
        $LR->status="pending";
        $LR->save();
        return "Request has been sent";
      } catch (Exception $e) {
        return $e;
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

    public function notifications(Request $request)
    {

      try {
        $value = $request->session()->get('user');
        if ($value!==null) {
          $u = Employee::find($value);
          $acceptedGuards = AcceptedGuards::where('guard_id',$u->id)->get();

          return view('SecurityGuardsPortal/SecurityGuardsPortalNotifications')
                  ->with('employee',$u)
                  ->with('acceptedGuards',$acceptedGuards);
          //return $acceptedGuards;

        }
      } catch (Exception $e) {
        return view($e);
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
       $acceptedGuard2 = DB::table('accepted_guards')
                           ->where('guard_id', $request->secuID);
                $acceptedGuard2->update(['guard_reponse'=>'reject']);
      $acceptedGuard = DB::table('accepted_guards')
                           ->where('client_deployment_notif_id', $request->deployment_notif_id)
                           ->where('guard_id', $request->secuID);
      $acceptedGuard->update(['guard_reponse'=>'confirmed']);
     // AcceptedGuards::where('client_deployment_notif_id','!=',$request->deployment_notif_id)->update(['guard_reponse'=>'reject']);


      //return response($ac);
      return redirect('/SecurityGuardsPortalMessages');
    }
    public function guardReject(Request $request){
      if($request->ajax()){
        $acceptedGuard = DB::table('accepted_guards')
                           ->where('client_deployment_notif_id', $request->deployment_notif_id)
                           ->where('guard_id', $request->secuID);


          $acceptedGuard->update(['reasons'=>$request->reason]);
          $acceptedGuard->update(['guard_reponse'=>'reject']);
          return response("Success!! We've sent your reasons.");

       // return response($request->deployment_notif_id);

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
