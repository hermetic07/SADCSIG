<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nature;
use Exception;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class NatureControl extends Controller
{

    public function index()
    {
      $Natures = Nature::all();
      return view('maintenance.nature')->with('natures',$Natures);
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
  			$data = new Nature ();
  			$data->name = $request->name;
  			$data->price = $request->price;
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
             $info = Nature::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }

    public function update(Request $req)
    {
      $data = Nature::find ( $req->id );
  		$data->name = $req->name;
  		$data->price = $req->price;
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
         $data = Nature::find($id);
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
         $Natures = Nature::find($id);
         if($Natures->status==='active')
         {
            $Natures->status = "inactive";
         }
         else{
           $Natures->status = "active";
         }
         $response  = $Natures->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
