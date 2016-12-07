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
    return View::make('frontpage.frontpage');
});

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

Route::get('documentation/', function () {
    return View::make('documentation');
});
