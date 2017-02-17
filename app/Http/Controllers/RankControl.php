<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rank;
use App\Military;
use Exception;
class RankControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Ranks = Rank::all();
      $Militaries = Military::all();
      return view('maintenance.rank')->with('Ranks',$Ranks)->with('Militaries',$Militaries);
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
      $Militaries = Military::where('name', $request->Rank_Unit)->value('id');
      try {
        $Ranks = new Rank;
        $Ranks->name = $request->Rank_Name;
        $Ranks->military_services_id = $Militaries;
        $Ranks->status = "active";
        $Ranks->save();
        return back();
      } catch (Exception $e) {
        $s = Rank::where('name',$request->Rank_Name)->value('id');
        $data = Rank::find($s);
        if($data->status === "deleted"){
          $data->military_services_id = $Militaries;
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.rank_error');
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
             $info = Rank::find($id);
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
      $Militaries = Military::where('name', $request->edit_Rank_Unit)->value('id');
      try {
        $id = $request -> edit_id;
        $Ranks = Rank::find($id);
        $Ranks->name = $request->edit_Rank_name;
        $Ranks->military_services_id = $Militaries;
        $Ranks->save();
        return back();
      } catch (Exception $e) {
        $s = Rank::where('name',$request->edit_Rank_name)->value('id');
        $data = Rank::find($s);
        if($data->status === "deleted"){
          $data->military_services_id = $Militaries;
          $data->status = "active";
          $data->save();
          return view('maintenance.rank_error');
        }
        else {
          return view('maintenance.rank_error');
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
         $data = Rank::find($id);
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
         $Ranks = Rank::find($id);
         if($Ranks->status==='active')
         {
            $Ranks->status = "inactive";
         }
         else{
           $Ranks->status = "active";
         }
         $response  = $Ranks->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
