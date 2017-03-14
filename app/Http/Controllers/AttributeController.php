<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\Measurement;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class AttributeController extends Controller {
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
			$data = new Attribute ();
			$data->name = $request->name;
			$data->measurement = $request->selection;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Attribute::all();
		$mil = Measurement::all();
		return view ( 'Realtime.Attribute' )->with( 'data',$data )->with('mil',$mil);
	}

	public function editItem(Request $req) {
		$data = Attribute::find ( $req->id );
		$data->name = $req->name;
		$data->measurement = $req->selection;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Attribute::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
