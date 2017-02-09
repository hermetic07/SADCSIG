<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Province;

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
      $Provinces = Province::where('name', $request->Area_Unit)->value('id');
      $Areas = new Area;
      $Areas->name = $request->Area_Name;
      $Areas->Provinces_id = $Provinces;
      $Areas->status = "active";
      $Areas->save();
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
      $id = $request -> edit_id;
      $Areas = Area::find($id);
      $Areas->name = $request->edit_Area_name;
      $Areas->Provinces_id = $Provinces;
      $Areas->save();
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
         $data = Area::find($id);
         $response = $data -> delete();
         if($response)
             echo "Record Deleted successfully.";
         else
             echo "There was a problem. Please try again later.";
     }
}
