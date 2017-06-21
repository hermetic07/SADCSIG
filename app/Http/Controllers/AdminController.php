<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRequest;
use App\GunRequest;

class AdminController extends Controller
{
    public function dashboardIndex(){
    	$serviceRequests = ServiceRequest::latest('created_at')->get();
    	$gunRequests = GunRequest::latest('created_at')->get();
    	return view('AdminPortal.Dashboard')->with('serviceRequests',$serviceRequests)->with('gunRequests',$gunRequests);
    }
}
