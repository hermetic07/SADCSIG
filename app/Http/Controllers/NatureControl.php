<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nature;
use Exception;
class NatureControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Natures = Nature::all();
      return view('maintenance.nature')->with('natures',$Natures);
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
        $Natures = new Nature;
        $Natures->name = $request->Nature_Name;
        $Natures->status = "active";
        $Natures->save();
        return back();
      } catch (Exception $e) {
        $s = Nature::where('name',$request->Nature_Name)->value('id');
        $data = Nature::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.nature_error');
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
             $info = Nature::find($id);
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
        $Natures = Nature::find($id);

        $Natures->name = $request->edit_Nature_name;
        $Natures->save();
        return back();
      } catch (Exception $e) {
        $s = Nature::where('name',$request->edit_Nature_name)->value('id');
        $data = Nature::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return view('maintenance.nature_error');
        }
        else {
          return view('maintenance.nature_error');
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
         $data = Nature::find($id);
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
         $Natures = Nature::find($id);
         if($Natures->status==='active')
         {
            $Natures->status = "inactive";
         }
         else{
           $Natures->status = "active";
         }
         $response  = $Natures->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
