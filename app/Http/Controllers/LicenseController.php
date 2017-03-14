<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\License;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class LicenseController extends Controller {
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
			$data = new License ();
			$data->name = $request->name;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = License::all ();
		return view ( 'Realtime.license' )->withData ( $data );
	}

	public function editItem(Request $req) {
		$data = License::find ( $req->id );
		$data->name = $req->name;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = License::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
