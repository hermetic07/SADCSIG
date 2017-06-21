<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
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
      $employee = new Employee();
      $employee->id = "SECU001";
      $employee->first_name = $request->fname;
      $employee->middle_name = $request->mname;
      $employee->last_name = $request->lname;
      $employee->save();
      return "success";
    }

     public function view(Request $request)
     {
         if($request->ajax()){
           $employee = new Employee();
           $employee->id = "test";
           $employee->first_name = $request->f;
           $employee->save();
             $id = $request->id;
             $info = Role::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }

     public function test(){
       return view('test');
     }
}
