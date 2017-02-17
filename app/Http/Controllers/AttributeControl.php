<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\Measurement;
use Exception;
class AttributeControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Attributes = Attribute::all();
      $Measurements = Measurement::all();
      return view('maintenance.attribute')->with('Attributes',$Attributes)->with('Measurements',$Measurements);
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
      $Measurements = Measurement::where('name', $request->Attribute_Unit)->value('id');
      try {
        $Attributes = new Attribute;
        $Attributes->name = $request->Attribute_Name;
        $Attributes->measurements_id = $Measurements;
        $Attributes->status = "active";
        $Attributes->save();
        return back();
      } catch (Exception $e) {
        $s = Attribute::where('name',$request->Attribute_Name)->value('id');
        $data = Attribute::find($s);
        if($data->status === "deleted"){
          $data->measurements_id = $Measurements;
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.attribute_error');
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $Measurements = Measurement::where('name', $request->edit_Attribute_Unit)->value('id');
      try {
        $id = $request -> edit_id;
        $Attributes = Attribute::find($id);
        $Attributes->name = $request->edit_Attribute_name;
        $Attributes->measurements_id = $Measurements;
        $Attributes->save();
        return back();
      } catch (Exception $e) {
        $s = Attribute::where('name',$request->edit_Attribute_name)->value('id');
        $data = Attribute::find($s);
        if($data->status === "deleted"){
          $data->measurements_id = $Measurements;
          $data->status = "inactive";
          $data->save();
          return view('maintenance.attribute_error');
        }
        else {
          return view('maintenance.attribute_error');
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
