<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Nature;
use App\Gun;
use App\Attribute;
use App\License;
use App\Requirement;
use App\Rank;
use App\Military;
use App\GunType;
use App\Province;
use App\Area;
use Exception;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class LastControl extends Controller
{

    public function index()
    {
      $Services = Service::all();
      return view('last.request')->with('services',$Services);
    }

    public function index2()
    {
      $n = Nature::all();
      $p = Province::all();
      $a = Area::all();
      $g = Gun::all();
      $gt = GunType::all();
      return view('last.clients')->with('a',$a)->with('p',$p)->with('n',$n)->with('g',$g)->with('gt',$gt);
    }

    public function index3()
    {
      $g = Gun::all();
      return view('last.Sendgun')->with('g',$g);
    }

    public function index4()
    {
      $g = Gun::all();
      return view('last.Deploy')->with('g',$g);
    }

    public function index5()
    {
      $g = Gun::all();
      return view('last.login')->with('g',$g);
    }

    public function index6()
    {
      $a = Attribute::all();
      $r = Requirement::all();
      $l = License::all();
      $ra = Rank::all();
      $m = Military::all();
      return view('last.secus')->with('a',$a)->with('r',$r)->with('l',$l)->with('ra',$ra)->with('m',$m);
    }
}
