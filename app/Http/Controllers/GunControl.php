<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gun;
use App\GunType;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class GunControl extends Controller
{

    public function index()
    {
      $Guns = Gun::all();
      $A = GunType::all();
      return view('maintenance.Gun')->with('Guns',$Guns)->with('A',$A);
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
        if (trim($request->name," ")!=="") {
          try {
            $data = new Gun ();
            $data->name = trim($request->name," ");
            $data->guntype = $request->selection;
            $data->status = "active";
            $data->save ();
            if ($data->status === "active" ) {
              $data->status = "checked";
            }
            else {
              $data->status = "";
            }
            return response ()->json ( $data );
          } catch (Exception $e) {
            $s = Gun::where('name',trim($request->name," "))->value('id');
             $old = Gun::find($s);
             if ($old->status==="deleted") {
               try {
                 $old->status = "active";
                 $old->guntype = trim($request->selection," \t\n\r\0\x0B");
                 $old->save();
                 if($old->status === "active"){
                   $old->status = "checked";
                 }else {
                   $old->status = "";
                 }
                 return response ()->json ( $old );
               } catch (Exception $ex) {
                 return Response::json ( array (
                    'errors' => "ERROR!! The value that you entered is already existing"
                 ) );
               }
             }
             else {
               return Response::json ( array (
                  'errors' => "ERROR!! The value that you entered is already existing"
               ) );
             }
          }

        } else {
          return Response::json ( array (
             'errors' => "empty"
         ) );
        }
  		}

    }

     public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = Gun::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }

    public function update(Request $request)
    {
      $data = Gun::find ( $request->id );
  		$data->name = trim($request->name," \t\n\r\0\x0B");
  		$data->guntype = trim($request->selection," \t\n\r\0\x0B");
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
         $data = Gun::find($id);
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
         $Guns = Gun::find($id);
         if($Guns->status==='active')
         {
            $Guns->status = "inactive";
         }
         else{
           $Guns->status = "active";
         }
         $response  = $Guns->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
