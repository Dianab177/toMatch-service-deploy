<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return response()->json($regions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'iso' => 'required',

        ]);

        $region = new Region();
        $region->name = $request->name;
        $region->lat = $request->lat;
        $region->long = $request->long;
        $region->iso = $request->iso;
        $region->save();

        if ($region) {
            $data = [
                'message' => 'Region created successfully',
                'region' => $region
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to create region'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        // return response()->json($region);

        if ($region) {
            $data = [
                'message' => 'Region details',
                'region' => $region
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error'], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'name' => 'required',
            'iso' => 'required',

        ]);
        $region->name = $request->name;
        $region->lat = $request->lat;
        $region->long = $request->long;
        $region->iso = $request->iso;
        $region->save();

        if ($region) {
            $data = [
                'message' => 'Region updated successfully',
                'region' => $region
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to update region'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();

        if ($region) {
            $data = [
                'message' => 'Region deleted successfully',
                'region' => $region
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to delete region'], 500);
    }
}
