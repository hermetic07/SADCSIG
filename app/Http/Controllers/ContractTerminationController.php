<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContractTerminations;

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

}
