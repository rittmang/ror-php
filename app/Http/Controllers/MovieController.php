<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(){
        $upcoming_titles=explode(',',env('UPCOMING_TITLES'));
        $banner_titles=explode(',',env('BANNER_TITLES'));
        $upcoming_movielist=DB::table('title')->select('id','name','long_poster','age','duration')->whereIn('id',$upcoming_titles)->get();
        return view('movies/index',['upcoming_titles'=>$upcoming_movielist]);
    }
    public function allMovies(){
        $all_movielist=DB::table('title')->orderBy('id','asc')->select('id','name','long_poster','age','duration')->get();
        return view('movies/all',['titles'=>$all_movielist]);
    }
    public function gumnaami(){
        
        return view('movies/gumnaami')->with('views',0);
    }
    public function selectMovie($id){
        if(DB::table('title')->where('id',$id)->exists()){
            $title=DB::table('title')->where('id',$id)->first();
            $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json');
            $database=$factory->createDatabase();
            $count=$database->getReference("{$id}")->getValue();
            
            $data=$count+1;
            $ref=$database->getReference("{$id}")->set($data);
            return view('movies/player_page',['title'=>$title,'views'=>$count]);
        }
        return abort('404');
    }
    public function castMovie($id){
        if(DB::table('title')->where('id',$id)->exists()){
            $title=DB::table('title')->where('id',$id)->first();
            // $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json');
            // $database=$factory->createDatabase();
            // $count=$database->getReference("{$id}")->getValue();
            
            // $data=$count+1;
            // $ref=$database->getReference("{$id}")->set($data);
            return view('movies/cast_player',['title'=>$title,'views'=>0]);
        }
        return abort('404');
    }
}
