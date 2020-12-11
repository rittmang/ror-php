<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(){
        $upcoming_titles=array(1,2);
        $upcoming_movielist=DB::table('title')->select('id','name','long_poster','age','duration')->whereIn('id',$upcoming_titles)->get();
        return view('movies/index',['upcoming_titles'=>$upcoming_movielist]);
    }
    public function gumnaami(){
        
        return view('movies/gumnaami')->with('views',0);
    }
    public function selectMovie($id){
        if(DB::table('title')->where('id',$id)->exists()){
            $title=DB::table('title')->where('id',$id)->first();
            $views=0;
            return view('movies/player_page',['title'=>$title,'views'=>$views]);
        }
        return abort('404');
    }
}
