<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rank;
use App\Military;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
class RankControl extends Controller
{

    public function index()
    {
      $Ranks = Rank::all();
      $Militaries = Military::all();
      return view('maintenance.rank')->with('Ranks',$Ranks)->with('Militaries',$Militaries);
    }

    public function add(Request $request)
    {
      $rules = array (
  				'name' => 'regex:/(^[A-Za-z0-9 ]+$)+/'
  		);
  		$validator = Validator::make ( Input::all (), $rules );
  		if ($validator->fails ())
  			return Response::json ( array (

  					'errors' => $validator->getMessageBag ()->toArray ()
  			) );
  		else {
  			try {
          $data = new Rank ();
    			$data->name = $request->name;
    			$data->mname = $request->selection;
          $data->status = "active";
    			$data->save ();
          if ($data->status === "active") {
    				$data->status = "checked";
    			}
    			else {
    				$data->status = "";
    			}
    			return response ()->json ( $data );
  			} catch (Exception $e) {
          return Response::json ( array (

             'errors' => "ERROR!! The value that you entered is already existing"
          ));
  			}

  		}
    }

    public function view(Request $request)
     {
         if($request->ajax()){
             $id = $request->id;
             $info = Rank::find($id);
             //echo json_decode($info);
             return response()->json($info);
         }
     }

    public function update(Request $req)
     {
       $data = Rank::find ( $req->id );
       $data->mname = $req->selection;
       $data->name = $req->name;
       $data->save ();
       if ($data->status === "active") {
         $data->status = "checked";
       }
       else {
         $data->status = "";
       }
       return response ()->json ( $data );
     }

    public function delete(Request $request)
     {
         $id = $request -> id;
         $data = Rank::find($id);
         $data->status = "deleted";
         $response = $data -> save();
         if($response)
             echo "Record Deleted successfully.";
         else
             echo "There was a problem. Please try again later.";
     }

     public function status(Request $request)
     {
         $id = $request -> id;
         $Ranks = Rank::find($id);
         if($Ranks->status==='active')
         {
            $Ranks->status = "inactive";
         }
         else{
           $Ranks->status = "active";
         }
         $response  = $Ranks->save();
         if($response)
             echo "Record's status successfully changed.";
         else
             echo "There was a problem. Please try again later.";
     }
}
