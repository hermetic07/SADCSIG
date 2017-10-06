<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Charts;
use App\Clients;
use App\ClientRegistration;
use App\Area;
use App\Province;
use App\Establishments;
use PDF;
use App\EmployeeEducation;
use App\EstabGuards;
use App\Contracts;

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
    					
    					->get();
    	foreach($provinces as $province){
    		$provinces_arry[$prov_ctr] = $province->name;
    		$prov_ctr++;
    	}
    	

    					//return $provinces_arry;
    	$chart = Charts::create('donut', 'highcharts')
		    ->title('Disposition Report Chart')
		    ->labels($provinces_arry)
		    ->values([5,10,20])
		    ->dimensions(1000,500)
		    ;
        $dispositions = DB::table('employees')
                    ->where('employees.status','=','deployed')
                    ->join('security_license','security_license.employee_id','=','employees.id')
                    ->join('tblestabguards','tblestabguards.strGuardID','=','employees.id')
                    ->where('tblestabguards.isReplaced','=','0')
                    ->join('establishments','establishments.id','=','tblestabguards.strEstablishmentID')
                     ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                    ->select('employees.id as empID',
                            'employees.first_name',
                            'employees.middle_name',
                            'employees.last_name',
                            'establishments.name as establishment',
                            'security_license.license_num',
                            'security_license.date_expired',
                            'establishments.address as address',
                            'areas.name as area',
                            'provinces.name as province'
                            )
                    ->get();
        $employee_educations = EmployeeEducation::all();
                    //return $disposition->toArray();
    	return view('AdminPortal/Reports')
    			->with('chart',$chart)
                ->with('employee_educations',$employee_educations)
                ->with('dispositions',$dispositions);
    }

    public function dispositionReportPdf(Request $request){
        //return $request->toArray();
        $dispositions = DB::table('employees')
                    ->where('employees.status','=','deployed')
                    ->join('security_license','security_license.employee_id','=','employees.id')
                    ->join('tblestabguards','tblestabguards.strGuardID','=','employees.id')
                    ->where('tblestabguards.isReplaced','=','0')
                    ->join('establishments','establishments.id','=','tblestabguards.strEstablishmentID')
                     ->join('areas','areas.id','=','establishments.areas_id')
                    ->join('provinces','provinces.id','=','areas.provinces_id')
                    ->join('client_registrations','client_registrations.contract_id','=','tblestabguards.contractID')
                    ->join('clients','clients.id','=','client_registrations.client_id')
                    ->select('employees.id as empID',
                            'employees.first_name',
                            'employees.middle_name',
                            'employees.last_name',
                            'establishments.name as establishment',
                            'security_license.license_num',
                            'security_license.date_expired',
                            'establishments.address as address',
                            'areas.name as area',
                            'provinces.name as province',
                            'clients.id as client_id'
                            )
                    ->whereBetween('tblestabguards.created_at', [$request->startFrom, $request->endTo])
                    ->get();
                    //return response($dispositions->count());
        $clients = Clients::all();
        $contracts = Contracts::all();
        $client_registrations = ClientRegistration::all();
        $establishments = DB::table('establishments')
                            
                        ->join('areas','areas.id','=','establishments.areas_id')
                        ->join('provinces','provinces.id','=','areas.provinces_id')
                        ->select('establishments.name as estabname',
                            'establishments.contract_id',
                            'establishments.id',
                            'establishments.address',
                            'areas.name as area',
                            'provinces.name as province')
                        ->get();
        //return $dispositions->toArray();
        $employee_educations = EmployeeEducation::all();
        $estabGuards = EstabGuards::where('isReplaced','=','0')->get();
        $dispostionReportPDF = PDF::loadView('AdminPortal.Reports_PDF.disposition_report',
                    [
                      'start' => $request->startFrom,
                      'end' => $request->endTo,
                      'dispositions' => $dispositions,
                      'employee_educations' => $employee_educations,
                      'clients' => $clients,
                      'client_registrations' => $client_registrations,
                      'establishments' => $establishments,
                      'estabGuards' => $estabGuards,
                      'contracts' => $contracts
                    ]);
      return $dispostionReportPDF->stream('Disposition Report.pdf');
    }
}
