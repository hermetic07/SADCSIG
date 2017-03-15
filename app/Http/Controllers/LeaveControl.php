<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class LeaveControl extends Controller
{

    public function index()
    {
      $Leaves = Leave::all();
      return view('maintenance.Leave')->with('Leaves',$Leaves);
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
  			$data = new Leave ();
  			$data->name = $request->name;
  			$data->days = $request->days;
  			$data->notification = $request->notification;
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
             $info = Leave::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }


    public function update(Request $req)
    {
      $data = Leave::find ( $req->id );
  		$data->name = $req->name;
  		$data->days = $req->days;
  		$data->notification = $req->notification;
  		$data->save ();
      if ($data->status === "active") {
				$data->status = "checked";
			}
			else {
				$data->status = "";
			}
  		return response ()->json ( $data );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request)
     {
         $id = $request -> id;
         $data = Leave::find($id);
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
         $Leaves = Leave::find($id);
         if($Leaves->status==='active')
         {
            $Leaves->status = "inactive";
         }
         else{
           $Leaves->status = "active";
         }
         $response  = $Leaves->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
