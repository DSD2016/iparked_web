<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeaconController extends Controller
{
    public function store (Request $request){
        DB::table('beacons')->insert([
            'floor_id' => 1,
            'name' => $request->input('beacon_name'),
            'latitude' => $request->input('beacon_lat'),
            'longitude' => $request->input('beacon_lng'),
            'minor_number' => $request->input('beacon_minor'),
            'bluetooth_adress' => 'A2:12:12:12:12:12',
        ]);

        return redirect()->back();
    }
}
