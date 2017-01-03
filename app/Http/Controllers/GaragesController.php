<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class GaragesController extends Controller
{
      /**
     * List the garages for the given user.
     */
    public function show(Request $request)
    {
        $userId =  Auth::id();

        $garages = DB::table('garages')
            ->where('user_id', $userId)
            ->get();
        $garages = json_decode($garages);
        
        return view('manage.garages', ['garages' => $garages]);
    }

    public function store (Request $request){

        $userId =  Auth::id();

        DB::table('garages')->insert([
            'user_id' => $userId,
            'name' => $request->input('garage_name'),
            'latitude' => $request->input('garage_lat'),
            'longitude' => $request->input('garage_lng'),
            'num_floors' => $request->input('garage_floors'),
            'garage_capacity' => $request->input('garage_cap'),
            'type' => $request->input('garage_type'),
            'UUID' => $request->input('garage_UUID'),
            'city' => $request->input('garage_city'),
            'garage_timestamp' => date("Y-m-d h:i:s", time()),
        ]);
        return redirect('garages/');
    }

}
