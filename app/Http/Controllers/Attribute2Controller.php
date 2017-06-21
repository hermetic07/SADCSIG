<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\Measurement;

class Attribute2Controller extends Controller
{
    public function index(){

    	$attributes = Attribute::all();
    	$measurement = Measurement::all();
    	return view('maintenance.attribute2')->with('Attributes',$attributes)->with('measurements',$measurement);
    }
}
