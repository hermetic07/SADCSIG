<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuardReplacementController extends Controller
{
    public function index(){
    	return view('AdminPortal.ClientRequests.GuardReplace');
    }
}
