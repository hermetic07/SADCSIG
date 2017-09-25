<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Charts;
use App\Clients;
use App\Area;
use App\Province;
use App\Establishments;

class ReportsController extends Controller
{
    public function index(Request $request){

    	$clients = Clients::all();
    	$establishments = Establishments::all();
    	$provinces_arry = [];
    	$prov_ctr = 0;
    	$client_ctr = 0;
    	$client_arry = [];
    	$ctr = 0;
    	$provinces = DB::table('provinces')
    					->select('provinces.name')
    					->get();
    	foreach($provinces as $province){
    		$provinces_arry[$prov_ctr] = $province->name;
    		$prov_ctr++;
    	}
    	

    					//return $provinces_arry;
    	$chart = Charts::create('pie', 'highcharts')
		    ->title('Disposition Report Chart')
		    ->labels($provinces_arry)
		    ->values([5,10,20])
		    ->dimensions(1000,500)
		    ;
    	return view('AdminPortal/Reports')
    			->with('chart',$chart);
    }
}
