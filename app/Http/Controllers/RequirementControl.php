<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;
use Exception;
class RequirementControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Requirements = Requirement::all();
      return view('maintenance.requirement')->with('requirements',$Requirements);
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
        $Requirements = new Requirement;
        $Requirements->name = $request->Requirements_Name;
        $Requirements->status = "active";
        $Requirements->save();
        return back();
      } catch (Exception $e) {
        $s = Requirement::where('name',$request->Requirements_Name)->value('id');
        $data = Requirement::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.requirement_error');
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
             $info = Requirement::find($id);
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
        $Requirements = Requirement::find($id);

        $Requirements->name = $request->edit_Requirements_name;
        $Requirements->save();
        return back();
      } catch (Exception $e) {
        $s = Requirement::where('name',$request->edit_Requirements_name)->value('id');
        $data = Requirement::find($s);
        if($data->status === "deleted"){
          $data->status = "active";
          $data->save();
          return view('maintenance.requirement_error');
        }
        else {
          return view('maintenance.requirement_error');
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
         $data = Requirement::find($id);
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
         $Requirements = Requirement::find($id);
         if($Requirements->status==='active')
         {
            $Requirements->status = "inactive";
         }
         else{
           $Requirements->status = "active";
         }
         $response  = $Requirements->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
