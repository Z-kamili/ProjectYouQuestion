<?php
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

Route::get('/', function () {
    return view('welcome');
});

//Routes
Route::get('/home','HomeController@home')->name('home')->middleware('auth');
Route::get('/index','HomeController@index')->name('index');
Route::get('/','HomeController@index')->name('index');
Route::get('/','HomeController@Question')->name('Question')->middleware('auth');
Route::get('/Signup','HomeController@Signup')->name('Signup');
Route::get('/Signin','HomeController@Signin')->name('Signin');
Route::resource('/posts','QuestionController')->middleware('auth');
Route::resource('/Forum','ForumController')->middleware('auth');
Route::resource('/Commentpost','commentaireController')->middleware('auth');
Route::resource('/Search','SearchController')->middleware('auth');
Route::resource('/Profils','ProfilsController')->middleware('auth');
Auth::routes();

