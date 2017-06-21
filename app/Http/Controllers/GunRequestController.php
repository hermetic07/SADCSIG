<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\Establishments;
use App\Gun;
use App\GunRequest;
use App\Area;
use App\Province;

class GunRequestController extends Controller
{
    public function index(){
    	$gunRequests = GunRequest::latest('created_at')->get();
    	$clients = Clients::all();
        $establishments = Establishments::all();
    	$guns = Gun::all();
    	$areas = Area::all();
    	$provinces = Province::all();

    	return view('AdminPortal.ClientRequests.GunRequests')->with('gunRequests',$gunRequests)->with('clients',$clients)->with('guns',$guns)->with('areas',$areas)->with('provinces',$provinces)->with('establishments',$establishments);
    }
    public function remove(Request $request)
     {
         $id = $request -> id;
         $data = GunRequest::findOrFail($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Removed successfully.";
         else
             echo "There was a problem. Please try again later.";
     }
}
