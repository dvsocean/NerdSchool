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

use App\Nerdserver;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
})->name('homePage');

Route::get('/home', 'HomeController@index');


//PROFILE
Route::get('/profile', function(){
    return view('profile.index');
})->name('profile');
//PROFILE



//AUTH
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//AUTH



// POSTS or DISCUSSIONS
Route::get('/discussions', function(){
    return view('discussions.index');
});

Route::resource('/posts', 'PostsController');

Route::post('dz_posts', 'PostsController@dropzone_uploads')->name('drop_post');

Route::get('/dz_posts', 'PostsController@dropzone_uploads');

Route::get('/posts', function(){
    return view('discussions.index');
});

Route::get('each/{post_id}',['uses'=> 'PostsController@show', 'as'=>'each']);

Route::get('/each_disc', function(){
    return view('discussions.each');
});

Route::resource('add_post', 'EachController');

Route::post('add_post/{post_id}', ['uses'=> 'EachController@store', 'as'=>'add_post']);

Route::get('larger_view/{id}', function($id){
    return view('discussions.larger_view', compact('id'));
});
// POSTS or DISCUSSIONS




//MARK NOTIFICATION AS READ
Route::get('/markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
});
//MARK NOTIFICATION AS READ



//CLASSMATES PAGE
Route::get('destroy/{id}', ['uses'=>'NerdController@destroy', 'as'=>'destroy']);

Route::resource('nerd', 'NerdController');

Route::get('/classmates', function(){
    return view('classmates.index');
});

Route::get('classmates', 'NerdController@index');

Route::get('/details/{id}', function($id){
    return view('classmates.details', compact('id'));
})->name('details');
//CLASSMATES PAGE




//SETTINGS PAGE
Route::get('/settings', function(){
    return view('settings.index');
})->name('settings');

Route::resource('settings_panel', 'SettingsController');

Route::get('/verifyEmail', 'SettingsController@ajaxVerifyEmail');

Route::post('/updateEmail', 'SettingsController@updateEmailAddress');

Route::get('/ajax_verify', 'SettingsController@ajaxVerifyPassword');

Route::post('change_password', 'SettingsController@changePassword');
//SETTINGS PAGE




//SEND PASSWORD RESET LINK
Route::get('/password_req', function(){
    return view('auth.passwords.email');
})->name('password_req');
//SEND PASSWORD RESET LINK



//GO LIVE
Route::get('/live', function(){
    return view('go_live.go_live');
});

Route::get('/verify', function(){
    return view('go_live.verify');
});

Route::post('/accept_terms', 'NerdController@verify_nerd');


Route::post('/server', 'NerdController@upload');

Route::get('/nerdserver', function(){
    return view('nerdserver.nerdserver');
});

Route::get('delete_from_nerd_server/{id}', 'NerdController@delete_from_nerd_server');
//GO LIVE



//ADMIN-REVIEW FILES
Route::get('/review', function(){
    return view('nerdserver.review_user_files');
});

Route::get('/reviewed/{id}', function($id){
    $record= Review::find($id);
    $record->delete();
    return redirect('/review');
});

Route::get('/future_files/{user_id}', function($user_id){
    $input['reviewed']= 'yes';
    $user= User::findOrFail($user_id);
    $user->update($input);
    Session::flash('allow_message', 'You have allowed "'. ucfirst($user->name) .'" to upload future files.');
    return redirect('/review');
});

Route::get('/reject/{id}', function($id){
    $review= Review::find($id);
    $ns= Nerdserver::find($id);
    $review->delete();
    $ns->delete();
    unlink($review->user->nerd_directory .'/'. $review->file);
    Session::flash('reject_message', 'You have deleted "'. $ns->file .'" from the database permanently');
    return redirect('/review');
});
//ADMIN-REVIEW FILES

//SHARED SERVER BETWEEN NERDS
Route::get('/view_files/{id}', function($id){
    return view('classmates.shared_server', compact('id'));
});
//SHARED SERVER BETWEEN NERDS

//NEW DISCUSSION
Route::get('/new_discussion', function(){
    return view('discussions.new_discussion');
});
//NEW DISCUSSION

//CONTACT PAGE
Route::get('/contact', function(){
    return view('contact.contact');
});
//CONTACT PAGE

//FOR POSTMAN
Route::get('/api/{id}', function($id){
   return User::find($id);
});