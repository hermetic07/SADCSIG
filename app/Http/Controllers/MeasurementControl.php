<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;
use Exception;
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
      try {
        $measurements = new measurement;
        $measurements->name = $request->measurement_Name;
        $measurements->status = "active";
        $measurements->save();
        return back();
      } catch (Exception $e) {
        $s = measurement::where('name',$request->measurement_Name)->value('id');
        $data = measurement::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.measurement_error');
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
      try {
        $id = $request -> edit_id;
        $measurements = measurement::find($id);

        $measurements->name = $request->edit_measurement_name;
        $measurements->save();
        return back();
      } catch (Exception $e) {
        $s = measurement::where('name',$request->edit_measurement_name)->value('id');
        $data = measurement::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return view('maintenance.measurement_error');
        }
        else {
          return view('maintenance.measurement_error');
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
