<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class RequirementControl extends Controller
{

    public function index()
    {
      $Requirements = Requirement::all();
      return view('maintenance.requirement')->with('requirements',$Requirements);
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
          $data = new Requirement ();
    			$data->name = $request->name;
          $data->status = "active";
    			$data->save ();
          if ($data->status === "active") {
    				$data->status = "checked";
    			}
    			else {
    				$data->status = "";
    			}
    			return response ()->json ( $data );
  			} catch (Exception $e) {
          return Response::json ( array (

             'errors' => "ERROR!! The value that you entered is already existing"
         ) );
  			}

  		}
    }

     public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = Requirement::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }

    public function update(Request $req)
    {
      $data = Requirement::find ( $req->id );
  		$data->name = $req->name;
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
         $data = Requirement::find($id);
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
         $Requirements = Requirement::find($id);
         if($Requirements->status==='active')
         {
            $Requirements->status = "inactive";
         }
         else{
           $Requirements->status = "active";
         }
         $response  = $Requirements->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
