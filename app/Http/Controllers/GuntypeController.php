<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guntype;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class GuntypeController extends Controller {
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
			$data = new Guntype ();
			$data->name = $request->name;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Guntype::all ();
		return view ( 'Realtime.Guntype' )->withData ( $data );
	}

	public function editItem(Request $req) {
		$data = Guntype::find ( $req->id );
		$data->name = $req->name;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Guntype::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
