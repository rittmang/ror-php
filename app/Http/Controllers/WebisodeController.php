<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(DB::table('title')->where('id',$id)->where('type','Series')->exists()){
            $webisodes=DB::table('webisodes')->where('title_id',$id)->orderBy('season','asc')->orderBy('episode','asc')->select('season','episode','wide_poster','ep_name','asset','duration')->get();
            $title=DB::table('title')->where('id',$id)->select('id','name','age','year','lang','genre','description','wide_poster','trailer_link')->first();
            $title->wide_poster = $this->fixBrokenUrls($title->wide_poster, 'IMAGE_ORIGIN');
            $max_season=DB::table('webisodes')->where('title_id',$id)->max('season');
            foreach($webisodes as $ep){
                $ep->wide_poster = $this->fixBrokenUrls($ep->wide_poster, 'IMAGE_ORIGIN');
            }
            return view('movies/series',['title'=>$title,'webisodes'=>$webisodes,'max_season'=>$max_season]);
        }
        return abort('404');
    }
    public function selectWebisode($id,$season,$episode){
        if(DB::table('title')->where('id',$id)->where('type','Series')->exists()){
            if(DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode)->exists()){
                $ep=DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode)->first();
                $ep->wide_poster = $this->fixBrokenUrls($ep->wide_poster, 'IMAGE_ORIGIN');
                $ep->vtt = $this->fixBrokenUrls($ep->vtt, 'IMAGE_ORIGIN');
                $title=DB::table('title')->where('id',$id)->first();
                $title->long_poster = $this->fixBrokenUrls($title->long_poster, 'IMAGE_ORIGIN');
                $ep->asset = $this->fixBrokenUrls($ep->asset, 'VIDEO_ORIGIN');

                $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json')->withDatabaseUri(config('movie.firebase'));
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
                else if(DB::table('webisodes')->where('title_id',$id)->where('season',$season+1)->where('episode',1)->exists()){
                    $next_ep=DB::table('webisodes')->where('title_id',$id)->where('season',$season+1)->where('episode',1)->first();
                }
                $epLastWatched=DB::table('continue_watching')->where('user_id',Auth::user()->id)->where('title_id',$title->id)->where('webisode_id',$ep->id)->select('watchTime')->first();
                $lastWatched = isset($epLastWatched) ? $epLastWatched->watchTime : 0;
                
                return view('movies/seriesplayer_page',['ep'=>$ep,'next_ep'=>$next_ep,'title'=>$title,'views'=>$count,'lastWatched'=>$lastWatched]);
            }
        }
        return abort('404');
    }
    public function castWebisode($id,$season,$episode){
        if(DB::table('title')->where('id',$id)->where('type','Series')->exists()){
            if(DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode)->exists()){
                $ep=DB::table('webisodes')->where('title_id',$id)->where('season',$season)->where('episode',$episode)->first();
                $ep->wide_poster = $this->fixBrokenUrls($ep->wide_poster, 'IMAGE_ORIGIN');
                $ep->vtt = $this->fixBrokenUrls($ep->vtt, 'IMAGE_ORIGIN');
                $ep->asset = $this->fixBrokenUrls($ep->asset, 'VIDEO_ORIGIN');

                $title=DB::table('title')->where('id',$id)->first();
                $title=DB::table('title')->where('id',$id)->first();
                $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json')->withDatabaseUri(config('movie.firebase'));
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
