<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\User;


class LoginController extends Controller {

    public function postLogin(Request $request) {

        // Get data from post request
        $email = $request['email'];
        $password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return response()->json(array('loggedin'=>'true'), 200);
        }

        return response()->json(array('loggedin'=>'false'), 200);

    }

    public function getLogout() {
        Auth::logout();
        return response()->json(array('loggedout'=>'true'), 200);
    }
}
