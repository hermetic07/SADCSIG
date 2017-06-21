<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRequest;
use App\Clients;
use App\Establishments;
use App\Area;
use App\Province;
use App\Service;

class ServiceRequestController extends Controller
{
    public function index(){
    	$serviceRequests = ServiceRequest::latest('created_at')->get();
    	$clients = Clients::all();
        $establishments = Establishments::all();
    	$areas = Area::all();
    	$provinces = Province::all();
    	$services = Service::all();
    	
    	return view('AdminPortal.ClientRequests.ServiceRequests')->with('serviceRequests',$serviceRequests)->with('clients',$clients)->with('areas',$areas)->with('provinces',$provinces)->with('services',$services)->with('establishments',$establishments);
    	
    }

    /*public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = ServiceRequest::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }*/
     public function remove(Request $request)
     {
         $id = $request -> id;
         $data = ServiceRequest::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }
}
