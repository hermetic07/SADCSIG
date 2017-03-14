<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gun;
use App\GunType;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class GunController extends Controller {
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
			$data = new Gun ();
			$data->name = $request->name;
			$data->guntype = $request->selection;
      $data->status = "active";
			$data->save ();
			return response ()->json ( $data );
		}
	}

	public function readItems(Request $req) {
		$data = Gun::all ();
		$mil = GunType::all ();
		return view ( 'Realtime.Gun' )->with('data',$data)->with('mil',$mil);
	}

	public function editItem(Request $req) {
		$data = Gun::find ( $req->id );
		$Militaries = GunType::where('name', $req->Gun_Unit)->value('id');
		$data->name = $req->name;
		$data->guntype = $request->selection;
		$data->save ();
		return response ()->json ( $data );
	}

	public function deleteItem(Request $req) {

    $id = $req -> id;
    $data = Gun::find($id);
    $data->status = "deleted";
    $response = $data -> save();
		return response ()->json ();
	}
}
