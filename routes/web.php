<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile', function(){
    return view('profile.index');
});

Route::get('/discussions', function(){
    return view('discussions.index');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('nerd', 'NerdController');

Route::get('/classmates', function(){
  return view('classmates.index');
});

Route::get('classmates', 'NerdController@index');

Route::get('destroy/{id}', ['uses'=>'NerdController@destroy', 'as'=>'destroy']);
