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

Route::group(['middleware' => ['web']], function() {

    Route::get('/', function () {
        return View::make('frontpage.frontpage');
    });

    Route::post('/register', [
        'uses' => 'Auth\RegisterController@postRegister',
        'as' => 'register'
    ]);

    Route::post('/login', [
        'uses' => 'Auth\LoginController@postLogin',
        'as' => 'login'
    ]);

});

Route::group(['middleware' => ['auth']], function() {

    Route::get('dashboard/', function () {
        return View::make('manage.dashboard');
    });

    Route::get('garages/', function () {
        return View::make('manage.garages');
    });

    Route::get('beacons/', function () {
        return View::make('manage.beacons');
    });

    Route::get('user/', function () {
        return View::make('manage.user');
    });

    Route::get('/logout', [
        'uses' => 'Auth\LoginController@getLogout',
        'as' => 'logout'
    ]);

    Route::post('/beacons-store', [
        'uses' => 'BeaconController@store',
        'as' => 'beacons-store'
    ]);

    //Route::post('storebeacon', 'BeaconController');

});
