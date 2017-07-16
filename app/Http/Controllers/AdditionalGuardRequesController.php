<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddGuardRequests;
use App\Clients;
use App\Establishments;
use App\Area;
use App\Service;
use App\Province;
use App\Contracts;
use App\ServiceRequest;
use App\Employees;
use App\ClientRegistration;

class AdditionalGuardRequesController extends Controller
{
    public function index2(Request $request){

        $contracts = Contracts::all();
        $services = Service::all();
        $serviceRequests = ServiceRequest::all();
        $clients = Clients::all();
        $establishments = Establishments::all();
        $areas = Area::all();
        $provinces = Province::all();
        $employees = Employees::all();
        $clientRegistrations = ClientRegistration::all();

        $addGuardRequests = AddGuardRequests::latest('created_at')->get();
        return view('AdminPortal.ClientRequests.Deploy2')->with('clients',$clients)->with('contracts',$contracts)->with('addGuardRequest',$addGuardRequests)->with('areas',$areas)->with('provinces',$provinces)->with('serviceRequests',$serviceRequests)->with('establishments',$establishments)->with('services',$services)->with('employees',$employees)->with('clientRegistrations',$clientRegistrations);

        //return view('AdminPortal.Deploy');
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
