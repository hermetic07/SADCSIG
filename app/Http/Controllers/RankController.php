<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rank;
use App\Military;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class RankController extends Controller {
	public function addItem(Request $request) {
		$rules = array (
				'name' => 'regex:/(^[A-Za-z0-9 ]+$)+/'
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ())
			return Response::json ( array (

					'errors' => $validator->getMessageBag ()->toArray ()
			) );
		else {
			$data = new Rank ();
			$data->name = $request->name;
			$data->mname = $request->selection;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Rank::all ();
		$mil = Military::all ();
		return view ( 'Realtime.Rank' )->with('data',$data)->with('mil',$mil);
	}

	public function editItem(Request $req) {
		$data = Rank::find ( $req->id );
		$data->mname = $req->selection;
		$data->name = $req->name;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Rank::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
