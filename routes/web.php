<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
// Route::get('/profile/{username}','ProfileController@profile');//route parameters{/profile/{username}}
Route::get('myArticles','ProfileController@myArticles');
Route::get('prof','ProfileController@profile')->middleware('authenticated');
Route::group(['middleware' => 'authenticated'],function(){
	Route::resource('profile','UsersController');
	Route::resource('articles','ArticlesController');
	Route::resource('settings','UserSettingsController');
	Route::resource('comments','UserCommentController');
	Route::resource('reply','UserReplyController');
});
Route::post('delete','UserCommentController@delete');
// colin de carlo eloquent
// Route::post('com','ListController@createComment');uu