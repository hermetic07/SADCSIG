<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeAttributes;
use App\EmployeeDegree;
use App\EmployeeEducation;
use App\EmployeeLicense;
use App\EmployeeRequirements;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class RegisterControl extends Controller
{


    public function employeeReg(Request $request)
    {
      try {
        $count = Employee::get()->count();
        $employee = new Employee();
        $employee->id = "SECU".$count;
        $employee->username = "SECU".$count;
        $employee->password = "password";
        $employee->first_name = $request->fname;
        $employee->middle_name = $request->mname;
        $employee->last_name = $request->lname;

        $employee->address = $request->address;
        $employee->telephone = $request->telephone;
        $employee->cellphone = $request->cellphone;
        $employee->email = $request->email;
        $employee->save();



        $l = Input::get('license');
        foreach($l as $as) {
          $License = new EmployeeLicense();
          $License->employees_id = "SECU".$count;
          $License->license = $as;
          $License->save();
        }

        $r = Input::get('req');
        foreach($r as $as) {
          $Req = new EmployeeRequirements();
          $Req->employees_id = "SECU".$count;
          $Req->requirement = $as;
          $Req->save();
        }

        $E1 = new EmployeeEducation();
        $E1->employees_id = "SECU".$count;
        $E1->school_name = $request->primary;
        $E1->year_start = $request->primaryf;
        $E1->year_end = $request->primaryt;
        $E2 = new EmployeeEducation();
        $E2->employees_id ="SECU".$count;
        $E2->school_name = $request->secondary;
        $E2->year_start = $request->secondaryf;
        $E2->year_end = $request->secondaryt;
        $E3 = new EmployeeEducation();
        $E3->employees_id ="SECU".$count;
        $E3->school_name = $request->tertiary;
        $E3->year_start = $request->tertiaryf;
        $E3->year_end = $request->tertiaryt;
        $ED = new EmployeeDegree();
        $ED->employees_id ="SECU".$count;
        $ED->degree = $request->degree;
        $ED->save();

      } catch (Exception $e) {
        return $e;
      }
      return "Registration Complete. Pls wait for the company to contact you";
    }

     public function view(Request $request)
     {
         return view('last.secus');
     }

     public function test(){
       return view('test');
     }
}
