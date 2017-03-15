<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Province;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class AreaControl extends Controller
{

    public function index()
    {
      $Areas = Area::all();
      $Provinces = Province::all();
      return view('maintenance.Area')->with('Areas',$Areas)->with('Provinces',$Provinces);
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
  			$data = new Area ();
  			$data->name = $request->name;
  			$data->province = $request->selection;
        $data->status = "active";
  			$data->save ();
        if ($data->status === "active") {
          $data->status = "checked";
        }
        else {
          $data->status = "";
        }
  			return response ()->json ( $data );
  		}
    }


     public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = Area::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }



    public function update(Request $request)
    {
      $data = Area::find ( $request->id );
  		$data->province = $request->selection;
  		$data->name = $request->name;
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
         $data = Area::find($id);
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
         $Areas = Area::find($id);
         if($Areas->status==='active')
         {
            $Areas->status = "inactive";
         }
         else{
           $Areas->status = "active";
         }
         $response  = $Areas->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
