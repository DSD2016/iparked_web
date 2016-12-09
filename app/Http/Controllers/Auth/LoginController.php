<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;


class LoginController extends Controller {

    public function postLogin(Request $request) {

        // Get data from post request
        $email = $request['email'];
        $password = bcrypt($request['password']);

    }
}
