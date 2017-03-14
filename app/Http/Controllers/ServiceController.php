<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class ServiceController extends Controller {
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
			$data = new Service ();
			$data->name = $request->name;
			$data->description = $request->description;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Service::all ();
		return view ( 'Realtime.service' )->withData ( $data );
	}

	public function editItem(Request $req) {
		$data = Service::find ( $req->id );
		$data->name = $req->name;
		$data->description = $req->description;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Service::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
