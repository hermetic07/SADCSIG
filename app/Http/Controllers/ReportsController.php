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
use App\Employees;
use App\ClaimedDelivery;

class ReportsController extends Controller
{
    public function index(Request $request){

    	$clients = Clients::all();
      $totalClients = Clients::get()->count();
    	$establishments = Establishments::all();
    	$provinces_arry = [];
    	$prov_ctr = 0;
    	$client_ctr = 0;
    	$client_arry = [];
    	$ctr = 0;
    	$provinces = DB::table('provinces')->get();
      $client_per_province = [];
    					
    					
    	foreach($provinces as $province){
        $client_per_province[$prov_ctr] = Area::where('provinces_id','=',$province->id)->get()->count();
    		$provinces_arry[$prov_ctr] = $province->name;
    		$prov_ctr++;
    	}
    	

    					//return $provinces_arry;
    	$chart = Charts::create('donut', 'highcharts')
		    ->title('Disposition Report Chart')
		    ->labels($provinces_arry)
		    ->values($client_per_province)
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

         $clientGuns = DB::table('tblGunRequests')
                      //->where('tblGunRequests.establishments_id','=',$estabID)
                     // ->join()
                      ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                      ->join('tblClaimeddelivery','tblClaimeddelivery.strGunDeliveryID','=','tblGunDeliveries.strGunDeliveryID')
                      ->join('guns','guns.id','=','tblClaimeddelivery.strGunID')
                      ->join('gunType','gunType.id','=','guns.guntype_id')
                      ->select('guns.name as gun',
                        'gunType.name as gunType',
                        'tblClaimeddelivery.serialNo',
                        'tblGunRequests.establishments_id',
                        'tblGunDeliveries.created_at as deliveryDate')
                      ->get();
                   // return $clientGuns->count();
        $guns_per_client = [];

        $estab_arry = [];
        $estab_ctr = 0;
        foreach($establishments as $establishment){
          $guns_per_client[$estab_ctr] = DB::table('tblGunRequests')
                      ->where('tblGunRequests.establishments_id','=',$establishment->id)
                      ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                      ->join('tblClaimeddelivery','tblClaimeddelivery.strGunDeliveryID','=','tblGunDeliveries.strGunDeliveryID')
                      ->join('guns','guns.id','=','tblClaimeddelivery.strGunID')
                      ->join('gunType','gunType.id','=','guns.guntype_id')
                      ->select('guns.name as gun','gunType.name as gunType','tblClaimeddelivery.serialNo')
                      ->get()
                      ->count();
          $estab_arry[$estab_ctr] = $establishment->name;
          $estab_ctr++;
        }
        $delivered_guns = $clientGuns->count();
        $number_of_guns_chart = Charts::create('bar', 'highcharts')
            ->title('Disposition Report Chart')
            ->labels($estab_arry)
            ->values($guns_per_client)
            ->dimensions(1000,500)
            ;

        $gains_employees = DB::table('employees')
                              ->where('employees.status','=','deployed')
                              ->join('tblestabguards','tblestabguards.strGuardID','=','employees.id')
                              ->get();
        $employees = Employees::all();
        $created_at = [];
        $i = 0;
        foreach($employees as $employee){
          $month = explode("-", $employee->created_at)[1];
          $created_at[$i] = $month;
          $i++;
        }
        $emp_arr = [];
        $k = 0;
        for($i = 1; $i<= 12; $i++){
          for($j = 0; $j < count($created_at); $j++){
            if($created_at[$j] == $i){
              $k++;
              $emp_arr[$i-1] = $k;
            }else{
              $emp_arr[$i-1] = 0;
            }
          }
          
        }
        $gain_chart = Charts::create('line', 'highcharts')
            ->title('Gains')
            ->labels(['January','February','March','April','May','June','July','August','September','October','November','December'])
            ->values($emp_arr)
            ->dimensions(1000,500)
            ;

    	return view('AdminPortal/Reports')
    			->with('chart',$chart)
                ->with('number_of_guns_chart',$number_of_guns_chart)
                ->with('employee_educations',$employee_educations)
                ->with('dispositions',$dispositions)
                ->with('clientGuns',$clientGuns)
                ->with('establishments',$establishments)
                ->with('totalClients',$totalClients)
                ->with('gains_employees',$gains_employees)
                ->with('gain_chart',$gain_chart);
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
                            'clients.id as client_id',
                            'tblestabguards.role',
                            'employees.street',
                            'employees.barangay',
                            'employees.city'
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
                    ])->setPaper('a4', 'landscape');
      return $dispostionReportPDF->stream('Disposition Report.pdf');
    }
    public function number_of_guns(Request $request){
        $clientGuns = DB::table('tblGunRequests')
                      //->where('tblGunRequests.establishments_id','=',$estabID)
                     // ->join()
                      ->join('tblGunDeliveries','tblGunDeliveries.strGunReqID','=','tblGunRequests.strGunReqID')
                      ->join('tblClaimeddelivery','tblClaimeddelivery.strGunDeliveryID','=','tblGunDeliveries.strGunDeliveryID')
                      ->join('guns','guns.id','=','tblClaimeddelivery.strGunID')
                      ->join('gunType','gunType.id','=','guns.guntype_id')
                      ->select('guns.name as gun',
                        'gunType.name as gunType',
                        'tblClaimeddelivery.serialNo',
                        'tblGunRequests.establishments_id',
                        'tblGunDeliveries.created_at as deliveryDate',
                        'tblGunDeliveries.deliveryPerson')
                      ->whereBetween('tblGunDeliveries.created_at', [$request->startFrom, $request->endTo])
                      ->get();
        $establishments = DB::table('establishments')
                            ->join('areas','areas.id','=','establishments.areas_id')
                            ->join('provinces','provinces.id','=','areas.provinces_id')
                            ->select('establishments.name as estabName',
                                      'establishments.address as address',
                                      'areas.name as area',
                                      'provinces.name as province',
                                      'establishments.id'
                                    )
                            ->get();

       // return $establishments->toArray();
         $number_of_guns_report = PDF::loadView('AdminPortal.Reports_PDF.number_of_guns',
                    [
                      'start' => $request->startFrom,
                      'end' => $request->endTo,
                      'clientGuns' => $clientGuns,
                      'establishments' => $establishments,
                    ])->setPaper('a4', 'landscape');
      return $number_of_guns_report->stream('Number of Guns.pdf');
    }

    public function gains(Request $request){
      $gains_employees = DB::table('employees')
                              ->where('employees.status','=','deployed')
                              ->join('tblestabguards','tblestabguards.strGuardID','=','employees.id')
                              ->get();
      $gains_report = PDF::loadView('AdminPortal.Reports_PDF.gains_report',
                    [
                      'start' => $request->startFrom,
                      'end' => $request->endTo,
                      'gains_employees' => $gains_employees
                      
                    ])->setPaper('a4', 'landscape');
      return $gains_report->stream('Gains.pdf');
    }

    public function loses(Request $request){

    }
}
