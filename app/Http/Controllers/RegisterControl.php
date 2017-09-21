<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\SecurityLicense;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Mail;
use Illuminate\Support\Facades\DB;
use Exception;
class RegisterControl extends Controller
{

    
    public function employeeReg(Request $request)
    {

      try {
        //basic info
        $duplicate = Employee::where("email",'=',$request->email)->count();
        if ($duplicate>0) {
          return "email is already existing";
        }
        $count = Employee::get()->count();
        $employee = new Employee();
        $employee->id = "SECU".$count;
        $test = "SECU".$count;
        session(['key' => $test]);
        $employee->password = bcrypt("password");
        $employee->first_name = $request->fname;
        $employee->middle_name = $request->mname;
        $employee->last_name = $request->lname;
        $employee->gender = $request->gender;
        $employee->marital_status = $request->marital;
        $explod = explode('/',$request->bday);
        $meetDt = "$explod[2]-$explod[0]-$explod[1]";
        $employee->birth = $meetDt;
        $employee->street = $request->street;
        $employee->barangay = $request->barangay;
        $employee->city = $request->city;
        $employee->telephone = $request->telephone;
        $employee->cellphone = $request->cellphone;
        $employee->email = $request->email;
        session(['email' => $request->email]);
        $employee->status = "pending";

        $employee->deployed = 0;
        $employee->save();
        //start of security license
        $sl = new SecurityLicense();
        $sl->employee_id = "SECU".$count;
        $sl->license_num = $request->licensenum;
        $sl->class= $request->licenseclass;
        $explod = explode('/',$request->dateissued);
        $di = "$explod[2]-$explod[0]-$explod[1]";
        $sl->date_issued=$di ;
        $explod = explode('/',$request->dateexpire);
        $de = "$explod[2]-$explod[0]-$explod[1]";
        $sl->date_expired= $de;
        $sl->save();
        // start of body attributes
        $index1 = 0;
        $aname = Input::get('aname');
        $attr = Input::get('attr');
        try {
          foreach($aname as $a) {
            $index2 = 0;
            $empatt = new EmployeeAttributes();
            $empatt->employees_id = "SECU".$count;
            $empatt->attribute = $a;
            foreach($attr as $b)
            {
              if($index1===$index2)
              {
                $empatt->size = $b;
                $empatt->save();
              }
              $index2+=1;
            }
            $index1+=1;
          }
        } catch (Exception $e) {
        }

        // start of military Service
        $index1 = 0;
        $allmilitary = Input::get('allmilitary');
        $allrank = Input::get('allrank');
        $allserial = Input::get('allserial');
        $alldatef = Input::get('alldatef');
        $alldatet = Input::get('alldatet');
        try {
          foreach($allmilitary as $a) {
            $index2 = 0;
            $index3 = 0;
            $index4 = 0;
            $index5 = 0;
            $empm = new EmployeeMilitary();
            $empm->employees_id = "SECU".$count;
            $empm->military_services_id = $a;
            foreach($allrank as $b)
            {
              if($index1===$index2)
              {
                $empm->ranks_id = $b;
              }
              $index2+=1;
            }
            foreach($allserial as $b)
            {
              if($index1===$index3)
              {
                $empm->serial_number = $b;
              }
              $index3+=1;
            }
            foreach($alldatef as $b)
            {
              if($index1===$index4)
              {
                $empm->from = $b;
              }
              $index4+=1;
            }
            foreach($alldatet as $b)
            {
              if($index1===$index5)
              {
                $empm->to = $b;
                $empm->save();
              }
              $index5+=1;
            }
            $index1+=1;
          }
        } catch (Exception $e) {

        }

        // seminars and trainings
        $index1 = 0;
        $allseminar = Input::get('allseminar');
        $allrating = Input::get('allrating');
        $alldatetaken = Input::get('alldatetaken');
        try {
          foreach($allseminar as $a) {
            $index2 = 0;
            $index3 = 0;
            $empm = new EmployeeSeminar();
            $empm->employees_id = "SECU".$count;
            $empm->name = $a;
            foreach($allrating as $b)
            {
              if($index1===$index2)
              {
                $empm->rating = $b;
              }
              $index2+=1;
            }
            foreach($alldatetaken as $b)
            {
              if($index1===$index3)
              {
                $explods = explode('/',$b);
                $meetDt = "$explods[2]-$explods[0]-$explods[1]";
                $empm->date = $meetDt;
                $empm->save();
              }
              $index3+=1;
            }
            $index1+=1;
          }
        } catch (Exception $e) {

        }

        // start of licenses
        try {
          $l = Input::get('license');
          foreach($l as $as) {
            $License = new EmployeeLicense();
            $License->employees_id = "SECU".$count;
            $License->license = $as;
            $License->save();
          }
        } catch (Exception $e) {

        }

        //start of requirement
        try {
          $r = Input::get('req');
          foreach($r as $as) {
            $Req = new EmployeeRequirements();
            $Req->employees_id = "SECU".$count;
            $Req->requirement = $as;
            $Req->save();
          }
        } catch (Exception $e) {

        }

        //start of talent
        try {
          $alltalent = Input::get('alltalent');
          foreach($alltalent as $as) {
            $talents = new EmployeeSkills();
            $talents->employees_id = "SECU".$count;
            $talents->name = $as;
            $talents->save();
          }
        } catch (Exception $e) {
          return $e;
        }


        $E1 = new EmployeeEducation();
        $E1->employees_id = "SECU".$count;
        $E1->school_name = $request->primary;
        $E1->year_start = $request->primaryf;
        $E1->year_end = $request->primaryt;
        $E1->save();
        $E2 = new EmployeeEducation();
        $E2->employees_id ="SECU".$count;
        $E2->school_name = $request->secondary;
        $E2->year_start = $request->secondaryf;
        $E2->year_end = $request->secondaryt;
        $E2->save();
        $E3 = new EmployeeEducation();
        $E3->employees_id ="SECU".$count;
        $E3->school_name = $request->tertiary;
        $E3->year_start = $request->tertiaryf;
        $E3->year_end = $request->tertiaryt;
        $E3->save();
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

     public function saveImage(Request $request){
       $count =0;
       $value = $request->session()->get('key');
       $employee = Employee::find($value);
       if (Input::hasFile('picture')) {
         $file = Input::file('picture');
         $file->move('uploads', $value.$file->getClientOriginalName());
         $employee->image = $value.$file->getClientOriginalName();
         $count+=1;
       }
       if (Input::hasFile('locationpic')) {
         $file = Input::file('locationpic');
         $file->move('uploads', $value.$file->getClientOriginalName());
         $employee->location_image = $value.$file->getClientOriginalName();
         $count+=1;
       }
       if ($count!==0) {
         $employee->save();

       }
       $request->session()->forget('key');
       $value2 = $request->session()->get('email');
       $request->session()->forget('email');
       return redirect('/Applicants');

     }

     public function hire(Request $request)
     {
        $employees = Employee::where("status" , "pending" )->get();
        return view('AdminPortal/Applicants')->with('employee',$employees);
     }

     public function guards(Request $request)
     {
        $employees = Employee::where("status" ,"!=" , "deleted" )->where("status" ,"!=" , "pending" )->get();
        return view('AdminPortal/SecurityGuards')->with('employee',$employees);
     }

     public function approve(Request $request)
     {
       $employee = Employee::find($request->id);
       $employee->status = "waiting"; //because when hired, they are automatically waiting  for a client
       $employee->save();
       $data = [
                  'email'   => $employee->email,
                  'pw'   => $employee->password,
                  'fname' => $employee->first_name,
                  'mname' => $employee->middle_name,
                  'lname' => $employee->last_name

              ];

        Mail::send('mail', $data, function($message) use ($data)
        {
                $message->to($data['email']);
                $message->subject($data['fname']);
        });

        $data2 = [
                   'email'   => $employee->email,
                   'pw'   => $employee->password,
                   'fname' => $employee->first_name,
                   'mname' => $employee->middle_name,
                   'lname' => $employee->last_name,
                   'picture' => $employee->image

               ];

        return $data2 ;
     }

     public function approve2(Request $request)
     {
       $employee = Employee::find($request->id);
       $employee->status = "waiting";
       $employee->save();
       $data = [
                  'email'   => $employee->email,
                  'pw'   => $employee->password,
                  'fname' => $employee->first_name,
                  'mname' => $employee->middle_name,
                  'lname' => $employee->last_name

              ];

        $data2 = [
                   'email'   => $employee->email,
                   'pw'   => $employee->password,
                   'fname' => $employee->first_name,
                   'mname' => $employee->middle_name,
                   'lname' => $employee->last_name,
                   'picture' => $employee->image

               ];

        return $data2 ;
     }

     public function remove(Request $request)
     {
        $employee = Employee::find($request->id);
        $employee->status = "deleted";
        $employee->save();
        return "Applicant has been remove";
     }

     public function secuProfile($id)
     {
        $employee = Employee::find($id);
        $education = EmployeeEducation::where("employees_id",$id)->get();
        $degree = EmployeeDegree::where("employees_id",$id)->get();
        $seminar = EmployeeSeminar::where("employees_id",$id)->get();
        $military = EmployeeMilitary::where("employees_id",$id)->get();
        $skill = EmployeeSkills::where("employees_id",$id)->get();
        $attr = EmployeeAttributes::where("employees_id",$id)->get();
        $count = 1;
        return view('SecuProfile')->with('employee',$employee)->with('count',$count)->with('ed',$education)->with('d',$degree)->with('s',$seminar)->with('m',$military)->with('skill',$skill)->with('attr',$attr);
     }

     public function guardslicense(){

      $all = DB::table('employees')
      ->join('security_license', 'employees.id', '=', 'security_license.employee_id')
      ->select('employees.id as empid','employees.image as image','employees.first_name as f', 'employees.middle_name as m', 'employees.last_name as l', 'security_license.license_num as licensenum', 'security_license.class as class', 'security_license.date_issued as date_issued', 'security_license.date_expired as date_expired' )
      ->where('employees.status',"!=","pending")
      ->where('employees.status',"!=","deleted")
      ->get();
      return view('AdminPortal/GuardLicenses')->with("all",$all);
     }
}
