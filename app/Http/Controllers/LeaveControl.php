<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
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
          if (trim($request->name," ")!==""&&trim($request->days, " ")!==""&&trim($request->notification, " ")!=="") {
            try {
              $data = new Leave ();
        			$data->name = trim($request->name," \t\n\r\0\x0B");
        			$data->days = trim($request->days," \t\n\r\0\x0B");
        			$data->notification = trim($request->notification," \t\n\r\0\x0B");
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
              $s = Leave::where('name',trim($request->name," "))->value('id');
              $old = Leave::find($s);
              if ($old->status==="deleted") {
                try {
                  $old->status = "active";
                  $old->days = trim($request->days," \t\n\r\0\x0B");
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
             $info = Leave::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }


    public function update(Request $req)
    {
      $data = Leave::find ( $req->id );
  		$data->name = trim($req->name," \t\n\r\0\x0B");
  		$data->days = trim($req->days," \t\n\r\0\x0B");
  		$data->notification = trim($req->notification," \t\n\r\0\x0B");
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
