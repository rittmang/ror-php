<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;




class dashboardController extends Controller
{
    public function index(){
        
        $titles=DB::table('title')->get(['id','name','year','type','genre']);
        return view('dashboard/index',['titles'=>$titles]);
    }
}
