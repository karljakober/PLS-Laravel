<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Base Pages
Route::get('/', array('uses' => 'HomeController@getWelcome'));
Route::get('/dashboard', array('uses' => 'HomeController@getDashboard'));

//Static Pages
Route::get('/sponsors', array('uses' => 'HomeController@getSponsors'));

//Outside of controller url Routes
Route::get('/login', array('uses' => 'UserController@getLogin'));
Route::post('/login', array('uses' => 'UserController@postLogin'));
Route::get('/logout', array('uses' => 'UserController@getLogout'));
Route::get('/settings', array('uses' => 'UserController@getSettings'));
Route::any('/user/{username}', array('as' => 'user', 'uses' => 'UserController@getProfile'));

//Controller Routes
Route::controller('messages', 'MessageController');
Route::controller('tournaments', 'TournamentController');
Route::controller('servers', 'ServerController');
Route::controller('news', 'NewsController');
Route::controller('seating', 'SeatingController');

//Admin Control
Route::group(array('prefix' => 'admin', 'before' => 'admin'), function()
{
    Route::get('/news', array('uses' => 'NewsController@getAdminIndex'));
    Route::get('/news/post', array('uses' => 'NewsController@getAdminPost'));
});
