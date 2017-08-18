<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRequest;
use App\Clients;
use App\Establishments;
use App\Area;
use App\Province;
use App\Service;
use App\Nature;
use App\Contracts;
use Carbon\Carbon;
use App\ClientRegistration;
use App\ClientsPic;
use App\License;
use App\Attribute;
use App\Requirement;
use Illuminate\Support\Facades\Input;
use App\Shifts;
use App\PrefBasic;
use App\PrefAttrib;
use App\PrefLicense;
use App\PrefRequirement;

class ServiceRequestController extends Controller
{
    public function index(){
        $serviceRequests = ServiceRequest::latest('created_at')->get();
        $clients = Clients::all();
        $establishments = Establishments::all();
        $areas = Area::all();
        $provinces = Province::all();
        $services = Service::all();
        $clientPic = ClientsPic::all();
        
        return view('AdminPortal.ClientRequests.ServiceRequests')
                ->with('serviceRequests',$serviceRequests)
                ->with('clients',$clients)
                ->with('areas',$areas)
                ->with('provinces',$provinces)
                ->with('services',$services)
                ->with('establishments',$establishments)
                ->with('clientPic',$clientPic);
        
    }
    public function viewModal(Request $request){
        if($request->ajax()){
            $serviceRequests = ServiceRequest::findOrFail($request->serviceRequestID);
            $client = Clients::findOrFail($serviceRequests->client_id);
            return view('AdminPortal.ClientRequests.ServiceRequestsComponents.viewModal')
                    ->with('client',$client);
        }
    }

    /*public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = ServiceRequest::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }*/
     public function remove(Request $request)
     {
         $id = $request -> id;
         $data = ServiceRequest::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }

     public function newContract($id){

        // $serviceRequest = ServiceRequest::findOrFail($id);

        // $client = Clients::findOrFail($serviceRequest->client_id);
        // $areas = Area::all();
        // $provinces = Province::all();
        // $natures = Nature::all();
        // $services = Service::all();
        // $establishments = Establishments::all();
        // $clientRegistrations = ClientRegistration::all();
        // $contracts = Contracts::all();

        // return view('AdminPortal.ClientRequests.NewContract')->with('areas',$areas)->with('provinces',$provinces)->with('natures',$natures)->with('services',$services)->with('client',$client)->with('serviceRequest',$serviceRequest)->with('establishments',$establishments)->with('clientRegistrations',$clientRegistrations)->with('contracts',$contracts);

        $client = Clients::findOrFail($id);
        $areas = Area::all();
        $provinces = Province::all();
        $natures = Nature::all();
        $services = Service::all();
        $establishments = Establishments::all();
        $clientRegistrations = ClientRegistration::all();
        $licenses = License::all();
        $attributes = Attribute::all();
        $requirements = Requirement::all();
        $count1 = "CONTRACTz".Contracts::get()->count();

         return view('AdminPortal.ClientRequests.NewContract')->with('requirements',$requirements)->with('attributes',$attributes)->with('licenses',$licenses)->with('areas',$areas)->with('provinces',$provinces)->with('natures',$natures)->with('services',$services)->with('clcode',$client->id)->with('cncode',$count1)->with('client',$client);

     }
     public function saveContract(Request $request){

         try {

        $clientID;
        $person_in_charge;
        $ctr = 0; $ctr2 = 0;
        $explod = explode('/',$request->from);
        $startDate = "$explod[2]-$explod[0]-$explod[1]";
        $explod = explode('/',$request->to);
        $endDate = "$explod[2]-$explod[0]-$explod[1]";
        $parse_exp_date = explode('/',$request->exp_date);
        $exp_date = "$parse_exp_date[2]-$parse_exp_date[0]-$parse_exp_date[1]";

        Contracts::create(['id'=>$request->contract_code,'pic_fname'=>$request->firstName,'pic_mname'=>$request->middleName,'pic_lname'=>$request->lastName,'establishment_name'=>$request->estab_name,'services_id'=>$request->service,'address'=>$request->street_add,'areas_id'=>$request->area,'guard_count'=>$request->no_guards,'status'=>"pending",'year_span'=>$request->span_mo,'start_date'=>$startDate,'end_date'=>$endDate,'exp_date'=>$exp_date,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);

        $contracts = Contracts::latest('created_at')->get();

        foreach ($contracts as $contract) {
            $ctr++;
            if($ctr == 1){

                $person_in_charge = $contract->pic_fname." ".$contract->pic_mname." ".$contract->pic_lname;
            }
        }

        $establishment_id = 'ESTAB-'.$request->contract_code;

        Establishments::create(['id'=>$establishment_id,'contract_id'=>$request->contract_code,'name'=>$request->estab_name,'person_in_charge'=>'Earl','contactNo'=>$request->pic_no,'email'=>$request->pic_email,'address'=>$request->street_add,'natures_id'=>$request->nature,'areas_id'=>$request->area,'province_id'=>$request->province,'operating_hrs'=>$request->operating_hrs,'area_size'=>$request->area_size,'population'=>$request->population]);

        ClientRegistration::create(['admin'=>"EarlPogi",'contract_id'=>$request->contract_code,'client_id'=>$request->client_code]);

        $index1 = 0;
        $allstart = Input::get('allstart');
        $allend = Input::get('allend');
        try {
          foreach($allstart as $a) {
            $index2 = 0;
            $s = new Shifts();
            $s->estab_id = $establishment_id;
            $s->start = $a;
            foreach($allend as $b)
            {
              if($index1===$index2)
              {
                $s->end = $b;
                $s->save();
              }
              $index2+=1;
            }
            $index1+=1;
          }
        } catch (Exception $e) {
          return "Error in shifting";
        }

        //basic preferences
        try {
          $prefBasic = new PrefBasic();
          $prefBasic->stringContractId = $request->contract_code;
          $prefBasic->stringSchoolLevel=$request->prefSchool;
          $prefBasic->intAge=$request->prefAge;
          $prefBasic->stringNote=$request->prefNote;
          $prefBasic->save();
        } catch (Exception $e) {
          return "Pls Check the preferences tab";
        }

        //licenses preferences
        try {
          $allLicense = Input::get('prefLicense');
          foreach ($allLicense as $a) {
            $lic = new PrefLicense();
            $lic->stringContractId = $request->contract_code;
            $lic->intLicenseId = $a;
            $lic->save();
          }
        } catch (Exception $e) {
          return "No seleceted License";
        }

        //Requirement preferences
        try {
          $allreq = Input::get('prefReq');
          foreach ($allreq as $a) {
            $req = new PrefRequirement();
            $req->stringContractId = $request->contract_code;
            $req->intRequirementId = $a;
            $req->save();
          }
        } catch (Exception $e) {
          return "No seleceted Requirement";
        }

        //body preference
        $index1 = 0;
        $prefbody = Input::get('prefBody');
        $attribute = Attribute::all();
        try {
          foreach($attribute as $a) {
            $index2 = 0;
            foreach($prefbody as $b)
            {
              if($index1===$index2)
              {
                $explod = explode('/',$b);
                $s = new PrefAttrib();
                $s->stringContractId = $request->contract_code;
                $s->intAttributeId = $a->id;
                $s->intLowest =(int)$explod[0];
                $s->intGreatest = (int)$explod[1];;
                $s->save();
              }
              $index2+=1;
            }
            $index1+=1;
          }
        } catch (Exception $e) {
          return "All Prefered Body Attribute is Required";
        }
        session(['client' => $request->client_code]);
        session(['contract' => $request->contract_code]);
        return "Success";
      } catch (Exception $e) {
        return $e;
      }
    }
    public function uploadPic($id,Request $request){
        $client =  Clients::findOrFail($id);
        return view('AdminPortal.ClientRequests.NewContractPics')->with('clientPic',$client->image);
    }
}
