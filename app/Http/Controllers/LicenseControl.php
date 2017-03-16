<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\License;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class LicenseControl extends Controller
{

    public function index()
    {
      $Licenses = License::all();
      return view('maintenance.license')->with('licenses',$Licenses);
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
          $data = new License ();
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
          ));
  			}

  		}

    }

     public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = License::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }

    public function update(Request $req)
    {
      $data = License::find ( $req->id );
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
         $data = License::find($id);
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
         $Licenses = License::find($id);
         if($Licenses->status==='active')
         {
            $Licenses->status = "inactive";
         }
         else{
           $Licenses->status = "active";
         }
         $response  = $Licenses->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
