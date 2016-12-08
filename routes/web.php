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

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function()
{
    $u = 'user.';

    Route::get('dashboard/', ['as' => $u . 'dashboard', 'uses' => 'UserController@getDashboard']);
    Route::get('garages/', ['as' => $u . 'garages', 'uses' => 'UserController@getGarages']);
    Route::get('beacons/', ['as' => $u . 'beacons', 'uses' => 'UserController@getBeacons']);
    Route::get('user/', ['as' => $u . 'user', 'uses' => 'UserController@getUser']);
/*
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
*/
});

$s = 'social.';
Route::get('/social/redirect/{provider}', ['as' => $s . 'redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}', ['as' => $s . 'handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

Auth::routes(['login' => 'auth.login']);
