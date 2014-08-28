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
Route::get('/register', array('uses' => 'UserController@getRegister'));
Route::post('/register', array('uses' => 'UserController@postRegister'));
Route::get('/logout', array('uses' => 'UserController@getLogout'));
Route::get('/settings', array('uses' => 'UserController@getSettings'));
Route::any('/user/{username}', array('as' => 'user', 'uses' => 'UserController@getProfile'));

Route::resource('users', 'UserController');

//Controller Routes
Route::controller('messages', 'MessageController');
Route::controller('news', 'NewsController');

//Admin Control
Route::group(array('prefix' => 'admin', 'before' => 'admin'), function()
{
    Route::resource('news', 'admin\\NewsController');
    Route::resource('servers', 'admin\\ServersController');

    //Route::get('/news', array('uses' => 'NewsController@getAdminIndex'));
    //Route::get('/news/post', array('uses' => 'NewsController@getAdminPost'));
});


Route::resource('news', 'NewsController');

//Generated
Route::resource('servers', 'ServersController');
Route::resource('tournaments', 'TournamentsController');


Route::resource('seating_charts', 'Seating_chartsController');

Route::resource('seatingcharts', 'SeatingchartsController');
