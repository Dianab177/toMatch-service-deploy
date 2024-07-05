<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Http\Controllers\Controller;
use App\Models\Promotions;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'region_id' => 'required|integer',
            'name' => 'required',
            'iso' => 'required',

        ]);

        $province = new Province;
        $province->region_id = $request->region_id;
        $province->name = $request->name;
        $province->lat = $request->lat;
        $province->long = $request->long;
        $province->iso = $request->iso;
        $province->save();

        if ($province) {
            $data = [
                'message' => 'Province created successfully',
                'province' => $province
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to create province'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Province $province)
    {
        // return response()->json($provinces);
        if ($province) {
            $data = [
                'message' => 'Province details',
                'province' => $province
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error '], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Province $province)
    {
        $request->validate([
            'region_id' => 'required|integer',
            'name' => 'required',
            'iso' => 'required',

        ]);
        $province->region_id = $request->region_id;
        $province->name = $request->name;
        $province->lat = $request->lat;
        $province->long = $request->long;
        $province->iso = $request->iso;
        $province->save();

        if ($province) {
            $data = [
                'message' => 'Province updated successfully',
                'province' => $province
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to update province'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $province)
    {
        $province->delete();

        if ($province) {
            $data = [
                'message' => 'Province deleted successfully',
                'province' => $province
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to deleted province'], 500);
    }
}
