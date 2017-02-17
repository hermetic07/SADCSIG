<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\License;
use Exception;
class LicenseControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Licenses = License::all();
      return view('maintenance.license')->with('licenses',$Licenses);
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
        $Licenses = new License;
        $Licenses->name = $request->License_Name;
        $Licenses->status = "active";
        $Licenses->save();
        return back();
      } catch (Exception $e) {
        $s = License::where('name',$request->License_Name)->value('id');
        $data = License::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.license_error');
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
             $info = License::find($id);
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
        $Licenses = License::find($id);

        $Licenses->name = $request->edit_License_name;
        $Licenses->save();
        return back();
      } catch (Exception $e) {
        $s = License::where('name',$request->edit_License_name)->value('id');
        $data = License::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return view('maintenance.license_error');
        }
        else {
          return view('maintenance.license_error');
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
         $data = License::find($id);
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
         $Licenses = License::find($id);
         if($Licenses->status==='active')
         {
            $Licenses->status = "inactive";
         }
         else{
           $Licenses->status = "active";
         }
         $response  = $Licenses->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
