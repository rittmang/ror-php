<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

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
                $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json');
                $database=$factory->createDatabase();
                $count=$database->getReference("{$id}/S{$season}/E{$episode}")->getValue();
                $data=$count+1;
                $ref=$database->getReference("{$id}/S{$season}/E{$episode}")->set($data);
                
                if(empty($count)){
                    $count=0;
                }
                $next_ep=null;
                if(DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode+1)->exists()){
                    $next_ep=DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode+1)->first();
                }
                if(DB::table('webisodes')->where('title_id',$id)->where('season',$season+1)->where('episode',1)->exists()){
                    $next_ep=DB::table('webisodes')->where('title_id',$id)->where('season',$season+1)->where('episode',1)->first();
                }
                
                return view('movies/seriesplayer_page',['ep'=>$ep,'next_ep'=>$next_ep,'title'=>$title,'views'=>$count]);
            }
        }
        return abort('404');
    }
    public function castWebisode($id,$season,$episode){
        if(DB::table('title')->where('id',$id)->where('type','Series')->exists()){
            if(DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode)->exists()){
                $ep=DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode)->first();
                $title=DB::table('title')->where('id',$id)->first();
                $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json');
                $database=$factory->createDatabase();
                $count=$database->getReference("{$id}/S{$season}/E{$episode}")->getValue();
                $data=$count+1;
                $ref=$database->getReference("{$id}/S{$season}/E{$episode}")->set($data);
                
                if(empty($count)){
                    $count=0;
                }
                $next_ep=null;
                if(DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode+1)->exists()){
                    $next_ep=DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode+1)->first();
                }
                if(DB::table('webisodes')->where('title_id',$id)->where('season',$season+1)->where('episode',1)->exists()){
                    $next_ep=DB::table('webisodes')->where('title_id',$id)->where('season',$season+1)->where('episode',1)->first();
                }
                
                return view('movies/seriescast_player',['ep'=>$ep,'next_ep'=>$next_ep,'title'=>$title,'views'=>0]);
            }
        }
        return abort('404');
    }
}
