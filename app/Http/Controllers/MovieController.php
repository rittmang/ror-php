<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(){
        return view('movies/index');
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
