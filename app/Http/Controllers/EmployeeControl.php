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
class EmployeeControl extends Controller
{

    public function SLogin(Request $request)
    {
      try
      {
        $count = Employee::where('email','=',$request->secu_username)->where('password','=',$request->secu_password)->where('status','=','active')->count();

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
        if ($value!==null) {
          $value = $request->session()->get('user');
          $u = Employee::find($value);
          return view('SecurityGuardsPortal/SecurityGuardsPortalMessages')->with('employee',$u);
        }
      } catch (Exception $e) {
        return view('clientloginform');
      }

    }

    public function request(Request $request)
    {
      try {
        if ($value!==null) {
          $value = $request->session()->get('user');
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
        if ($value!==null) {
          $value = $request->session()->get('user');
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
        if ($value!==null) {
          $value = $request->session()->get('user');
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

}
