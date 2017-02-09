<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rank;
use App\Military;

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
      $Ranks = new Rank;
      $Ranks->name = $request->Rank_Name;
      $Ranks->military_services_id = $Militaries;
      $Ranks->status = "active";
      $Ranks->save();
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
      $id = $request -> edit_id;
      $Ranks = Rank::find($id);
      $Ranks->name = $request->edit_Rank_name;
      $Ranks->military_services_id = $Militaries;
      $Ranks->save();
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
         $data = Rank::find($id);
         $response = $data -> delete();
         if($response)
             echo "Record Deleted successfully.";
         else
             echo "There was a problem. Please try again later.";
     }
}
