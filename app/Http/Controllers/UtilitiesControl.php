<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AddGuardRequests;

use App\vat;
use App\ewt;
use App\Agencyfee;
use App\Billingday;


class UtilitiesControl extends Controller
{
    
    public function vatupdate(Request $r){
        
        try{
            $count = vat::get()->count();
            if ($count>0) {
                $id = $r->get('pk');
                $v = vat::findOrFail($id);
                $name = $r->get('name');
                $value = $r->get('value');
                $v->$name = $value;
                $v->save();
            }
            else {
                $v = new vat();
                $id = $r->get('pk');
                $v->id = $id;
                $v->name = "vat";
                $value = $r->get('value');
                $v->value = $value;
                $v->save();
            }
        }catch(Exception $e){
            return $e;
        }
    }

    public function ewtupdate(Request $r){
        
        try{
            $count = ewt::get()->count();
            if ($count>0) {
                $id = $r->get('pk');
                $e = ewt::findOrFail($id);
                $name = $r->get('name');
                $value = $r->get('value');
                $e->$name = $value;
                $e->save();
            }
            else {
                $e = new ewt();
                $id = $r->get('pk');
                $e->id = $id;
                $e->name = "vat";
                $value = $r->get('value');
                $e->value = $value;
                $e->save();
            }
        }catch(Exception $e){
            return $e;
        }
    }

    public function tax(){
        $v = vat::All()->first();
        $e = ewt::All()->first();

        return view('Utilities/Tax')->with('v',$v)->with('e',$e);
    }

    public function agencyfee(){
        $v = Agencyfee::All()->first();

        return view('Utilities/AgencyFee')->with('a',$v);
    }

    public function agencyfeeupdate(Request $r){
        
        try{
            $count = Agencyfee::get()->count();
            if ($count>0) {
                $id = $r->get('pk');
                $e = Agencyfee::findOrFail($id);
                $name = $r->get('name');
                $value = $r->get('value');
                $e->$name = $value;
                $e->save();
            }
            else {
                $e = new Agencyfee();
                $id = $r->get('pk');
                $e->id = $id;
                $e->name = "agencyfee";
                $value = $r->get('value');
                $e->value = $value;
                $e->save();
            }
        }catch(Exception $e){
            return $e;
        }
    }

    public function dates(){
        $a = Billingday::where('type','first')->first();
        $b = Billingday::where('type','second')->first();
        return view('Utilities/dates')->with('a',$a)->with('b',$b);
    }

    public function dayoneupdate(Request $r){
        
        try{
            $count = Billingday::where('type','first')->count();
            if ($count>0) {
                $id = $r->get('pk');
                $e = Billingday::findOrFail($id);
                $name = $r->get('name');
                $value = $r->get('value');
                $e->$name = $value;
                $e->save();
            }
            else {
                $e = new Billingday();
                $id = $r->get('pk');
                $e->id = $id;
                $e->type = "first";
                $value = $r->get('value');
                $e->day = $value;
                $e->save();
            }
        }catch(Exception $e){
            return $e;
        }
    }

    public function daytwoupdate(Request $r){
        
        try{
            $count = Billingday::where('type','second')->count();
            if ($count>0) {
                $id = $r->get('pk');
                $e = Billingday::findOrFail($id);
                $name = $r->get('name');
                $value = $r->get('value');
                $e->$name = $value;
                $e->save();
            }
            else {
                $e = new Billingday();
                $id = $r->get('pk');
                $e->id = $id;
                $e->type = "second";
                $value = $r->get('value');
                $e->day = $value;
                $e->save();
            }
        }catch(Exception $e){
            return $e;
        }
    }
}
