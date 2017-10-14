<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Employee;
use App\Establishments;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use DB;
use Excel;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class DTR extends Controller
{

  public function index(){
    $emp = Employee::All()->where('status','!=','deleted')->where('status','!=','interview')->where('status','!=','pending');
    return view('AdminPortal/GuardsDTR')->with('emp',$emp);
  }

  public function importExcel(Request $request)
	{

		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
            if(!empty($data) && $data->count()){
				        foreach ($data as $key => $v) {
					      $insert[] = ['secu_id' => $v->id, 'estab_id' => $v->estab_id, 'description' => $v->description, 'date' => $v->date];
				    }
				    if(!empty($insert)){
					     DB::table('attendance')->insert($insert);
					     return back()->with('success','Insert Record successfully.');
				    }
			   }

				}




			}

		}

		return back()->with('error','Please Check your file, Something is wrong there.');
	}

  public function adminview(Request $request){
    $events = [];
    $data = Attendance::all()->where('secu_id',$request->id);
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
    return view('AdminPortal.GuardAttendance', compact('calendar'));
  }

  public function clientview(Request $request){
    try {
      $events = [];
      $data = Attendance::all()->where('secu_id',$request->id);
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
      $emp = Employee::find($request->id);
      $calendar = Calendar::addEvents($events);
      return view('ClientPortal.ClientPortalGuardAttendance', compact('calendar'))->with('emp',$emp);
    } catch (Exception $e) {
      echo $e;
    }

  }


}
