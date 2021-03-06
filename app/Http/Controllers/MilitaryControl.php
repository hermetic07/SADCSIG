<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Military;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class MilitaryControl extends Controller
{

    public function index()
    {
      $Militarys = Military::all();
      return view('maintenance.Military')->with('Militarys',$Militarys);
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
              $data = new Military ();
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
            } catch (Exception $e) {
              $s = Military::where('name',trim($request->name," "))->value('id');
              $old = Military::find($s);
              if ($old->status==="deleted") {
                try {
                  $old->status = "active";
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
          }
          else {
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
             $info = Military::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }


    public function update(Request $req)
    {

      if (trim($req->name," ")!=="") {
        try {
          $data = Military::find ( $req->id );
      		$data->name = trim($req->name," \t\n\r\0\x0B");
      		$data->save ();
          if ($data->status === "active") {
            $data->status = "checked";
          }
          else {
            $data->status = "";
          }
      		return response ()->json ( $data );
        } catch (Exception $e) {
          $s = Military::where('name',trim($req->name," "))->value('id');
           $old = Military::find($s);
           if ($old->status==="deleted") {
             try {
               $old->status = "active";
               $old->save();
               if($old->status === "active"){
                 $old->status = "checked";
               }else {
                 $old->status = "";
               }
               return Response::json ( array (
                  'errors' => "deleted",
                  'id' => $s,
                  'status' => $old->status,

               ) );
             } catch (Exception $ex) {
               return Response::json ( array (
                  'errors' => "ERROR!! The value that you entered is already existin"
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

    public function delete(Request $request)
     {
         $id = $request -> id;
         $data = Military::find($id);
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
         $Militarys = Military::find($id);
         if($Militarys->status==='active')
         {
            $Militarys->status = "inactive";
         }
         else{
           $Militarys->status = "active";
         }
         $response  = $Militarys->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
