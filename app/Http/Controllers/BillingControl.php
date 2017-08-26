<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Clients;
use App\Establishments;

use App\vat;
use App\ewt;

use App\Contracts;

use App\Collections;
use App\Billings;


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
