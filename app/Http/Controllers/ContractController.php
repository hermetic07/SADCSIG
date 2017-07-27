<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Province;
use App\Shifts;
use App\Nature;
use App\Service;
use App\Contracts;
use App\License;
use App\Attribute;
use App\Requirement;
use Carbon\Carbon;
use App\Establishments;
use App\Clients;
use App\ClientRegistration;
use App\ServiceRequest;
use Exception;
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
        return redirect('/ClientPortalHome');
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

        Contracts::create(['id'=>$request->contract_code,'pic_fname'=>$request->firstName,'pic_mname'=>$request->middleName,'pic_lname'=>$request->lastName,'establishment_name'=>$request->estab_name,'services_id'=>$request->service,'address'=>$request->street_add,'areas_id'=>$request->area,'guard_count'=>$request->no_guards,'status'=>"active",'year_span'=>$request->span_mo,'start_date'=>$startDate,'end_date'=>$endDate,'exp_date'=>$request->exp_date,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);

        $contracts = Contracts::latest('created_at')->get();

        foreach ($contracts as $contract) {
            $ctr++;
            if($ctr == 1){

                $person_in_charge = $contract->pic_fname." ".$contract->pic_mname." ".$contract->pic_lname;
            }
        }

        Clients::create(['id'=>$request->client_code,'name'=>$request->client_name,'username'=>$request->client_username,'password'=>$request->client_password,'address'=>$request->street_add,'areas_id'=>$request->area,'email'=>$request->pic_email,'contactNo'=>$request->pic_no]);

        $establishment_id = 'ESTAB-'.$request->client_code;

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
          return $e;
        }


        return "Success";
      } catch (Exception $e) {
        return $e;
      }

     /* if($request->ajax()){
        $contractID;
        $clientID;

        $ctr = 0; $ctr2 = 0;
        $explod = explode('/',$request->from);
        $startDate = "$explod[2]-$explod[0]-$explod[1]";

        $explod = explode('/',$request->to);
        $endDate = "$explod[2]-$explod[0]-$explod[1]";

       $contract = new Contracts();
       $contract['id'] = $request->contract_code;
       $contract['pic_fname'] = $request->firstName;
       $contract['pic_mname'] = $request->middleName;
       $contract['pic_lname'] = $request->lastName;
       $contract['establishment_name'] = $request->estab_name;
       $contract['services_id'] = $request->service;
       $contract['address'] = $request->street_add;
       $contract['areas_id'] = $request->area;
       $contract['guard_count'] = $request->no_guards;
       $contract['status'] = "active";
       $contract['year_span'] = $request->span_mo;
       $contract['start_date'] = $startDate;
       $contract['end_date'] = $endDate;

       $client = new Clients();
       $client['id'] = $request->client_code;
       $client['name'] = $request->client_name;
       $client['username'] = $request->client_username;
       $client['password'] = $request->client_password;
       $client['address'] = $request->street_add;
       $client['areas_id'] = $request->area;
       $client['email'] = $request->pic_email;
       $client['contactNo'] = $request->pic_no;





      $index1 = 0;
        $allstart = Input::get('allstart');
        $allend = Input::get('allend');
        try {
          foreach($allstart as $a) {
            $index2 = 0;
            $s = new Shifts();
            $s->contract_id = $request->contract_code;
            $s->start = $a;
            foreach($allend as $b)
            {
              if($index1==$index2)
              {
                $s->end = $b;
                $s->save();
              }
              $index2+=1;
            }
            $index1+=1;
          }
        } catch (Exception $e) {
          return $e;
        }

         if($contract->save() && $client->save()){
           return "Success";
       }

      }*/
    }
}
