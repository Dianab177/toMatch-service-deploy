<?php

namespace App\Http\Controllers;

use App\Models\Coder;
use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use Illuminate\Http\Request;

class CoderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coders = Coder::all();
        return response()->json($coders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'promo_id' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'phone' => 'required'

        ]);

        $coder=new Coder;
        $coder->event_id=$request->event_id;
        $coder->promo_id=$request->promo_id;
        $coder->name=$request->name;
        $coder->lastname=$request->lastname;
        $coder->gender=$request->gender;
        $coder->years=$request->years;
        $coder->avaliability=$request->avaliability;
        $coder->remote=$request->remote;
        $coder->email=$request->email;
        $coder->phone=$request->phone;
        $coder->linkedin=$request->linkedin;
        $coder->github=$request->github;
        $coder->profile=$request->profile;

        $coder->save();

        if ($coder) {
            $data = [
                'message' => 'Coder created successfully',
                'coders' => $coder
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to create Coder'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coder $coder)
    {

        if ($coder) {
            $data = [
                'message' => 'Coder details',
                'coder' => $coder
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error '], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coder $coder)
    {
        $request->validate([
            'event_id' => 'required',
            'promo_id' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $coder->event_id=$request->event_id;
        $coder->promo_id=$request->promo_id;
        $coder->name=$request->name;
        $coder->lastname=$request->lastname;
        $coder->gender=$request->gender;
        $coder->years=$request->years;
        $coder->avaliability=$request->avaliability;
        $coder->remote=$request->remote;
        $coder->email=$request->email;
        $coder->phone=$request->phone;
        $coder->linkedin=$request->linkedin;
        $coder->github=$request->github;
        $coder->profile=$request->profile;
        $coder->save();

        if ($coder) {
            $data = [
                'message' => 'Coder updated successfully',
                'coder' => $coder
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to update Coder'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coder $coder)
    {
        $coder->delete();

        if ($coder) {
            $data = [
                'message' => 'Coder deleted successfully',
                'coder' => $coder
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to delete Coder'], 500);
    }

    public function recruiters(Request $request)
    {
        $request->validate([
            'coder_id' => 'required|integer'
        ]);
        $coder = Coder::find($request->coder_id);
        $recruiters = $coder->recruiter;

        if ($coder) {
            $data = [
                'message' => 'Recruiter fetched successfully',
                'coder' => $coder,
                'recruiters' => $recruiters
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to fetched Recruiter'], 500);
    }


    public function attachStack(Request $request)
    {
        
        $request->validate([
            'coder_id' => 'required|integer',
            'stack_id' => 'required|integer'

        ]);
        $coder = Coder::find($request->coder_id);
        $coder->stack()->attach($request->stack_id);

        if ($coder) {
            $data = [
                'message' => 'Stack attached successfully',
                'coder' => $coder
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to attached Stack'], 500);
    }

    public function detachStack(Request $request)
    {
        
        $request->validate([
            'coder_id' => 'required|integer',
            'stack_id' => 'required|integer'

        ]);
        $coder = Coder::find($request->coder_id);
        $coder->stack()->detach($request->stack_id);

        if ($coder) {
            $data = [
                'message' => 'Stack detached successfully',
                'coder' => $coder
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to detached Stack'], 500);
    }

    public function attachLanguage(Request $request)
    {
        
        $request->validate([
            'coder_id' => 'required|integer',
            'language_id' => 'required|integer'

        ]);
        $coder = Coder::find($request->coder_id);
        $coder->language()->attach($request->language_id);

        if ($coder) {
            $data = [
                'message' => 'Languages attached successfully',
                'coder' => $coder
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to attached Languages'], 500);
    }

    public function detachLanguage(Request $request)
    {
        
        $request->validate([
            'coder_id' => 'required|integer',
            'language_id' => 'required|integer',

        ]);
        $coder = Coder::find($request->coder_id);
        $coder->language()->detach($request->language_id);

        if ($coder) {
            $data = [
                'message' => 'Languages detached successfully',
                'coder' => $coder
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to detached Languages'], 500);
    }
}
