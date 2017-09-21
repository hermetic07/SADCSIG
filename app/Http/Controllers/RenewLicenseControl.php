<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\SecurityLicense;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Exception;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\swapnotif;
class RenewLicenseControl extends Controller
{
    public function sendWarning(Request $request)
    {
        $notif = new swapnotif();
        $notif->emp_id = $request->id;
        $notif->message = "Warning! Your Guard License is about to expire, pls renew it immediately and report to the agency";
        $notif->status = "warning";
        $notif->save();
        return "Warning Sent";
    }

    public function update(Request $request)
    {
        DB::table('security_license')
        ->where('employee_id', $request->id)
        ->update(['date_issued' =>$request->issued,'date_expired'=>$request->expire ]);
        return "Success";
    }
}