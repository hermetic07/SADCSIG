<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Province;
use Exception;
class AreaControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Areas = Area::all();
      $Provinces = Province::all();
      return view('maintenance.Area')->with('Areas',$Areas)->with('Provinces',$Provinces);
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
        $Areas = new Area;
        $Areas->name = $request->Area_Name;
        $Areas->province = $request->Area_Unit;
        $Areas->status = "active";
        $Areas->save();
        return back();
      } catch (Exception $e) {
        $A = Area::find($s);
        if($A->status === "deleted"){
          $A->Provinces_id = $Provinces;
          $A->status = "active";
          $A->save();
          return back();
        }
        else {
          return view('maintenance.area_error');
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
             $info = Area::find($id);
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
      $Provinces = Province::where('name', $request->edit_Area_Unit)->value('id');
      try {
        $id = $request -> edit_id;
        $Areas = Area::find($id);
        $Areas->name = $request->edit_Area_name;
        $Areas->province = $request->edit_Area_Unit;
        $Areas->save();
        return back();
      } catch (Exception $e) {
        $s = Area::where('name',$request->edit_Area_name)->value('id');
        $data = Area::find($s);

        if($data->status === "deleted"){
            $data->status = 'inactive';
            $data->Provinces_id = $Provinces;
            $data->save();
            return view('maintenance.area_error');
        }
        else {
          return view('maintenance.area_error');
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
