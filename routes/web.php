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

    Route::get('garages/', 'GaragesController@show');

    Route::get('addGarage/', function () {
        return View::make('manage.addGarage');
    });

    Route::post('/garage-store', [
        'uses' => 'GaragesController@store',
        'as' => 'garage-store'
    ]);

    Route::get('floors/{garageId}', 'FloorsController@show');

    Route::get('addFloor/{garageId}', function ($garageId) {
        return view('manage.addFloor',['garageId' => $garageId ]);
    });
    Route::post('/floor-store/{garageId}', [
        'uses' => 'FloorsController@store',
        'as' => 'floor-store'
    ]);

    Route::get('beacons/{floorId}', 'BeaconController@show');

    Route::post('/beacons-store/{floorId}', [
        'uses' => 'BeaconController@store',
        'as' => 'beacons-store'
    ]);

    Route::get('user/', function () {
        return View::make('manage.user');
    });

    Route::get('/logout', [
        'uses' => 'Auth\LoginController@getLogout',
        'as' => 'logout'
    ]);

});
