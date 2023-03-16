<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AdminEventNotification;

class MovieController extends Controller
{
    public function fixBrokenUrls($url){
        if(!parse_url($url,PHP_URL_HOST)){
            $url = env('IMAGE_ORIGIN') . $url;
        }
        else{
            $host = strtolower(parse_url($url,PHP_URL_HOST)) . '/';
            $url = str_ireplace('https://' . $host,env('IMAGE_ORIGIN'),$url);
        }
        return $url;
    }
    public function index(){
        
        $banner_titles = explode(',',config('movie.banner_titles'));        
        $banner_movielist=DB::table('title')->orderBy('id','desc')->select('id','name','type','wide_poster','age','duration','description','trailer_link','year','genre','lang')->whereIn('id',$banner_titles)->get();
        foreach($banner_movielist as $btitle)
        {
            if($btitle->type=='Series'){
                $m_season=DB::table('webisodes')->where('title_id',$btitle->id)->max('season');
                $btitle->max_season=$m_season;
            }
            $btitle->wide_poster = $this->fixBrokenUrls($btitle->wide_poster);
            // error_log($this->fixBrokenUrls($btitle->wide_poster));
        }
        $continue_watchlist=DB::table('continue_watching')->join('title','continue_watching.title_id','=','title.id')->where('user_id',Auth::user()->id)->orderBy('watchTime','desc')->select('continue_watching.title_id','continue_watching.webisode_id','title.name','title.wide_poster','continue_watching.watchTime','title.duration','title.type')->get();
        foreach($continue_watchlist as $cw_item){
            if($cw_item->type=='Series'){
                $webisode_deets=DB::table('webisodes')->where('id',$cw_item->webisode_id)->get()[0];
                $cw_item->name="S".$webisode_deets->season."E".$webisode_deets->episode." | ".$cw_item->name;
                $cw_item->wide_poster=$webisode_deets->wide_poster;
                $cw_item->duration=$webisode_deets->duration;
                $cw_item->link="/webseries/".$webisode_deets->title_id."/".$webisode_deets->season."/".$webisode_deets->episode;
                $cw_item->cast_link="/webseries/castplayer/".$webisode_deets->title_id."/".$webisode_deets->season."/".$webisode_deets->episode;
            }
            elseif($cw_item->type=='Movie'){
                $cw_item->link="/play/".$cw_item->title_id;
                $cw_item->cast_link="/castplayer/".$cw_item->title_id;
            }
        }
        ;
        $upcoming_movielist=DB::table('title')->orderBy('id','desc')->where('type','Movie')->select('name','long_poster')->where('asset','/')->get();
        $disney_movielist=DB::table('title')->orderBy('id','desc')->where('studio','Disney')->where('asset','!=','/')->select('id','name','long_poster','age','duration')->get();
        $pixar_movielist=DB::table('title')->orderBy('id','desc')->where('studio','Pixar')->where('asset','!=','/')->select('id','name','long_poster','age','duration')->get();
        $tcs_movielist=DB::table('title')->orderBy('id','desc')->where('studio','20th Century Studios')->where('asset','!=','/')->select('id','name','long_poster','age','duration')->get();
        $svf_movielist=DB::table('title')->orderBy('id','desc')->where('studio','SVF')->where('asset','!=','/')->select('id','name','long_poster','age','duration')->get();
        $marvel_movielist=DB::table('title')->orderBy('id','desc')->where('studio','Marvel')->where('asset','!=','/')->select('id','name','long_poster','age','duration')->get();
        return view('movies/index',['upcoming_titles'=>$upcoming_movielist,'banner_titles'=>$banner_movielist,'continue_watchlist'=>$continue_watchlist,'disney_titles'=>$disney_movielist,'pixar_titles'=>$pixar_movielist,'tcs_titles'=>$tcs_movielist,'marvel_titles'=>$marvel_movielist,'svf_titles'=>$svf_movielist]);
    }
    public function allMovies(){
        $all_movielist=DB::table('title')->orderBy('id','asc')->where('asset','!=','/')->orWhere('type','Series')->select('id','name','type','long_poster','age','duration','asset')->get();
        return view('movies/all',['titles'=>$all_movielist]);
    }
    public function selectMovie($id){
        if(DB::table('title')->where('id',$id)->where('type','Movie')->exists()){
            $title=DB::table('title')->where('id',$id)->select('id','name','age','year','lang','genre','description','wide_poster','trailer_link','asset','duration')->first();
            $lastWatched=0;
            if(Auth::check()){
                $titleLastWatched=DB::table('continue_watching')->where('user_id',Auth::user()->id)->where('title_id',$title->id)->select('watchTime')->first();
                $lastWatched = isset($titleLastWatched) ? $titleLastWatched->watchTime : 0;
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d/m/Y h:i:s a',time());
                $userSchema = Auth::user();
                $adminEvent=[
                    'body'=>$title->name.' visited at '.$date.' IST'
                ];
                Notification::send($userSchema,new AdminEventNotification($adminEvent));
            }
            return view('movies/movie',['title'=>$title,'lastWatched'=>$lastWatched]);
        }
        return abort('404');
    }
    
    public function playMovie($id){
        if(DB::table('title')->where('id',$id)->exists()){
            $title=DB::table('title')->where('id',$id)->first();
            //update firebase count
            $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json')->withDatabaseUri(config('movie.firebase'));
            $database=$factory->createDatabase();
            $count=$database->getReference("{$id}")->getValue();
            
            $data=$count+1;
            $ref=$database->getReference("{$id}")->set($data);

            //retrieve continue-watching time, if exists else 0
            $titleLastWatched=DB::table('continue_watching')->where('user_id',Auth::user()->id)->where('title_id',$title->id)->select('watchTime')->first();
            $lastWatched = isset($titleLastWatched) ? $titleLastWatched->watchTime : 0;
            date_default_timezone_set('Asia/Kolkata');
            $date = date('d/m/Y h:i:s a',time());
            $userSchema = Auth::user();
            $adminEvent=[
                'body'=>$title->name.' played at '.$date.' IST'
            ];
            Notification::send($userSchema,new AdminEventNotification($adminEvent));
            return view('movies/player_page',['title'=>$title,'views'=>$count,'lastWatched'=>$lastWatched]);
        }
        return abort('404');
    }
    public function castMovie($id){
        if(DB::table('title')->where('id',$id)->exists()){
            $title=DB::table('title')->where('id',$id)->first();
            $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json')->withDatabaseUri(config('movie.firebase'));
            $database=$factory->createDatabase();
            $count=$database->getReference("{$id}")->getValue();
            
            $data=$count+1;
            $ref=$database->getReference("{$id}")->set($data);

            $titleLastWatched=DB::table('continue_watching')->where('user_id',Auth::user()->id)->where('title_id',$title->id)->select('watchTime')->first();
            $lastWatched = isset($titleLastWatched) ? $titleLastWatched->watchTime : 0;
            date_default_timezone_set('Asia/Kolkata');
            $date = date('d/m/Y h:i:s a',time());
            $userSchema = Auth::user();
            $adminEvent=[
                'body'=>$title->name.' casted at '.$date.' IST'
            ];
            Notification::send($userSchema,new AdminEventNotification($adminEvent));
            return view('movies/cast_player',['title'=>$title,'views'=>$count,'lastWatched'=>$lastWatched]);
        }
        return abort('404');
    }
    public function testMovie(){
        return view('movies/test',['title'=>'Elephants Dream','views'=>0]);
    }
}
