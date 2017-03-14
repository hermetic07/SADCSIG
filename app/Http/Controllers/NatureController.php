<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nature;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class NatureController extends Controller {
	public function addItem(Request $request) {
		$rules = array (
				'name' => 'required|alpha_num'
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ())
			return Response::json ( array (

					'errors' => $validator->getMessageBag ()->toArray ()
			) );
		else {
			$data = new Nature ();
			$data->name = $request->name;
			$data->price = $request->price;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Nature::all ();
		return view ( 'Realtime.Nature' )->withData ( $data );
	}

	public function editItem(Request $req) {
		$data = Nature::find ( $req->id );
		$data->name = $req->name;
		$data->price = $req->price;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Nature::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
