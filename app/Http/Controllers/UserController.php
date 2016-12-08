<?php namespace App\Http\Controllers;

class UserController extends Controller {

    public function getDashboard()
    {
        return view('manage.dashboard');
    }

    public function getGarages()
    {
        return view('manage.garages');
    }

    public function getBeacons()
    {
        return view('manage.beacons');
    }

    public function getUser()
    {
        return view('manage.user');
    }
}
