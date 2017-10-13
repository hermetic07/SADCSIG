<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Employee;
use App\Establishments;
use DB;
use Excel;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class DTR extends Controller
{

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

}
