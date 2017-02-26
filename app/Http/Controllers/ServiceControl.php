<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Exception;

class ServiceControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Services = Service::all();
      return view('maintenance.services')->with('services',$Services);
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
        $Services = new Service;
        $Services->name = $request->Service_Name;
        $Services->description = $request->description;
        $Services->status = "active";
        $Services->save();
        return back()->with('success','Record Added successfully.');
      } catch (Exception $e) {
        $s = Service::where('name',$request->Service_Name)->value('id');
        $Services = Service::find($s);
        if($Services->status === "deleted"){
          $Services->description = $request->description;
          $Services->status = "active";
          $Services->save();
          return back();
        }
        else {
          return view('maintenance.service_error');

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
             $info = Service::find($id);
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
      $id = $request -> edit_id;
      $Services = Service::find($id);
      try {
        $Services->name = $request->edit_Service_name;
        $Services->description = $request->edit_Service_desc;
        $Services->save();
        return back();
      } catch (Exception $e) {
        $s = Service::where('name',$request->edit_Service_name)->value('id');
        $data = Service::find($s);

        if($data->status === "deleted"){
            $data->status = 'inactive';
            $data->save();
            return view('maintenance.service_error');
        }
        else {
            return view('maintenance.service_error');
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
         $data = Service::find($id);
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
         $Services = Service::find($id);
         if($Services->status==='active')
         {
            $Services->status = "inactive";
         }
         else{
           $Services->status = "active";
         }
         $response  = $Services->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
