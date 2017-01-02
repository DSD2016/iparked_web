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
        ]);

        $floor = DB::table('floors')
            ->where([
                        ['garage_id', '=', $garageId],
                        ['major_number', '=', $request->input('floor_major')],
                    ])
            ->first();

        return response()->json(['floorId' => $floor->id]);
    }
}
