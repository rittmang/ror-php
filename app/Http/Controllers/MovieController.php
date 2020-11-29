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
}
