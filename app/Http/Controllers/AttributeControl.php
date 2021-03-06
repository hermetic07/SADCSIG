<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\Measurement;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class AttributeControl extends Controller
{

    public function index()
    {
      $Attributes = Attribute::all();
      $M = Measurement::all();
      return view('maintenance.attribute')->with('Attributes',$Attributes)->with('m',$M);
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
              $data = new Attribute ();
        			$data->name = trim($request->name," ");
        			$data->measurement = trim($request->selection," ");
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
              $s = Attribute::where('name',trim($request->name," "))->value('id');
              $old = Attribute::find($s);
              if ($old->status==="deleted") {
                try {
                  $old->status = "active";
                  $old->measurement = trim($request->selection," ");
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = Attribute::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }


    public function update(Request $req)
    {
      if (trim($req->name," ")!=="") {
        try {
          $data = Attribute::find ( $req->id );
      		$data->name = trim($req->name," \t\n\r\0\x0B");
      		$data->measurement = trim($req->selection," \t\n\r\0\x0B");
      		$data->save ();
          if ($data->status === "active") {
            $data->status = "checked";
          }
          else {
            $data->status = "";
          }
      		return response ()->json ( $data );
        } catch (Exception $e) {
          $s = Attribute::where('name',trim($req->name," "))->value('id');
           $old = Attribute::find($s);
           if ($old->status==="deleted") {
             try {
               $old->status = "active";
               $old->measurement = trim($req->selection," \t\n\r\0\x0B");
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request)
     {
         $id = $request -> id;
         $data = Attribute::find($id);
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
         $Attributes = Attribute::find($id);
         if($Attributes->status==='active')
         {
            $Attributes->status = "inactive";
         }
         else{
           $Attributes->status = "active";
         }
         $response  = $Attributes->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
