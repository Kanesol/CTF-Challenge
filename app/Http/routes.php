<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', "DynamicController@index");

Route::get('contact', "GenericStaticController@contact" );

Route::get('scoreboard', 'ScoreboardController@scoreboard');

Route::get('flags/submit', 'FlagController@submit');
Route::post('flags', 'FlagController@store');

Route::get('challenges', 'DynamicController@challenges');

Route::get('api/get_start', function(){
	$results = DB::table('Games')->select('start')->first();
	return $results->start;
});

Route::get('api/get_finish', function(){
	$results = $results = DB::table('Games')->select('stop')->first();
	return $results->stop;
});

Route::get('countdown', function(){
	return view("pages.countdown");
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
//Route::get('password/email', 'Auth\PasswordController@getEmail');
//Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
//Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
//Route::post('password/reset', 'Auth\PasswordController@postReset');
