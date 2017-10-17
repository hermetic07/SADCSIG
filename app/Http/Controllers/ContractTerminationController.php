<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContractTerminations;
use App\Contracts;
use App\EstabGuards;
use App\Employees;
use App\GunRequest;

class ContractTerminationController extends Controller
{
    
	public function save(Request $request){
		if($request->ajax()){
			$contract_termin8_ID = 'TRMN8-'.ContractTerminations::get()->count();
			$contract_termin8 = new ContractTerminations();
			$contract_termin8['termination_id'] = $contract_termin8_ID;
			$contract_termin8['contract_id'] = $request->contractID;
			$contract_termin8['reasons'] = $request->reasons;
			$contract_termin8['status'] = 'active';

			$contract = Contracts::findOrFail($request->contractID);
			$contract->update(['status'=>'disabled']);
			if($contract_termin8->save()){

				return '0';
			}
			else
			{
				return '1';
			}
			//return response($request->toArray());
		}
	}
	public function terminate_contract(Request $request){
		if($request->ajax()){
			$contract = Contracts::findOrFail($request->contract_id);
			$employees = Employees::all();
			$estab_guards = EstabGuards::where('contractID',$request->contract_id)->get();
			//return $estab_guards->toArray();
			foreach ($estab_guards as $estab_guard) {
				foreach ($employees as $employee) {
					if($estab_guard->strGuardID == $employee->id){

						$employee->update(['status'=>'waiting']);
						$estab_guard->where('contractID','=',$request->contract_id)
									
									->update(['status'=>'terminated']);
					}
				}
			}
			$gun_request = GunRequest::where('establishments_id','=',$contract->strEstablishmentID)
				->update(['status'=>'TERMINATED']);
			if($contract->update(['status'=>'terminated'])){
				return "success";
			}
		}
	}
}
