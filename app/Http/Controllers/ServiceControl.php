<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Exception;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class ServiceControl extends Controller
{

    public function index()
    {
      $Services = Service::all();
      return view('maintenance.services')->with('services',$Services);
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
  			$data = new Service ();
  			$data->name = $request->name;
  			$data->description = $request->description;
        $data->status = "active";
  			$data->save ();
        if($data->status === "active"){
          $data->status = "checked";
        }else {
          $data->status = "";
        }
  			return response ()->json ( $data );
  		}

    }


     public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = Service::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }

    public function update(Request $request)
    {
      $data = Service::find ( $request->id );
  		$data->name = $request->name;
  		$data->description = $request->description;
  		$data->save ();
      if($data->status === "active"){
        $data->status = "checked";
      }else {
        $data->status = "";
      }
  		return response ()->json ( $data );
    }

     public function delete(Request $request)
     {
         $id = $request -> id;
         $data = Service::find($id);
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
         $Services = Service::find($id);
         if($Services->status==='active')
         {
            $Services->status = "inactive";
         }
         else{
           $Services->status = "active";
         }
         $response  = $Services->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
