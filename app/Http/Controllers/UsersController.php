<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class UsersController extends Controller {

    public function update(Request $request) {

        $userId =  Auth::id();
        $newMail = $request['new_password'];
        var_dump($request);
        //$userObj = DB::table('users')->where('id', $userId)->update(['email' => $newMail]);
        //return redirect('user');

    }

    public function delete(Request $request) {

        $userId =  Auth::id();
        // TODO Crash because there is no cascade in migration
        DB::table('users')->where('id', '=', $userId)->delete();
        Auth::logout();
        return redirect('/');

    }
}
