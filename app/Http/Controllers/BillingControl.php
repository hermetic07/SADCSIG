<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Clients;
use App\Establishments;
use App\Area;
use App\Province;
use App\vat;
use App\ewt;

use App\Contracts;

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

    public function submitSOA(Request $r)
    {
      $collection = Collections::where('intid',$r->id)->first();
      if($collection->decTotal!==null&&$collection->decTotal!==""){
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
        $data = [
            'guards'=>$con->guard_count,
            'amount'=>number_format($all->decTotal, 2, '.', ',')
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
        $data = [
            'con'=>$con,
            'col'=>$r->id,
            'cli'=>$cli,
            'diff'=>$diff,
            'date'=>$date,
            'date1'=>$date1,
            'date2'=>$date2,
        ];
        return $data;
    }
    public function soa($con,$col,$cli,$diff,$date,$date1,$date2){
        $client = Clients::find($cli);
        $contract = Contracts::find($con);
        $estab = Establishments::where('contract_id',$con)->first();
        $area = Area::find($estab->areas_id);
        $prov = Province::find($estab->province_id);
        $collection = Collections::where('intid',$col)->first();
        $vat = vat::all()->first();
        $vattotal = 2956.71*($vat->value/100); //2000 is just sample agancee fee
        $ewt = ewt::all()->first();
        $ewttotal = 2956.71*($ewt->value/100);//2000 is just sample agancee fee
        $subtotal = ($contract->monthlyCP/30*$diff)*$contract->guard_count+2956.71+$vattotal;
        $sumtotal = $subtotal - $ewttotal;
        $collection->intdays = $diff;
        $collection->dateInvoice = $date;
        $collection->dateFrom = $date1;
        $collection->decTotal = $sumtotal;
        $collection->save();

        $pdf = PDF::loadView('AdminPortal/SOA', [
            'sumtotal'=>$sumtotal,
            'subtotal'=>$subtotal,
            'es'=>$estab,
            'vat'=>$vat,
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
          ]);
                  
          return $pdf->stream('StatementOfAccount.pdf');

       
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
}
