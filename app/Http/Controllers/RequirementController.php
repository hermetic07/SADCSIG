<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class RequirementController extends Controller {
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
			$data = new Requirement ();
			$data->name = $request->name;
      $data->status = "active";
			$data->save ();
			if ($data->status === "active") {
				$data->status = "checked";
			}
			else {
				$data->status = "";
			}
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Requirement::all ();
		return view ( 'Realtime.Requirement' )->withData ( $data );
	}

	public function editItem(Request $req) {
		$data = Requirement::find ( $req->id );
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

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Requirement::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
