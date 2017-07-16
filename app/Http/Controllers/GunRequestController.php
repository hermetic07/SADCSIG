<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\Establishments;
use App\Gun;
use App\GunRequest;
use App\Area;
use App\Province;
use App\GunRequestsDetails;
use App\Contracts;
use App\ClientRegistration;

class GunRequestController extends Controller
{
    
    public function index(){
        $gunRequests = GunRequest::latest('created_at')->get();

        $gunRequestsDetails = GunRequestsDetails::all();
        $clients = Clients::all();
        $establishments = Establishments::all();
        $guns = Gun::all();
        $areas = Area::all();
        $provinces = Province::all();
        $contracts = Contracts::all();
        $clientRegistrations = ClientRegistration::all();

        //return view('AdminPortal.ClientRequests.GunRequests')->with('gunRequests',$gunRequests)->with('clients',$clients)->with('guns',$guns)->with('areas',$areas)->with('provinces',$provinces)->with('establishments',$establishments);
        
      return view('AdminPortal.ClientRequests.Sendgun')->with('gunRequests',$gunRequests)->with('clients',$clients)->with('guns',$guns)->with('areas',$areas)->with('provinces',$provinces)->with('establishments',$establishments)->with('gunRequestsDetails',$gunRequestsDetails)->with('contracts',$contracts)->with('clientRegistrations',$clientRegistrations);
    }
    public function remove(Request $request)
     {
         $id = $request -> id;
         $data = GunRequest::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }
}
