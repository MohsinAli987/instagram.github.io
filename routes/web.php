<?php

use App\Mail\NewUserwelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::get('/email', function(){
        return new NewUserwelcomeMail;
});

Route::Post('follow/{user}' , 'FollowsController@FollowsStore');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'PostController@indexShowPost');
Route::get('/p/create', 'PostController@CreatePost');
Route::get('/p/{post}', 'PostController@PostShow');
Route::get('/p', 'PostController@StorePost');

Route::get('/profile/{user}','ProfileController@index');
Route::get('/profie/{user}/edit' , 'ProfileController@Edit');
Route::patch('profile/{user}' , 'ProfileController@UpdateProfile');
