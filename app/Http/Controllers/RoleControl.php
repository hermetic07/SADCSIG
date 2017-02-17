<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Exception;
class RoleControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Roles = Role::all();
      return view('maintenance.Role')->with('Roles',$Roles);
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
        $Roles = new Role;
        $Roles->name = $request->Role_Name;
        $Roles->description = $request->Role_desc;
        $Roles->status = "active";
        $Roles->save();
        return back();
      } catch (Exception $e) {
        $s = Role::where('name',$request->Role_Name)->value('id');
        $data = Role::find($s);
        if($data->status === "deleted"){
          $data->description = $request->Role_desc;
          $data->status = "active";
          $data->save();
          return back();
        }
        else {
          return view('maintenance.role_error');
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
             $info = Role::find($id);
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
        $Roles = Role::find($id);

        $Roles->name = $request->edit_Role_name;
        $Roles->description = $request->edit_Role_desc;
        $Roles->save();
        return back();
      } catch (Exception $e) {
        $s = Role::where('name',$request->edit_Role_name)->value('id');
        $data = Role::find($s);
        if($data->status === "deleted"){
          $data->description = $request->edit_Role_desc;
          $data->status = "active";
          $data->save();
          return view('maintenance.role_error');
        }
        else {
          return view('maintenance.role_error');
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
         $data = Role::find($id);
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
         $Roles = Role::find($id);
         if($Roles->status==='active')
         {
            $Roles->status = "inactive";
         }
         else{
           $Roles->status = "active";
         }
         $response  = $Roles->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
