<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GunType;
use Exception;
class GunTypeControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $GunType = GunType::all();
      return view('maintenance.guntype')->with('GunType',$GunType);
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
        $GunTypes = new GunType;
        $GunTypes->name = $request->GunType_Name;
        $GunTypes->status = "active";
        $GunTypes->save();
        return back();
      } catch (Exception $e) {
        $s = GunType::where('name',$request->GunType_Name)->value('id');
        $data = GunType::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.GunType_error');
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
             $info = GunType::find($id);
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
        $GunTypes = GunType::find($id);
        $GunTypes->name = $request->edit_GunType_name;
        $GunTypes->save();
        return back();
      } catch (Exception $e) {
        $s = GunType::where('name',$request->edit_GunType_name)->value('id');
        $data = GunType::find($s);
        if($data->status === "deleted"){
          $data->status = "inactive";
          $data->save();
          return view('maintenance.GunType_error');
        }
        else {
          return view('maintenance.GunType_error');
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
         $data = GunType::find($id);
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
         $GunTypes = GunType::find($id);
         if($GunTypes->status==='active')
         {
            $GunTypes->status = "inactive";
         }
         else{
           $GunTypes->status = "active";
         }
         $response  = $GunTypes->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
