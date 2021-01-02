<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WebisodeController extends Controller
{
    public function index(){

    }
    public function seriesDetails($id){

    }
    public function selectWebisode($id,$season,$episode){
        if(DB::table('title')->where('id',$id)->where('type','Series')->exists()){
            if(DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode)->exists()){
                $ep=DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode)->first();
                $title=DB::table('title')->where('id',$id)->first();
                return view('movies/seriesplayer_page',['ep'=>$ep,'title'=>$title]);
            }
        }
        return abort('404');
    }
}
