<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class ProvinceControl extends Controller
{

    public function index()
    {
      $Provinces = Province::all();
      return view('maintenance.Province')->with('Provinces',$Provinces);
    }


    public function add(Request $request)
    {
      $rules = array (
  				'name' => 'regex:/(^[A-Za-z0-9 ]+$)+/'
  		);
  		$validator = Validator::make ( Input::all (), $rules );
  		if ($validator->fails ())
  			return Response::json ( array (

  					'errors' => $validator->getMessageBag ()->toArray ()
  			) );
  		else {
  			try {
          if (trim($request->name," ")!=="") {
            $data = new Province ();
      			$data->name = trim($request->name," \t\n\r\0\x0B");
            $data->status = "active";
      			$data->save ();
            if ($data->status === "active") {
      				$data->status = "checked";
      			}
      			else {
      				$data->status = "";
      			}
      			return response ()->json ( $data );
          } else {
            return Response::json ( array (
               'errors' => "empty"
           ) );
          }

  			} catch (Exception $e) {
          return Response::json ( array (

             'errors' => "ERROR!! The value that you entered is already existing"
          ));
  			}

  		}
    }

     public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = Province::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }

    public function update(Request $req)
    {
      $data = Province::find ( $req->id );
  		$data->name = trim($req->name," \t\n\r\0\x0B");
  		$data->save ();
      if ($data->status === "active") {
        $data->status = "checked";
      }
      else {
        $data->status = "";
      }
  		return response ()->json ( $data );
    }

     public function delete(Request $request)
     {
         $id = $request -> id;
         $data = Province::find($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Deleted successfully.";
         else
             echo "There was a problem. Please try again later.";
     }

     public function status(Request $request)
     {
         $id = $request -> id;
         $Provinces = Province::find($id);
         if($Provinces->status==='active')
         {
            $Provinces->status = "inactive";
         }
         else{
           $Provinces->status = "active";
         }
         $response  = $Provinces->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
