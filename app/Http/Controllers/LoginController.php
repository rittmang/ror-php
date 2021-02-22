<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // $credentials=$request->only('email','password');
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_admin'=>True])){
            //Authentication passed...
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        elseif(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_admin'=>False])){
            //Authentication passed...
            $request->session()->regenerate();
            return redirect('movies/all');
        }
        return redirect('login')->with('message','YOU STUPID BISH');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    public function register(Request $request){
        if($request->adminkey == env('NEW_USER_ADMINKEY'))
        {
            try{
                $user = new User;
                $user->name=$request->name;
                $user->email=$request->email;
                $user->password=Hash::make($request->password);
                $user->is_admin=True;
                $user->save();
                return redirect('login')->with('message','Login Now');
            }
            catch(Exception $e){
                return redirect('register')->with('message',$e->getMessage());
            }

        }
        elseif($request->adminkey == env('NEW_USER_KEY'))
        {
            try{
                $user = new User;
                $user->name=$request->name;
                $user->email=$request->email;
                $user->password=Hash::make($request->password);
                $user->is_admin=False;
                $user->save();
                return redirect('login')->with('message','Login Now');
            }
            catch(Exception $e){
                return redirect('register')->with('message',$e->getMessage());
            }

        }
        else{
            return redirect('register')->with('message','Invalid Key');
        }
    }
}

