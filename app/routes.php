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

//Admin Control
Route::group(array('prefix' => 'admin', 'before' => 'admin'), function()
{
    Route::resource('users', 'admin\\UsersController');
    Route::resource('lans', 'admin\\LansController');
    Route::resource('tournaments', 'admin\\TournamentsController');
    Route::resource('seatingchart', 'admin\\SeatingChartsController');
    Route::post('seatingchart/store', array('uses' => 'admin\\SeatingChartsController@store'));

    Route::resource('news', 'admin\\NewsController');
    Route::resource('servers', 'admin\\ServersController');
});

/*Home:
    welcome
    dashboard - auth
    sponsors
*/
Route::get('/', array('uses' => 'HomeController@getWelcome'));
Route::get('/dashboard', array('uses' => 'HomeController@getDashboard'));
Route::get('/sponsors', array('uses' => 'HomeController@getSponsors'));

/*Users:
    login
    register
    logout
    profile
    settings - auth
*/
Route::get('/login', array('uses' => 'UsersController@getLogin'));
Route::post('/login', array('uses' => 'UsersController@postLogin'));
Route::get('/register', array('uses' => 'UsersController@getRegister'));
Route::post('/register', array('uses' => 'UsersController@postRegister'));
Route::get('/logout', array('uses' => 'UsersController@getLogout'));
Route::get('/settings', array('uses' => 'UsersController@getSettings'));
Route::any('/user/{username}', array('as' => 'user', 'uses' => 'UsersController@getProfile'));

/*Servers:
    index
    create - auth
    edit - auth
    delete - auth
    view
*/
Route::resource('servers', 'ServersController');

/*Tournaments:
    index
    edit - auth (for assigned tournament organizers)
    update - auth (for assigned tournament organizers)
*/
Route::resource('tournaments', 'TournamentsController', array('except' => array('create', 'store', 'destroy')));

/*SeatingChart:
    index
    sit - auth
    stand - auth
*/
Route::controller('seatingchart', 'SeatingChartsController');
Route::any('/seatingchart/{id}', array('as' => 'seatingchart', 'uses' => 'SeatingChart@getShow'));


/*Messages:
    postRegister - auth
    postMessage - auth
*/
Route::controller('messages', 'MessageController');
