<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Employee;
class EmployeeAuthControl extends Controller
{
    
    protected $redirectTo = 'Home';

    

    public function login(Request $request)
    {
        

        if (Auth::guard('employee')->attempt(['email'=>$request->secu_username,'password'=>$request->secu_password])) {
            $count = Employee::where('email','=',$request->secu_username)->where('status','!=','deleted')->count();
                
            if ($count===1) {
                $key="";
                $employee = Employee::where('email','=',$request->secu_username)->get();
                foreach ($employee as $emp) {
                        $key = $emp->id;
                }
                session(['user' => $key]);
                      $e = Employee::find($key);
                      return redirect()->intended(route('/SecurityGuardsPortalHome'));
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
        Auth::guard('employee')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/Login');
    }
}
