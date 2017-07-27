<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Province;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class AreaControl extends Controller
{

    public function index()
    {
      $Areas = Area::all();
      $Provinces = Province::all();
      return view('maintenance.Area')->with('Areas',$Areas)->with('Provinces',$Provinces);
    }

    public function getArea(Request $request)
    {
      $test = "";
      $Area = Area::All()->where('provinces_id',$request->prov);
      foreach ($Area as $a) {
          $test.="<option value='$a->id'>$a->name</option>\n";
      }
      return $test;

    }

    public function add(Request $request)
    {


          if (trim($request->name," ")!==""&&trim($request->selection," ")!=="") {

            try {

              $data = new Area ();
        			$data->name = trim($request->name," \t\n\r\0\x0B");
              $province = Province::where('name',trim($request->selection," "))->value('id');
              $data->provinces_id = $province;
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
              $s = Area::where('name',trim($request->name," "))->value('id');
              $old = Area::find($s);
              if ($old->status==="deleted") {
                try {
                  $old->status = "active";
                  $province = Province::where('name',trim($request->selection," "))->value('id');
                  $old->provinces_id = $province;
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


     public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = Area::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }



    public function update(Request $request)
    {

      if (trim($request->name," ")!=="") {
        try {
          $data = Area::find ( $request->id );
      		$data->name = trim($request->name," \t\n\r\0\x0B");
          $province = Province::where('name',trim($request->selection," "))->value('id');
          $data->provinces_id = $province;
      		$data->save ();
          if ($data->status === "active") {
            $data->status = "checked";
          }
          else {
            $data->status = "";
          }
      		return response ()->json ( $data );
        } catch (Exception $e) {
          $s = Area::where('name',trim($request->name," "))->value('id');
           $old = Area::find($s);
           if ($old->status==="deleted") {
             try {
               $old->status = "active";
               $province = Province::where('name',trim($request->selection," "))->value('id');
               $old->provinces_id = $province;
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


     public function delete(Request $request)
     {
         $id = $request -> id;
         $data = Area::find($id);
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
         $Areas = Area::find($id);
         if($Areas->status==='active')
         {
            $Areas->status = "inactive";
         }
         else{
           $Areas->status = "active";
         }
         $response  = $Areas->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
