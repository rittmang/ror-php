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
Route::get('/',[MovieController::class,'index'])->middleware(['auth']);
Route::get('/all',[MovieController::class,'allMovies'])->middleware(['auth']);
Route::get('/tos',function(){
    return view('movies/tos');
});
// Route::get('/movies/the-social-dilemma',[FirebaseController::class,'index']);
// Route::post('/movies/the-social-dilemma',[FirebaseController::class,'change']);

Route::get('/test',[MovieController::class,'testMovie']);
Route::get('/{id}',[MovieController::class,'selectMovie'])->middleware(['auth'])->where('id','[0-9]+');
Route::get('/play/{id}',[MovieController::class,'playMovie'])->middleware(['auth'])->where('id','[0-9]+');
Route::get('/castplayer/{id}',[MovieController::class,'castMovie'])->middleware(['auth'])->where('id','[0-9]+');

Route::get('webseries',[WebisodeController::class,'index'])->middleware(['auth']);
Route::get('/webseries/{id}',[WebisodeController::class,'seriesDetails'])->middleware(['auth'])->where('id','[0-9]+');
Route::get('/webseries/{id}/{season}/{episode}',[WebisodeController::class,'selectWebisode'])->middleware(['auth'])->where(['id'=>'[0-9]+','season'=>'[0-9]+','episode'=>'[0-9]']);
Route::get('/webseries/castplayer/{id}/{season}/{episode}',[WebisodeController::class,'castWebisode'])->middleware(['auth'])->where(['id'=>'[0-9]+','season'=>'[0-9]+','episode'=>'[0-9]']);

Route::get('/profile',[LoginController::class,'profile'])->middleware(['auth']);
Route::post('/profile/continue-watching',[LoginController::class,'continueWatching'])->middleware(['auth']);
Route::delete('/profile/continue-watching',[LoginController::class,'delContinueWatching'])->middleware(['auth']);
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
