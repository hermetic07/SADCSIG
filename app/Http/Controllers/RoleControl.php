<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class RoleControl extends Controller
{

    public function index()
    {
      $Roles = Role::all();
      return view('maintenance.Role')->with('Roles',$Roles);
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
  			$data = new Role ();
  			$data->name = $request->name;
  			$data->description = $request->description;
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
             $info = Role::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }

    public function update(Request $req)
    {

      $data = Role::find ( $req->id );
      $data->name = $req->name;
      $data->description = $req->description;
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
         $data = Role::find($id);
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
         $Roles = Role::find($id);
         if($Roles->status==='active')
         {
            $Roles->status = "inactive";
         }
         else{
           $Roles->status = "active";
         }
         $response  = $Roles->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
