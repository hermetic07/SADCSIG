<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Clients;
class ClientAuthControl extends Controller
{

    protected $redirectTo = 'Login';



    public function login(Request $request)
    {


        if (Auth::guard('client')->attempt(['email'=>$request->client_username,'password'=>$request->client_password])) {
            $count = Clients::where('email','=',$request->client_username)->count();

            if ($count===1) {
                $key="";
                $employee = Clients::where('email','=',$request->client_username)->get();
                foreach ($employee as $emp) {
                        $key = $emp->id;
                }
                session(['client' => $key]);
                return redirect('/ClientPortalHome-'.$key);
            }
            else {
                $stat = 1;
                return view('clientloginform')->with('stat',$stat);
            }

        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/Login');
    }
}
