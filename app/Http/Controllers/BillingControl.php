<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Clients;
use App\Establishments;
use App\Area;
use App\Nature;
use App\Province;
use App\vat;
use App\ewt;
use App\Agencyfee;
use App\Contracts;
use App\Billingday;
use App\Collections;
use App\Billings;
use PDF;

class BillingControl extends Controller
{

    public function index()
    {
        $all = DB::table('tblcollections')
        ->join('contracts', 'contracts.id', '=', 'tblcollections.strContractId')
        ->join('clients', 'clients.id', '=', 'tblcollections.strClientId')
        ->select('contracts.id as cid','clients.id as client',"tblcollections.intid as collection","tblcollections.strbillingId as bill","tblcollections.strbillingId as due",'clients.first_name as first','clients.last_name as last')
        ->where('tblcollections.strStatus',"notsent")
        ->orderBy('tblcollections.created_at')
        ->get();
      return view('AdminPortal/BillingPeriod')->with("all",$all);
    }

    public function getRecord(Request $r)
    {
      $client = Clients::find($r->client);
      $estab = Establishments::where("contract_id",$r->contract)->first();
      $contract = Contracts::find($r->contract);
      $data = [
          "name"=>$client->first_name." ".$client->last_name,
          "es"=>$estab->name,
          "con"=>$client->contactNo,
          "add"=>$estab->address,
          "gd"=>$contract->guard_count,
          "cd"=>$contract->start_date,
      ];
      return $data;
    }

    public function getbillingdays(Request $r)
    {
      $day1 = Billingday::find(1);
      $day2 = Billingday::find(2);
      $data = [
        'day1'=> $day1->day,
        'day2'=> $day2->day,
      ];
      return $data;
    }

    public function submitSOA(Request $r)
    {
      $collection = Collections::where('intid',$r->id)->first();
      if($collection->decDay!==null||$collection->decNight!==null){
        $collection->strStatus = "sent";
        $collection->save();
        return "SOA SENT";
      }
      else{
        return "Create a SOA first before submitting";
      }
    }

    public function allSOA(){
        $all = Collections::orderBy('strbillingId','DESC')->get();
        return view('AdminPortal/ClientPayment')->with('all',$all);
    }

    public function paymentInfo(Request $r){
        $all = Collections::find($r->id);
        $con = Contracts::find($all->strContractId);
        $total = $all->decDay + $all->decNight + $all->decVat - $all->decEwt + $all->decAc  ;
        $data = [
            'guards'=>$con->guard_count,
            'amount'=>number_format($total, 2, '.', ',')
        ];
        return $data;
    }

    public function paymentPaid(Request $r){
        $all = Collections::find($r->id);
        $all->strStatus = "paid";
        $all->datePaid = $r->date;
        $all->save();
        return "Billing mark as paid";
    }

    public function getLinks(Request $r){
        $col = Collections::find($r->id);
        $con = $col->strContractId;
        $cli = $col->strClientId;
        $diff = $col->intdays;
        $date = $col->dateInvoice;
        $date1 = $col->dateFrom;
        $date2 = $col->strbillingId;
        $day = $col->decDay;
        $night = $col->decNight;
        $vat = $col->decVat;
        $ewt= $col->decEwt;
        $ac= $col->decAc;
        $data = [
            'con'=>$con,
            'col'=>$r->id,
            'cli'=>$cli,
            'diff'=>$diff,
            'date'=>$date,
            'date1'=>$date1,
            'date2'=>$date2,
            'day' => $day,
            'night' => $night,
            'vat' => $vat,
            'ewt'=> $ewt,
            'ac'=> $ac,
        ];
        return $data;
    }
    public function soa($con,$col,$cli,$diff,$date,$date1,$date2,$day,$night){
        $client = Clients::find($cli);
        $contract = Contracts::find($con);
        $estab = Establishments::where('contract_id',$con)->first();
        $area = Area::find($estab->areas_id);
        $prov = Province::find($estab->province_id);
        $collection = Collections::where('intid',$col)->first();
        $ac = Agencyfee::all()->first();
        $vat = vat::all()->first();
        $vattotal = $ac->value*($vat->value/100);
        $ewt = ewt::all()->first();
        $subtotal = $day + $night + $vattotal + $ac->value;
        $month = $contract->monthlyCP+$ac->value+$vattotal;
        $ewttotal = $ac->value*($ewt->value/100);
        $sumtotal = $subtotal  - $ewttotal;
        $collection->intdays = $diff;
        $collection->dateInvoice = $date;
        $collection->dateFrom = $date1;
        $collection->decDay = $day;
        $collection->decNight = $night;
        $collection->decVat = $vattotal;
        $collection->decEwt = $ewttotal;
        $collection->decAc = $ac->value;
        $collection->save();
        $pdf = PDF::loadView('StatementOA', [
            'sumtotal'=>$sumtotal,
            'subtotal'=>$subtotal,
            'es'=>$estab,
            'vat'=>$vat,
            'ac'=>$ac->value,
            'month'=>$month,
            'totalvat'=>$vattotal,
            'ewt'=>$ewt,
            'totalewt'=>$ewttotal,
            'area'=>$area,
            'prov'=>$prov,
            'con'=>$contract,
            'col'=>$collection,
            'cli'=>$client,
            'diff'=>$diff,
            'date1'=>$date1,
            'date2'=>$date2,
            'date'=>$date,
            'day'=>$day,
            'night'=>$night,
          ]);

          return $pdf->stream('Statement.pdf');


    }

    public function soa2($con,$col,$cli,$diff,$date,$date1,$date2,$day,$night,$vat,$ewt,$ac){
        try {
          $client = Clients::find($cli);
          $contract = Contracts::find($con);
          $estab = Establishments::where('contract_id',$con)->first();
          $area = Area::find($estab->areas_id);
          $prov = Province::find($estab->province_id);
          $collection = Collections::where('intid',$col)->first();
          $actotal = $ac ;

          $vattotal = $vat;

          $subtotal = $day + $night + $vattotal + $actotal;

          $ewttotal = $ewt;
          $sumtotal = $subtotal  - $ewttotal;

          $pdf = PDF::loadView('StatementOA', [
              'sumtotal'=>$sumtotal,
              'subtotal'=>$subtotal,
              'es'=>$estab,
              'vat'=>$vat,
              'ac'=>$actotal,

              'totalvat'=>$vattotal,
              'ewt'=>$ewt,
              'totalewt'=>$ewttotal,
              'area'=>$area,
              'prov'=>$prov,
              'con'=>$contract,
              'col'=>$collection,
              'cli'=>$client,
              'diff'=>$diff,
              'date1'=>$date1,
              'date2'=>$date2,
              'date'=>$date,
              'day'=>$day,
              'night'=>$night,
            ]);

            return $pdf->stream('Statement.pdf');
        } catch (Exception $e) {
          return $e;
        }



    }

    public function BillingPeriod(Request $req){
        $count = Billings::where("strId",$req->id)->count();
        if ($count==0) {
            $b = new Billings();
            $b-> strId = $req->id;
            $b-> strStatus = "started";
            $b->save();
            $all = DB::table('client_registrations')
            ->join('contracts', 'contracts.id', '=', 'client_registrations.contract_id')
            ->select('contracts.id as cid', 'client_registrations.client_id as cl', 'contracts.status as status')
            ->where('contracts.status',"active")
            ->get();
            foreach ($all as $a) {
                $c = new Collections();
                $c->strbillingId = $req->id;
                $c->strContractId = $a->cid;
                $c->strClientId = $a->cl;
                $c->strStatus = "notsent";
                $c->save();
                return "Billing Period Started";
            }
        }

    }

    public function getNature(Request $r){
        $n = Nature::find($r->id);
        return $n->price;
    }
}
