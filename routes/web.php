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
})->name('homePage');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile', function(){
    return view('profile.index');
})->name('profile');

Route::get('/discussions', function(){
    return view('discussions.index');
});

Route::get('/each_disc', function(){
    return view('discussions.each');
});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('nerd', 'NerdController');

Route::get('/classmates', function(){
  return view('classmates.index');
});

Route::get('classmates', 'NerdController@index');

Route::get('destroy/{id}', ['uses'=>'NerdController@destroy', 'as'=>'destroy']);



Route::get('project_files', function(){
    return view('project_files.index');
})->name('projects');

//Route::resource('/posts', 'PostsController');

Route::resource('/post', 'PostsController');

Route::resource('add_post', 'EachController');



Route::get('each/{post_id}',['uses'=> 'PostsController@show', 'as'=>'each']);

Route::post('add_post/{post_id}', ['uses'=> 'EachController@store', 'as'=>'add_post']);

//Route::patch('add_post/{post_id}', 'PostsController@update')->name('add_post');

Route::get('larger_view/{id}', function($id){
    return view('discussions.larger_view', compact('id'));
});

Route::get('/markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
});

Route::get('/details/{id}', function($id){
    return view('classmates.details', compact('id'));
})->name('details');

Route::get('/settings', function(){
    return view('settings.index');
})->name('settings');

Route::resource('settings_panel', 'SettingsController');

Route::get('/verifyEmail', 'SettingsController@ajaxVerifyEmail');

Route::post('/updateEmail', 'SettingsController@updateEmailAddress');

Route::get('/ajax_verify', 'SettingsController@ajaxVerifyPassword');

Route::post('change_password', 'SettingsController@changePassword');

Route::get('/password_req', function(){
    return view('auth.passwords.email');
})->name('password_req');

