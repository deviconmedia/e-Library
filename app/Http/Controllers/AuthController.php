<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    //Do Login for users or members
    public function doLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)){
            //Get user status
            $u = User::where('email', $request->email)->get();
            //If user status is inactive
            if($u[0]['status'] != 'active'){
                return redirect()->back()->with('error', 'Opps! Your account is inactive please contact administrator to activate!');
            }
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->with('error', 'Opps! Wrong Email or Password!');
    }

    //Do Sign Out
    public function doLogout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
