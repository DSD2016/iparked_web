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

Route::get('dashboard/', function () {
    return View::make('dashboard');
});

Route::get('garages/', function () {
    return View::make('garages');
});

Route::get('beacons/', function () {
    return View::make('beacons');
});

Route::get('user/', function () {
    return View::make('user');
});

Route::get('documentation/', function () {
    return View::make('documentation');
});
