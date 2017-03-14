<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use Exception;
class LeaveControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Leaves = Leave::all();
      return view('maintenance.Leave')->with('Leaves',$Leaves);
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
        $Leaves = new Leave;
        $Leaves->name = $request->Leave_Name;
        $Leaves->days = $request->Leave_span;
        $Leaves->notification = $request->Leave_not;
        $Leaves->status = "active";
        $Leaves->save();
        return back();
      } catch (Exception $e) {
        $s = Leave::where('name',$request->Leave_Name)->value('id');
        $data = Leave::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.leave_error');
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
             $info = Leave::find($id);
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
        $Leaves = Leave::find($id);
        $Leaves->name = $request->edit_Leave_name;
        $Leaves->days = $request->edit_Leave_span;
        $Leaves->notification = $request->edit_Leave_not;
        $Leaves->save();
        return back();
      } catch (Exception $e) {
        $s = Leave::where('name',$request->edit_Leave_name)->value('id');
        $data = Leave::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return view('maintenance.leave_error');
        }
        else {
          return view('maintenance.leave_error');
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
