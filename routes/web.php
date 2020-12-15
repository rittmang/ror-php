<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\dashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('store',function(){
    return view('store');
});
Route::get('writing',function(){
	return view('writing');
});
Route::get('yenta',function(){
	return view('yenta');
});
Route::get('movies',[MovieController::class,'index']);
Route::get('/movies/all',[MovieController::class,'allMovies']);
Route::get('/movies/tos',function(){
    return view('movies/tos');
});
Route::get('/movies/the-social-dilemma',[FirebaseController::class,'index']);
Route::post('/movies/the-social-dilemma',[FirebaseController::class,'change']);

Route::get('/movies/gumnaami',[MovieController::class,'gumnaami']);

Route::get('/movies/{id}',[MovieController::class,'selectMovie']);
Route::get('/movies/newplayer/{id}',[MovieController::class,'selectMovieVJS']);

//---------------------------------

Route::get('login',function(){
    return view('login');
})->name('login');
Route::post('login',[LoginController::class,'authenticate']);
//---------------------------------
Route::get('register',function(){
    return view('register');
});
Route::post('register',[LoginController::class,'register']);
//----------------------------------
Route::get('logout',[LoginController::class,'logout']);
//----------------------------------
Route::get('dashboard',[dashboardController::class,'index'])->middleware('auth');
