<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class LeaveController extends Controller {
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
			$data = new Leave ();
			$data->name = $request->name;
			$data->days = $request->days;
			$data->notification = $request->notification;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Leave::all ();
		return view ( 'Realtime.Leave' )->withData ( $data );
	}

	public function editItem(Request $req) {
		$data = Leave::find ( $req->id );
		$data->name = $req->name;
		$data->days = $req->days;
		$data->notification = $req->notification;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Leave::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
