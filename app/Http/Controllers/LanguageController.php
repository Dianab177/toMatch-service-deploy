<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return response()->json($languages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',

        ]);
        $language = new Language();
        $language->name = $request->name;
        $language->save();

        if ($language) {
            $data = [
                'message' => 'Language created successfully',
                'service' => $language
            ];
            return response()->json($data);
        }

        return response()->json(['message' => 'Error to created language'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {

        if ($language) {
            $data = [
                'message' => 'Language details',
                'service' => $language
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error'], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $language->name = $request->name;
        $language->save();

        if ($language) {
            $data = [
                'message' => 'Language updated successfully',
                'service' => $language
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to updated language'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();

        if ($language) {
            $data = [
                'message' => 'Language deleted successfully',
                'service' => $language
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to deleted language'], 500);
    }

    public function recruiters(Request $request)
    {

        $languages = Language::find($request->language_id);
        $recruiters = $languages->recruiter;
        if ($languages) {
            $data = [
                'message' => 'Recruiters fetched successfully',
                'recruiters' => $recruiters
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to fetched recruiters'], 500);
    }

    public function coders(Request $request)
    {

        $languages = Language::find($request->language_id);
        $coders = $languages->coders;
        if ($languages) {
            $data = [
                'message' => 'Coders fetched successfully',
                'coders' => $coders
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to fetched coders'], 500);
    }
}
