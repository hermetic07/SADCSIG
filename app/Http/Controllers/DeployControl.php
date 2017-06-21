<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nature;
use PDF;
use Illuminate\Support\Facades\Input;
class DeployControl extends Controller
{

    public function index()
    {
      $c = Nature::all();
      $pdf=PDF::loadView('pdf',['c'=>$c]);
      return $pdf->stream('contract.pdf');
    }

}
