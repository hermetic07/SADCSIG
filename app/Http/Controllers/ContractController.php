<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\PrefBasic;
use App\PrefAttrib;
use App\PrefLicense;
use App\PrefRequirement;
use App\Province;
use App\Shifts;
use App\Nature;
use App\Service;
use App\Contracts;
use App\License;
use App\Attribute;
use App\ClientsPic;
use App\Requirement;
use Carbon\Carbon;
use App\Establishments;
use App\Clients;
use App\ClientRegistration;
use App\ServiceRequest;
use Exception;
use DB;
use Illuminate\Support\Facades\Input;
class ContractController extends Controller
{
    public function register(){
      $areas = Area::all();
        $provinces = Province::all();
        $natures = Nature::all();
        $services = Service::all();
        $licenses = License::all();
        $attributes = Attribute::all();
        $requirements = Requirement::all();
        $count1 = "CONTRACTz".Contracts::get()->count();
        $count2 = "CLIENTz".Clients::get()->count();
        return view('AdminPortal.ClientRegistration')->with('requirements',$requirements)->with('attributes',$attributes)->with('licenses',$licenses)->with('areas',$areas)->with('provinces',$provinces)->with('natures',$natures)->with('services',$services)->with('clcode',$count2)->with('cncode',$count1);
    }

    public function login(Request $request){
      $count = Clients::where('email','=',$request->client_username)->where('password','=',$request->client_password)->count();
      $test = Clients::where('email','=',$request->client_username)->where('password','=',$request->client_password)->get();

      if ($count===1) {
        foreach ($test as $t) {
          $key = $t->id;
        }
        session(['client' => $key]);
        return redirect('/ClientPortalHome-'.$key);
      }
      else {
          return view('clientloginform');
      }
    }

    public function signin(){
      return view('clientloginform');
    }

    public function home(Request $request){
      $value = $request->session()->get('client');
      $u = Clients::find($value);
      return view('Complete')->with('u',$u);
    }

    public function logout(Request $request){
      $request->session()->forget('client');
      return view('clientloginform');
    }

    public function save(Request $request){
      //return $request->from;
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

        Clients::create(['id'=>$request->client_code,'name'=>$request->client_name,'username'=>$request->client_username,'password'=>$request->client_password,'address'=>$request->street_add,'areas_id'=>$request->area,'email'=>$request->client_email,'contactNo'=>$request->client_telephone,'cellphoneNo'=>$request->client_cellphone]);

        $establishment_id = 'ESTAB-'.$request->client_code;

        Contracts::create(['id'=>$request->contract_code,'pic_fname'=>$request->firstName,'pic_mname'=>$request->middleName,'pic_lname'=>$request->lastName,'establishment_name'=>$request->estab_name,'services_id'=>$request->service,'address'=>$request->street_add,'areas_id'=>$request->area,'guard_count'=>$request->no_guards,'status'=>"pending",'year_span'=>$request->span_mo,'start_date'=>$startDate,'end_date'=>$endDate,'exp_date'=>$exp_date,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'strEstablishmentID'=>$establishment_id]);

        $contracts = Contracts::latest('created_at')->get();

        foreach ($contracts as $contract) {
            $ctr++;
            if($ctr == 1){

                $person_in_charge = $contract->pic_fname." ".$contract->pic_mname." ".$contract->pic_lname;
            }
        }

        

        Establishments::create(['id'=>$establishment_id,'contract_id'=>$request->contract_code,'name'=>$request->estab_name,'person_in_charge'=>$person_in_charge,'contactNo'=>$request->pic_no,'email'=>$request->pic_email,'address'=>$request->street_add,'natures_id'=>$request->nature,'areas_id'=>$request->area,'province_id'=>$request->province,'operating_hrs'=>$request->operating_hrs,'area_size'=>$request->area_size,'population'=>$request->population]);

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

    public function saveImage(Request $request){
      try {
        $count =0;
        $value = $request->session()->get('client');
        $value2 = $request->session()->get('contract');
        $client = Clients::find($value);
        if (Input::hasFile('clientpicture')) {
          $file = Input::file('clientpicture');
          $file->move('uploads', $value."cli".$file->getClientOriginalName());
          $client->image = $value."cli".$file->getClientOriginalName();
          $client->save();
        }
        $clientspic = new ClientsPic();
        $clientspic->stringContractId = $value2;
        if (Input::hasFile('location')) {
          $file = Input::file('location');
          $file->move('uploads', $value."loc".$file->getClientOriginalName());
          $clientspic->stringlocation = $value."loc".$file->getClientOriginalName();
          $count+=1;
        }
        if (Input::hasFile('picpicture')) {
          $file = Input::file('picpicture');
          $file->move('uploads', $value."pic".$file->getClientOriginalName());
          $clientspic->stringpic = $value."pic".$file->getClientOriginalName();
          $count+=1;
        }
        if (Input::hasFile('establishment')) {
          $file = Input::file('establishment');
          $file->move('uploads', $value."es".$file->getClientOriginalName());
          $clientspic->stringestablishment = $value."es".$file->getClientOriginalName();
          $count+=1;
        }
        if ($count!==0) {
          $clientspic->save();
        }
        $request->session()->forget('client');
        $request->session()->forget('contract');
        return redirect('/Dashboard');
      } catch (Exception $e) {
        return $e;
      }


    }

    public function allCLients()
    {
      $clientlist =  Clients::all();  
      return view('AdminPortal/ActiveClient')->with('client', $clientlist);
    }
}
