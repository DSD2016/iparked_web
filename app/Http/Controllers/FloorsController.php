<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FloorsController extends Controller
{
    /**
     * List the floors for the given garage.
     */
    public function show(Request $request, $garageId)
    {

        $floors = DB::table('floors')
            ->where('garage_id', $garageId)
            ->get();
        $floors = json_decode($floors);
        
        return view('manage.floors', ['floors' => $floors, 'garageId' => $garageId ]);
    }

    public function store (Request $request, $garageId){

        DB::table('floors')->insert([
            'garage_id' => $garageId,
            'name' => $request->input('floor_name'),
            'latitude' => $request->input('floor_lat'),
            'longitude' => $request->input('floor_lng'),
            'floor_capacity' => $request->input('floor_cap'),
            'major_number' => $request->input('floor_major'),
            'angle' => $request->input('angle'),
            'size_X' => $request->input('size_X'),
            'size_Y' => $request->input('size_Y'),
            'zoom_level' => $request->input('zoom_level'),
            'floor_plan' => $request->input('floor_plan'),
            'floor_timestamp' => date("Y-m-d h:i:s", time()),
            'latitude1' => $request->input('latitude1'),
            'longitude1' => $request->input('longitude1'),
            'latitude2' => $request->input('latitude2'),
            'longitude2' => $request->input('longitude2'),
            'latitude3' => $request->input('latitude3'),
            'longitude3' => $request->input('longitude3'),
            'latitude4' => $request->input('latitude4'),
            'longitude4' => $request->input('longitude4'),
            'floor_number' => $request->input('floor_number'),
        ]);

        $floor = DB::table('floors')
            ->where([
                        ['garage_id', '=', $garageId],
                        ['major_number', '=', $request->input('floor_major')],
                    ])
            ->first();

        return response()->json(['floorId' => $floor->id]);
    }

    public function update (Request $request, $floorId){

        DB::table('floors')
            ->where('id', $floorId)
            ->update([
            'name' => $request->input('floor_name'),
            'latitude' => $request->input('floor_lat'),
            'longitude' => $request->input('floor_lng'),
            'floor_capacity' => $request->input('floor_cap'),
            'major_number' => $request->input('floor_major'),
            'angle' => $request->input('angle'),
            'size_X' => $request->input('size_X'),
            'size_Y' => $request->input('size_Y'),
            'zoom_level' => $request->input('zoom_level'),
            'floor_timestamp' => date("Y-m-d h:i:s", time()),
            'latitude1' => $request->input('latitude1'),
            'longitude1' => $request->input('longitude1'),
            'latitude2' => $request->input('latitude2'),
            'longitude2' => $request->input('longitude2'),
            'latitude3' => $request->input('latitude3'),
            'longitude3' => $request->input('longitude3'),
            'latitude4' => $request->input('latitude4'),
            'longitude4' => $request->input('longitude4'),
            'floor_number' => $request->input('floor_number'),
        ]);

        return response()->json(['floorId' => $floorId]);
    }

    public function edit(Request $request, $floorId)
    {

        $floor = DB::table('floors')
            ->where('id', $floorId)
            ->first();

        return view('manage.editFloor', ['floor' => $floor]);
    }

     public function remove (Request $request, $floorId){


        DB::table('beacons')->where('floor_id',$floorId)->delete();
        DB::table('floors')->where('id', $floorId)->delete();
    

        return response()->json(['floorId' => $floorId]);
    }
}
