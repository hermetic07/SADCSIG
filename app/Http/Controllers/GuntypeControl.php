<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gun;
use App\GunType;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class GunTypeControl extends Controller
{

    public function index()
    {
      $GunType = GunType::all();
      return view('maintenance.guntype')->with('GunType',$GunType);
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
        $data = new Guntype ();
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
      }
    }

     public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = GunType::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }


    public function update(Request $req)
    {

      $data = Guntype::find ( $req->id );
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request)
     {
         $id = $request -> id;
         $data = GunType::find($id);
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
         $GunTypes = GunType::find($id);
         if($GunTypes->status==='active')
         {
            $GunTypes->status = "inactive";
         }
         else{
           $GunTypes->status = "active";
         }
         $response  = $GunTypes->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
