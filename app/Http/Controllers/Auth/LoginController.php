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
            return response()->json(array('loggedin'=>'true', 'email'=>$email, 'password'=>$password), 200);
        }

        return response()->json(array('loggedin'=>'false', 'email'=>$email, 'password'=>$password), 200);

    }
}
