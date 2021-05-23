<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WebisodeController;
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
Route::get('resume',function(){
	return view('resume');
});
Route::get('movies',[MovieController::class,'index'])->middleware(['auth']);
Route::get('/movies/all',[MovieController::class,'allMovies'])->middleware(['auth']);
Route::get('/movies/tos',function(){
    return view('movies/tos');
});
// Route::get('/movies/the-social-dilemma',[FirebaseController::class,'index']);
// Route::post('/movies/the-social-dilemma',[FirebaseController::class,'change']);

Route::get('/movies/test',[MovieController::class,'testMovie']);
Route::get('/movies/{id}',[MovieController::class,'selectMovie'])->middleware(['auth']);
Route::get('/movies/castplayer/{id}',[MovieController::class,'castMovie'])->middleware(['auth']);

Route::get('webseries',[WebisodeController::class,'index'])->middleware(['auth']);
Route::get('/webseries/{id}',[WebisodeController::class,'seriesDetails'])->middleware(['auth']);
Route::get('/webseries/{id}/{season}/{episode}',[WebisodeController::class,'selectWebisode'])->middleware(['auth']);
Route::get('/webseries/castplayer/{id}/{season}/{episode}',[WebisodeController::class,'castWebisode'])->middleware(['auth']);

//---------------------------------

Route::get('login',function(){
    return view('login');
})->name('login');
Route::post('login',[LoginController::class,'authenticate']);
//---------------------------------
Route::get('register',function(){
    return view('register');
})->name('register');
Route::post('register',[LoginController::class,'register']);
//----------------------------------
Route::get('logout',[LoginController::class,'logout'])->name('logout');
//----------------------------------
Route::get('dashboard',[dashboardController::class,'index'])->middleware(['auth','admin']);
Route::get('dashboard/titles',[dashboardController::class,'titlesIndex'])->middleware(['auth','admin']);
Route::delete('dashboard/titlesDelete',[dashboardController::class,'titlesDelete'])->middleware(['auth','admin']);
Route::post('dashboard/titles',[dashboardController::class,'titlesInsert'])->middleware(['auth','admin']);
Route::post('dashboard/titlesUpdate',[dashboardController::class,'titlesUpdate'])->middleware(['auth','admin']);
Route::get('dashboard/syncViews',[dashboardController::class,'syncViews'])->middleware(['auth','admin']);
Route::get('dashboard/syncSearchIndex',[dashboardController::class,'syncSearchIndex'])->middleware(['auth','admin']);

Route::get('dashboard/webisodes',[dashboardController::class,'webisodesIndex'])->middleware(['auth','admin']);
Route::delete('dashboard/webisodesDelete',[dashboardController::class,'webisodesDelete'])->middleware(['auth','admin']);
Route::post('dashboard/webisodes',[dashboardController::class,'webisodesInsert'])->middleware(['auth','admin']);
Route::post('dashboard/webisodesUpdate',[dashboardController::class,'webisodesUpdate'])->middleware(['auth','admin']);
//Route::delete('dashboard/packagesDeleteAll','Admin\dashboardController@packagesDeleteAll')->middleware('auth');
