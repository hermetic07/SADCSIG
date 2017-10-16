<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Validator;
use Response;
use Illuminate\Support\Facades\DB;
use Exception;
class EmployeeQuery extends Controller
{
    public function index()
    {
      return view("AdminPortal.Queries");
    }
    public function get(Request $req)
    {
      $all = Employee::where('first_name', 'LIKE', "%$req->first%")
                      ->where('middle_name', 'LIKE', "%$req->mid%")
                      ->where('last_name', 'LIKE', "%$req->last%")
                      ->where('street', 'LIKE', "%$req->street%")
                      ->where('barangay', 'LIKE', "%$req->barangay%")
                      ->where('city', 'LIKE', "%$req->city%")
                      ->where('email', 'LIKE', "%$req->email%")
                      ->where('status', 'LIKE', "%$req->status%")
                      ->where('gender', 'LIKE', "%$req->gender%")
                      ->orderby('created_at')
                      ->get();
      $data = "";
      foreach ($all as $a) {
        $data.="<tr>";
            $data.="<td>$a->id</td>";
            $data.="<td>$a->first_name $a->middle_name $a->last_name</td>";
            $data.="<td>$a->street $a->barangay $a->city</td>";
            $data.="<td>$a->gender</td>";
            $data.="<td>$a->email</td>";
            $data.="<td>$a->status</td>";
        $data.="</tr>";
      }
      return $data;
    }

    public function cget(Request $req)
    {
      $all = DB::table('clients')
      ->join('areas', 'areas.id', '=', 'clients.areas_id')
      ->select('clients.last_name as last_name','clients.middle_name as middle_name','clients.first_name as first_name', 'clients.address as address', 'clients.email as email', 'areas.name as area', 'clients.cellphoneNo as cellphone' , 'clients.contactNo as tellephone' )
                      ->where('first_name', 'LIKE', "%$req->first%")
                      ->where('clients.middle_name', 'LIKE', "%$req->mid%")
                      ->where('clients.last_name', 'LIKE', "%$req->last%")
                      ->where('clients.address', 'LIKE', "%$req->street%")
                      ->where('areas.name', 'LIKE', "%$req->city%")
                      ->where('clients.email', 'LIKE', "%$req->email%")
                      ->orderby('clients.created_at')
                      ->get();

      $data = "";
      foreach ($all as $a) {
        $data.="<tr>";
            $data.="<td>$a->first_name $a->middle_name $a->last_name</td>";
            $data.="<td>$a->address $a->area</td>";
            $data.="<td>$a->email</td>";
            $data.="<td>$a->cellphone</td>";
            $data.="<td>$a->tellephone</td>";
        $data.="</tr>";
      }
      return $data;
    }
}
