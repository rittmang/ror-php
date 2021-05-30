<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AdminEventNotification;
use App\Notifications\UserEventNotification;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // $credentials=$request->only('email','password');
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_admin'=>True])){
            //Authentication passed...
            $request->session()->regenerate();
            
            $userSchema = Auth::user();
            $adminEvent=[
                'body'=>'New Admin Login'
            ];
            Notification::send($userSchema,new AdminEventNotification($adminEvent));
            
            return redirect()->intended('dashboard');
        }
        elseif(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_admin'=>False])){
            //Authentication passed...
            $request->session()->regenerate();
            
            if(DB::table('users')->where('id',Auth::user()->id)->select('service_notif')->get()==TRUE && is_null(DB::table('users')->where('id',Auth::user()->id)->select('telegram_user_id')->get())==FALSE){
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d/m/Y h:i:s a',time());
                $userSchema = Auth::user();
                $userEvent = [
                    'body'=>'New login detected at '.$date.' IST'
                ];
                Notification::send($userSchema,new UserEventNotification($userEvent));
                Notification::send($userSchema,new AdminEventNotification($userEvent));
            }
            return redirect('movies/all');
        }
        return redirect('login')->with('message','Login Failed. Are you sure the combination is right?');
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
                $user->service_notif=True;
                $user->general_notif=True;
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
                $user->service_notif=True;
                $user->general_notif=False;
                $user->telegram_user_id=Null;
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

    public function profile(){
        return redirect('movies/all');
    }

    public function continueWatching(Request $request){
        $user_id=Auth::user()->id;
        $title_id=$request->input('watch_title_id');
        $ep_id=(null!= $request->input('watch_episode_id')) ? $request->input('watch_episode_id') : 1;
        // $ep_id=$request->input('watch_episode_id');
        $watch_time=$request->input('watch_time');//in seconds

        DB::table('continue_watching')->upsert([
            'user_id'=>$user_id,'title_id'=>$title_id,'webisode_id'=>$ep_id,'watchTime'=>$watch_time
        ],['user_id','title_id','webisode_id'],['watchTime']);
        return response()->json(['success'=>'Updated time in db']);
    }
    public function delContinueWatching(Request $request){
        $user_id=Auth::user()->id;
        $title_id=$request->input('watch_title_id');
        $ep_id=(null!= $request->input('watch_episode_id')) ? $request->input('watch_episode_id') : 1;
        DB::table('continue_watching')->where('user_id','=',$user_id)->where('title_id','=',$title_id)->where('webisode_id','=',$ep_id)->delete();
        return response()->json(['success'=>'Deleted title in db']);
    }
}

