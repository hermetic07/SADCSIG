<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Military;
use Exception;
class MilitaryControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Militarys = Military::all();
      return view('maintenance.Military')->with('Militarys',$Militarys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
      try {
        $Militarys = new Military;
        $Militarys->name = $request->Military_Name;
        $Militarys->status = "active";
        $Militarys->save();
        return back();
      } catch (Exception $e) {
        $s = Military::where('name',$request->Military_Name)->value('id');
        $data = Military::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.military_error');
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
             $info = Military::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      try {
        $id = $request -> edit_id;
        $Militarys = Military::find($id);

        $Militarys->name = $request->edit_Military_name;
        $Militarys->save();
        return back();
      } catch (Exception $e) {
        $s = Military::where('name',$request->edit_Military_name)->value('id');
        $data = Military::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return view('maintenance.military_error');
        }
        else {
          return view('maintenance.military_error');
        }
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
