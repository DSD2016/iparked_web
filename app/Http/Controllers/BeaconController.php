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

        $beacon = DB::table('beacons')
            ->where([
                        ['floor_id', '=', $floorId],
                        ['minor_number', '=', $request->input('beacon_minor')],
                    ])
            ->first();
        $floor = DB::table('floors')
            ->where('id', '=', $floorId)
            ->first();

        DB::table('floors')
            ->where('id', '=', $floorId)
            ->update(['floor_timestamp' => date("Y-m-d h:i:s", time())]);

        DB::table('garages')
            ->where('id', '=', $floor->garage_id)
            ->update(['garage_timestamp' => date("Y-m-d h:i:s", time())]);

        return response()->json(['result' => 'Success','beacon' => $beacon]);
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

    public function remove (Request $request, $beaconId){

        $beacon = DB::table('beacons')
            ->where('id', '=', $beaconId)
            ->first();

        $floor = DB::table('floors')
            ->where('id', '=', $beacon->floor_id)
            ->first();

        DB::table('floors')
            ->where('id', '=', $beacon->floor_id)
            ->update(['floor_timestamp' => date("Y-m-d h:i:s", time())]);

        DB::table('garages')
            ->where('id', '=', $floor->garage_id)
            ->update(['garage_timestamp' => date("Y-m-d h:i:s", time())]);

        DB::table('beacons')->where('id', $beaconId)->delete();

        return response()->json(['result' => 'Success']);
    }
}
