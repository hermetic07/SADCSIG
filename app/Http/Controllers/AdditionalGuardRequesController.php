<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddGuardRequests;
use App\Clients;
use App\Establishments;
use App\Area;
use App\Service;
use App\Province;

class AdditionalGuardRequesController extends Controller
{
    public function index(){
    	$clients = Clients::all();
        $establishments = Establishments::all();
    	$areas = Area::all();
    	$provinces = Province::all();
        $services = Service::all();
    	$addGuardRequests = AddGuardRequests::latest('created_at')->get();
    	return view('AdminPortal.ClientRequests.AdditionalGuardRequests')->with('addGuardRequests',$addGuardRequests)->with('clients',$clients)->with('areas',$areas)->with('provinces',$provinces)->with('establishments',$establishments)->with('services',$services);
    }

    public function remove(Request $request)
     {
         $id = $request -> id;
         $data = AddGuardRequests::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }


}
