<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Establishments;
use App\Employees;
use App\Role;
use App\Shifts;
use App\GuardReplacement;
use App\Contracts;

class GuardReplacementController extends Controller
{
    public function index(){
    	return view('AdminPortal.ClientRequests.GuardReplace');
    }

    public function view(Request $requests){
    	if($requests->ajax()){
    		
    		$guardReplacementDetails = DB::table('guard_replacement_requests')
    								->where('guard_replacement_requests.requestID','=',$requests->reqID)
    								->join('replacement_requests_details','replacement_requests_details.replacement_requests_id','=','guard_replacement_requests.requestID')
    								->join('employees','employees.id','=','replacement_requests_details.employees_id')
    								->join('clients','clients.id','=','guard_replacement_requests.clients_id')
    								->join('contracts','contracts.id','=','guard_replacement_requests.contractID')
    								->join('establishments','establishments.id','=','contracts.strEstablishmentID')
    								->join('areas','areas.id','=','establishments.areas_id')
                        			->join('provinces','provinces.id','=','areas.provinces_id')
                        			->orderBy('guard_replacement_requests.created_at','desc')
                        			->select('guard_replacement_requests.requestID as requestCode',
                        					'contracts.id as contract',
                        					'establishments.name as establishment',
                        					'establishments.address as estabAddress',
                        					'areas.name as area',
                        					'provinces.name as province',
                        					'employees.id as empID',
                        					'employees.first_name',
                        					'employees.middle_name',
                        					'employees.last_name',
                        					'clients.last_name as c_lname',
                        					'clients.first_name as c_fname',
                        					'clients.middle_name as c_mname',
                        					'employees.image',
                        					'replacement_requests_details.reasons')
    								->get();
    		return view('AdminPortal\ClientRequests\GuardReplacementRequests.viewModal')
    				->with('guardReplacementDetails',$guardReplacementDetails[0])
    				->with('guards',$guardReplacementDetails);
    	}
    }	

    public function deployReplacement($guardReplacementID){

        $guardReplacementRequests = DB::table('guard_replacement_requests')
                                    ->where('guard_replacement_requests.requestID','=',$guardReplacementID)
                                    ->get();
        $contract = Contracts::findOrFail($guardReplacementRequests[0]->contractID);
        $employees = Employees::all();
        $roles = Role::all();
        $shifts = Shifts::all();
        return view('AdminPortal.ClientRequests.AddGuardRequests.deployAddGuards')
                ->with('employees',$employees)
                ->with('clientID',$guardReplacementRequests[0]->clients_id)
                ->with('estabID',$contract->strEstablishmentID)
                ->with('shifts',$shifts)
                ->with('no_guards',$guardReplacementRequests[0]->no_guards)
                ->with('contractID',$guardReplacementID)
                ->with('roles',$roles);
    }
}
