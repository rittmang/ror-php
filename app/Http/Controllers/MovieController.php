<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MovieController extends Controller
{
    public function gumnaami(){
        
        return view('movies/gumnaami')->with('views',0);
    }
}
