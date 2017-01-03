<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeaconController extends Controller
{
    public function store (Request $request, $floorId){

        DB::table('beacons')->insert([
            'floor_id' => $floorId,
            'name' => $request->input('beacon_name'),
            'latitude' => $request->input('beacon_lat'),
            'longitude' => $request->input('beacon_lng'),
            'minor_number' => $request->input('beacon_minor'),
            'bluetooth_address' => $request->input('bluetooth_address'),
        ]);

        return redirect()->back();
    }
    public function show (Request $request, $floorId){
        
        $floor = DB::table('floors')
            ->where('id', $floorId)
            ->get();
        $floor = json_decode($floor);

        $beacons = DB::table('beacons')
            ->where('floor_id', $floorId)
            ->get();
        $beacons = json_decode($beacons);

        return view('manage.beacons', ['floor' => $floor, 'floorId' => $floorId, 'beacons' => $beacons ]);
    }
}
