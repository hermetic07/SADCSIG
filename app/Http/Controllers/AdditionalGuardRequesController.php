<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use App\Role;
use App\Shifts;

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
    public function view(Request $request){
        if($request->ajax()){
            $add_guard_requests = DB::table('add_guard_requests')
                            ->where('add_guard_requests.id','=',$request->id)
                            ->join('clients','clients.id','=','add_guard_requests.client_id')
                            ->join('establishments','establishments.id','=','add_guard_requests.establishments_id')
                            ->join('areas','areas.id','=','establishments.areas_id')
                            ->join('provinces','provinces.id','=','areas.provinces_id')
                            ->select('add_guard_requests.id','add_guard_requests.no_guards','add_guard_requests.status',
                                'add_guard_requests.created_at',
                                'clients.id as client_id',
                                'clients.first_name as client_fname',
                                'clients.middle_name as client_mname',
                                'clients.last_name as client_lname',
                                'establishments.id as establishmentID',
                                'establishments.name as establishment',
                                'establishments.address as address',
                                'areas.name as area',
                                'provinces.name as province')
                            ->get();
            //return response($add_guard_requests);
            return view('AdminPortal.ClientRequests.AddGuardRequests.viewModal')
                    ->with('add_guard_request',$add_guard_requests[0]);
        }
    }

    public function deployAddGuards($addGuardRequestsID){
        //return $addGuardRequestsID;
        $addGuardRequest = AddGuardRequests::findOrFail($addGuardRequestsID);
        $employees = Employees::all();
        $roles = Role::all();
        $shifts = Shifts::all();
        return view('AdminPortal.ClientRequests.AddGuardRequests.deployAddGuards')
                ->with('employees',$employees)
                ->with('clientID',$addGuardRequest->client_ide)
                ->with('establishmentID',$addGuardRequest->establishments_id)
                ->with('shifts',$shifts)
                ->with('no_guards',$addGuardRequest->no_guards)
                ->with('roles',$roles);
               
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
