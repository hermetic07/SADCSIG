<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Employee;
use App\Attendance;
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
use App\Swap;
use App\swapnotif;
use App\LeaveRequest;
use App\LeaveResponse;
use Illuminate\Support\Facades\DB;
use App\GuardMessagesInbox;
use App\Announcements;
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
                   $stat= 1;
          return view('clientloginform')->with('stat',$stat);
        }
      }
      catch (Exception $e)
      {
          $stat= 0;
          return view('clientloginform')->with('stat',$stat);
      }


    }

    public function home(Request $request)
    {
      try {
        $value = $request->session()->get('user');
        $u = Employee::find($value);
        $a = DB::table('announcement')
                ->orderBy('created_at', 'desc')
                ->get();
        return view('SecurityGuardsPortal/SecurityGuardsPortalHome')->with('employee',$u)->with('a',$a);
      } catch (Exception $e) {
          $stat= 0;
          return view('clientloginform')->with('stat',$stat);
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
            $stat= 0;
          return view('clientloginform')->with('stat',$stat);
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
        $value = $request->session()->get('user');
        $u = Employee::find($value);
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
        $LR->deployed=$u->status;
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
          $education = EmployeeEducation::where("employees_id",$value)->get();
          $degree = EmployeeDegree::where("employees_id",$value)->get();
          $seminar = EmployeeSeminar::where("employees_id",$value)->get();
          $military = EmployeeMilitary::where("employees_id",$value)->get();
          $skill = EmployeeSkills::where("employees_id",$value)->get();
          $attr = EmployeeAttributes::where("employees_id",$value)->get();
          $count = 1;
          return view('SecurityGuardsPortal.SecurityGuardsPortalProfile')->with('employee',$u)->with('count',$count)->with('ed',$education)->with('d',$degree)->with('s',$seminar)->with('m',$military)->with('skill',$skill)->with('attr',$attr);
        }
          $stat= 0;
          return view('clientloginform')->with('stat',$stat);

      } catch (Exception $e) {
            $stat= 0;
          return view('clientloginform')->with('stat',$stat);
      }

    }

    public function notifications(Request $request)
    {

      try {
        $value = $request->session()->get('user');
        if ($value!==null) {
          $u = Employee::find($value);
          $acceptedGuards = AcceptedGuards::where('guard_id',$u->id)->get();
          $swap = swapnotif::All()->where('emp_id',$u->id);
          return view('SecurityGuardsPortal/SecurityGuardsPortalNotifications')
                  ->with('employee',$u)
                  ->with('swap',$swap)
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
          $reliever = DB::table('leave_response')
          ->join('leave_request', 'leave_request.id', '=', 'leave_response.leave_request_id')
          ->select('leave_response.id as lr', 'leave_response.leave_request_id as id2', 'leave_request.start_date as sd', 'leave_request.end_date as ed','leave_response.status as stat'  )
          ->where('leave_response.employees_id',$u->id)
          ->get();

          $swap = DB::table('tblswaprequest')
          ->join('employees','employees.id','=','tblswaprequest.emp_id')
          ->join('establishments','establishments.id','=','tblswaprequest.establishment_from')
          ->select('employees.first_name as fname',
                   'employees.image as image',
                   'employees.last_name as lname',
                   'establishments.name as estab',
                   'establishments.address as address',
                   'tblswaprequest.id as id')
          ->where('tblswaprequest.swap_emp_id',$value)
          ->where('tblswaprequest.clientstatus','accepted')
          ->where('tblswaprequest.employeestatus','pending')
          ->get();

          $inboxs = DB::table('guard_messages_inbox')
                 ->where('guard_messages_inbox.status','!=','deleted')
                 ->where('guard_messages_inbox.guard_id','=',$u->id)
                 ->join('tblestabguards','tblestabguards.strGuardID','=','guard_messages_inbox.guard_id')
                 ->orderBy('guard_messages_inbox.created_at','desc')
                 ->select('guard_messages_inbox.guard_messages_ID as messageID',
                          'guard_messages_inbox.subject as subject',
                          'guard_messages_inbox.guard_id as guard_id',
                          'guard_messages_inbox.created_at as created_at',
                          'tblestabguards.strEstablishmentID as establishment_id',
                          'tblestabguards.contractID as contractID',
                          'tblestabguards.dtmDateDeployed as dateDeployed',
                          'tblestabguards.shiftFrom',
                          'tblestabguards.shiftTo')
                 ->get();
          return view('SecurityGuardsPortal/SecurityGuardsPortalMessages')
                  ->with('employee',$u)
                  ->with('inboxs',$inboxs)
                  ->with('acceptedGuards',$acceptedGuards)
                  ->with('reliever',$reliever)
                  ->with('swap',$swap);
          //return $acceptedGuards;

        }
      } catch (Exception $e) {
        return view($e);
      }

    }
    public function openInbox(Request $request){
      if($request->ajax()){
        $tblestabguards = DB::table('tblestabguards')
                        ->where('tblestabguards.strEstablishmentID','=',$request->establishment_id)
                        ->where('tblestabguards.contractID','=',$request->contractID)
                        ->where('tblestabguards.strGuardID','=',$request->guard_id)
                        ->join('establishments','establishments.id','=','tblestabguards.strEstablishmentID')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->join('natures','natures.id','=','establishments.natures_id')
                        ->select('tblestabguards.contractID as contractID',
                          'tblestabguards.dtmDateDeployed as dateDeployed',
                          'tblestabguards.shiftFrom',
                          'tblestabguards.shiftTo',
                          'establishments.id as estabID',
                          'establishments.image',
                          'establishments.loc_image',
                          'establishments.pic_fname',
                          'establishments.pic_lname',
                          'establishments.pic_mname',
                          'establishments.name as establishment',
                          'establishments.address as address',
                          'areas.name as area',
                          'provinces.name as province','natures.name as nature')
                        ->get()[0];
        return view('SecurityGuardsPortal.inbox_modal')
                ->with('tblestabguards',$tblestabguards);
      }
    }
    public function openInboxReplace(Request $request){
      if($request->ajax()){
        $tblestabguards = DB::table('tblestabguards')
                        ->where('tblestabguards.strEstablishmentID','=',$request->establishment_id)
                        ->where('tblestabguards.contractID','=',$request->contractID)
                        ->where('tblestabguards.strGuardID','=',$request->guard_id)
                        ->join('establishments','establishments.id','=','tblestabguards.strEstablishmentID')
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->join('natures','natures.id','=','establishments.natures_id')
                        ->select('tblestabguards.contractID as contractID',
                          'tblestabguards.dtmDateDeployed as dateDeployed',
                          'tblestabguards.shiftFrom',
                          'tblestabguards.shiftTo',
                          'establishments.id as estabID',
                          'establishments.image',
                          'establishments.loc_image',
                          'establishments.pic_fname',
                          'establishments.pic_lname',
                          'establishments.pic_mname',
                          'establishments.name as establishment',
                          'establishments.address as address',
                          'areas.name as area',
                          'provinces.name as province','natures.name as nature')
                        ->get()[0];
        $replacement_request = DB::table('guard_replacement_requests')
                                ->where('guard_replacement_requests.contractID','=',$request->contractID)

                                ->join('replacement_requests_details','replacement_requests_details.replacement_requests_id','=','guard_replacement_requests.requestID')
                                ->where('replacement_requests_details.employees_id','=',$request->guard_id)
                                ->select('replacement_requests_details.reasons')
                                ->get();
                              //  return count($replacement_request);
        return view('SecurityGuardsPortal.replacement_inbox_modal')
                ->with('tblestabguards',$tblestabguards)
                ->with('reasons',$replacement_request[0]);
      }
    }
    public function deleteMessage(Request $request){
      if($request->ajax()){
         $id = $request -> messageID;
         $data = GuardMessagesInbox::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
      }
    }
    public function showModal(Request $request){
      if($request->ajax()){
        $clientDeploymentNotif = ClientDeploymentNotif::findOrFail($request->deployment_notif_id);
        $tempDeployments = TempDeployments::where('messages_ID',$clientDeploymentNotif->notif_id)->get();
        $client = Clients::findOrFail($tempDeployments[0]->clients_id);
       // $contract = Contracts::findOrFail($tempDeployments[0]->contract_ID);
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
                //->with('contract',$contract)
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
        $stat= 0;
          return view('clientloginform')->with('stat',$stat);
      }

    }

    public function attendance(Request $request)
    {
      try {
        $value = $request->session()->get('user');
        if ($value!==null) {
          $u = Employee::find($value);
          $events = [];
          $value = $request->session()->get('user');
          $data = Attendance::all()->where('secu_id',$value);
          if($data->count()) {
              foreach ($data as $key => $value) {
                  $events[] = Calendar::event(
                      $value->description,
                      true,
                      new \DateTime($value->date),
                      new \DateTime($value->date.' +1 day'),
                      null,
                      // Add color and link on event
                   [
                       'color' => '#1A5276',
                   ]              );
              }
          }
          $calendar = Calendar::addEvents($events);
          return view('SecurityGuardsPortal/SecurityGuardsPortalAttendance', compact('calendar'))->with('employee',$u);
        }
      } catch (Exception $e) {
          $stat= 0;
          return view('clientloginform')->with('stat',$stat);
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
        $stat= 0;
          return view('clientloginform')->with('stat',$stat);
      }

    }

    public function SLogout(Request $request)
    {
      $request->session()->forget('user');
    $stat= 0;
          return view('clientloginform')->with('stat',$stat);
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
        if ($value!==null&&$value!=="") {
          $u = Employee::find($value);
            if ($request->newp!==null&&$request->newp!=="") {
              $u->password=bcrypt($request->newp);
              $u->save();
              return "Password Has Been Changed";
            }
            else {
              return "password cannot be blank";
            }

        }
        else {
          return "password cannot be blank";
        }
      } catch (Exception $e) {
        return $e;
      }

    }

    public function allLeave()
    {
      $resignations =  DB::table('resignation')
                      ->join('employees', 'employees.id', '=', 'resignation.secu_id')
                      ->select('resignation.id as id', 'employees.id as empid', 'employees.first_name as fname', 'employees.last_name as lname', 'employees.cellphone as cp', 'employees.telephone as telephone', 'employees.street as street', 'employees.city as city', 'employees.barangay as barangay', 'employees.image as image', 'resignation.reason as reason' , 'resignation.date as date','resignation.status as status')
                      ->where('resignation.status','pending')
                      ->get();

      $leavelist =  DB::table('leave_request')
                      ->join('employees', 'employees.id', '=', 'leave_request.employees_id')
                      ->select('leave_request.id as id',  'employees.first_name as fname', 'employees.last_name as lname', 'employees.cellphone as cp', 'employees.telephone as telephone', 'employees.street as street', 'employees.city as city', 'employees.barangay as barangay', 'employees.image as image', 'leave_request.reason as reason' , 'leave_request.notif_date as ndate', 'leave_request.start_date as sdate', 'leave_request.end_date as edate', 'leave_request.status as status' )
                      ->get();

      return view('AdminPortal.PendingGuardRequests')->with('leavelist',$leavelist)->with('res',$resignations);
    }

    public function viewLeave(Request $r)
    {
      $leavelist =  LeaveRequest::find( $r->id );
      $collection = collect([$leavelist->employees_id]);
      $secus = DB::table('employees')
          ->whereNotIn('id', $collection)
          ->where('status','waiting')
          ->get();
      $test="";
      foreach ($secus as $s) {
        $test.="
        <tr>
        <td>
                     <div class='el-card-item'>
                       <div class='el-card-avatar el-overlay-1'>
                         <a href='{{url('/SecuProfile')}}'><img src='uploads/$s->image' alt='user'  class='img-circle img-responsive'></a>
                           <div class='el-overlay'>
                             <ul class='el-info'>
                               <li><a class='btn default btn-outline' href='{{url('/SecuProfile')}}' target='_blank'><i class='fa fa-info'></i></a></li>
                             </ul>
                           </div>
                        </div>
                      </div>
         </td>
         <td>$s->first_name $s->middle_name $s->last_name</td>
         <td>$s->city</td>
         <td>
                         <div class='radio radio-info'>
                           <input type='radio' name='select' id='radio3' value='$s->id'>
                           <label for='radio3'> Select </label>
                         </div>
         </td>
         </tr>";
      }
      $leave = Leave::find($leavelist->leaves_id);
      $data = [
        'id'=>$leavelist->id,
        'leave'=>$leave->name,
        'status'=>$leavelist->status,
        'notif_date'=>$leavelist->notif_date,
        'start_date'=>$leavelist->start_date,
        'end_date'=>$leavelist->end_date,
        'reason'=>$leavelist->reason,
        'notifdays'=>$leave->notification,
        'allowdays'=>$leave->days,
        'body'=>$test,
      ];
      return $data;
    }

    public function acceptLeave(Request $r)
    {
      try {
        $l = new LeaveResponse();
        $l->leave_request_id = $r->id;
        $l->employees_id= $r->empid;
        $l->status= "pending";
        $l->save();
        return "Reliever Request Sent";
      } catch (Exception $e) {
        return $e;
      }

    }

    public function rejectLeave(Request $r)
    {
      try {
        $leave =  LeaveResponse::find( $r->rid );
        $leave->status="REJECTED";
        $leave->save();
        $leavelist =  LeaveRequest::find( $leave->leave_request_id );
        $leavelist->status="denied";
        $leavelist->save();

        return "Leave Rejected";
      } catch (Exception $e) {
        return $e;
      }

    }

    public function acceptLeave2(Request $r)
    {
      $value = $r->session()->get('user');
      $u = Employee::find($value);
      if($u->status==="reliever"){
          return "You cant accept this because you are already a reliever";
      }
      else if ($u->status==="leave"){
        return "You cant accept this because you are in leave";
      }
      try {
        $leave =  LeaveResponse::find( $r->rid );
        $leave->status="ACCEPTED";
        $leave->save();
        $leavelist =  LeaveRequest::find( $leave->leave_request_id );
        $leavelist->status="accepted";
        $leavelist->save();
        $emp = Employee::find($leavelist->employees_id);
        $emp->status = "Leaving";
        $emp->save();
        $u->status = "reliever";
        $u->save();
        return "Leave Accepted";
      } catch (Exception $e) {
        return $e;
      }
    }

    public function viewLeave2(Request $r)
    {
      try {

        $leave =  LeaveRequest::find( $r->id );
        $emp = Employee::find($leave->employees_id);
        $img = "<img src='uploads/$emp->image' alt=''>";
        $data = [
          'img'=>$img,
          'name'=> $emp->first_name." ". $emp->middle_name." ". $emp->last_name." ",
          'notif'=>$leave->notif_date,
          'start'=>$leave->start_date,
          'end'=>$leave->end_date,
          'reason'=>$leave->reason,
        ];
        return $data;

      } catch (Exception $e) {
        return $e;
      }
    }

    public function endLeave(Request $r)
    {
      try {

        $leavelist =  LeaveRequest::find( $r->id );
        $leavelist->status="ended";
        $leavelist->save();
        $employee = Employee::find($leavelist->employees_id);
        $employee->status=$leavelist->deployed;
        $employee->save();
        $lr = LeaveResponse::All()->where('leave_request_id', $r->id )->where('status', "ACCEPTED" )->first();
        $emp = Employee::find($lr->employees_id);
        $emp->status="waiting";
        $emp->save();
        return "Leave Ended";
      } catch (Exception $e) {
        return $e;
      }

    }
    public function incident(Request $r)
    {
      try {
        $value = $r->session()->get('user');
        $estab=DB::table('tblestabguards')
            ->select('strEstablishmentID')
            ->where('strGuardID',$value)
            ->first();
        $nature=DB::table('establishments')
            ->select('natures_id')
            ->where('id',$estab->strEstablishmentID)
            ->first();

        DB::table('tblincident')->insert(
          ['emp_id' => $value, 'estab_id' => $estab->strEstablishmentID, 'estabtype_id' => $nature->natures_id, 'report' => $r->data, 'date' => $r->date,]
        );
        return "Report Sent";
      } catch (Exception $e) {
        return $e;
      }

    }

    public function sendResign(Request $r)
    {
      try {
        $value = $r->session()->get('user');
        DB::table('resignation')->insert(
          ['secu_id' => $value, 'reason' => $r->reason, 'date' => $r->date, 'status' => "pending",]
        );
        return "Success";
      } catch (Exception $e) {
        return $e;
      }

    }

    public function acceptResign(Request $r){
      DB::table('resignation')
            ->where('secu_id', $r->id)
            ->update(['status' => "accepted"]);

      $employee = Employee::find($r->id);
      $employee->status = "deleted";
      $employee->save();
      return "Success";
    }

    public function rejectResign(Request $r){
      DB::table('resignation')
            ->where('secu_id', $r->id)
            ->update(['status' => "rejected"]);
      return "Success";
    }

}
