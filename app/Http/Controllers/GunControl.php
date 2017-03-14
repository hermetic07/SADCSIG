<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gun;
use App\GunType;
use Exception;
class GunControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Guns = Gun::all();
      $A = GunType::all();
      return view('maintenance.Gun')->with('Guns',$Guns)->with('A',$A);
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
        $Guns = new Gun;
        $Guns->name= $request->name;
        $Guns->guntype = $request->GunType;
        $Guns->status = "active";
        $Guns->save();
        return back();
      } catch (Exception $e) {

          return view('maintenance.Gun_error');

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
             $info = Gun::find($id);
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
        $Guns = Gun::find($id);
        $Guns->name = $request->edit_size;
        $Guns->guntype = $request->edit_GunType;
        $Guns->save();
        return back();
      } catch (Exception $e) {

          return view('maintenance.Gun_error');

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
         $data = Gun::find($id);
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
         $Guns = Gun::find($id);
         if($Guns->status==='active')
         {
            $Guns->status = "inactive";
         }
         else{
           $Guns->status = "active";
         }
         $response  = $Guns->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
