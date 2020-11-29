<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){
            //Authentication passed...
            return redirect()->intended('dashboard');
        }
        return redirect('login')->with('message','YOU STUPID BISH');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

