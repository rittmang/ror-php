<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

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
})
Route::get('yenta',function(){
	return view('yenta');
})
Route::get('movies',function(){
    return view('movies/index');
});
Route::get('/movies/tos',function(){
    return view('movies/tos');
});
Route::get('/movies/the-social-dilemma',[FirebaseController::class,'index']);
Route::post('/movies/the-social-dilemma',[FirebaseController::class,'change']);
