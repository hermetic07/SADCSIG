<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Province;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class AreaController extends Controller {
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
			$data = new Area ();
			$data->name = $request->name;
			$data->province = $request->selection;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Area::all ();
		$mil = Province::all ();
		return view ( 'Realtime.Area' )->with('data',$data)->with('mil',$mil);
	}

	public function editItem(Request $req) {
		$data = Area::find ( $req->id );
		$data->province = $request->selection;
		$data->name = $req->name;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Area::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
