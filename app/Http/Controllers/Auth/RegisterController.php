<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\User;


class RegisterController extends Controller {

    public function postRegister(Request $request) {

        // Get data from post request
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $email = $request['email'];
        $password = bcrypt($request['password']);

        // Save user to DB
        $user = new User();
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->password = $password;
        $user->activated = 0;
        $user->company = 'as';
        $user->save();

        Auth::login($user);

        return response()->json(array('registered'=>'true'), 200);
    }

}
