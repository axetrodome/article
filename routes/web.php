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
Route::get('prof','ProfileController@profile')->middleware('authenticated');
Route::post('prof','ProfileController@update_avatar')->middleware('authenticated');
Route::resource('profile','UsersController');
Route::resource('articles','ArticlesController');
