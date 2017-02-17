<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use Exception;
class ProvinceControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Provinces = Province::all();
      return view('maintenance.Province')->with('Provinces',$Provinces);
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
        $Provinces = new Province;
        $Provinces->name = $request->Province_Name;
        $Provinces->status = "active";
        $Provinces->save();
        return back();
      } catch (Exception $e) {
        $s = Province::where('name',$request->Province_Name)->value('id');
        $data = Province::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.province_error');
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
             $info = Province::find($id);
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
        $Provinces = Province::find($id);

        $Provinces->name = $request->edit_Province_name;
        $Provinces->save();
        return back();
      } catch (Exception $e) {
        $s = Province::where('name',$request->edit_Province_name)->value('id');
        $data = Province::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return view('maintenance.province_error');
        }
        else {
          return view('maintenance.province_error');
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
         $data = Province::find($id);
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
         $Provinces = Province::find($id);
         if($Provinces->status==='active')
         {
            $Provinces->status = "inactive";
         }
         else{
           $Provinces->status = "active";
         }
         $response  = $Provinces->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
