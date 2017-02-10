<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;

class MeasurementControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $measurements = Measurement::all();
      return view('maintenance.measurement')->with('measurements',$measurements);
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
      $measurements = new measurement;
      $measurements->name = $request->measurement_Name;
      $measurements->status = "active";
      $measurements->save();
      return back()
              ->with('success','Record Added successfully.');
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
             $info = measurement::find($id);
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
      $id = $request -> edit_id;
      $measurements = measurement::find($id);

      $measurements->name = $request->edit_measurement_name;
      $measurements->save();
      return back()
              ->with('success','Record Updated successfully.');
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
         $data = measurement::find($id);
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
         $measurements = measurement::find($id);
         if($measurements->status==='active')
         {
            $measurements->status = "inactive";
         }
         else{
           $measurements->status = "active";
         }
         $response  = $measurements->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
