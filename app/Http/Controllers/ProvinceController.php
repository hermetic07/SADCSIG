<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class ProvinceController extends Controller {
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
			$data = new Province ();
			$data->name = $request->name;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Province::all ();
		return view ( 'Realtime.Province' )->withData ( $data );
	}

	public function editItem(Request $req) {
		$data = Province::find ( $req->id );
		$data->name = $req->name;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Province::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
