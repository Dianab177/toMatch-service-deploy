<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all();
        return response()->json($company);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'province_id' => 'required|integer',
            'name' => 'required',
            'priority' => 'required|integer',

        ]);

        $company = new Company();
        $company->province_id = $request->province_id;
        $company->name = $request->name;
        $company->ubication = $request->ubication;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->priority = $request->priority;
        $company->save();

        if ($company) {
            $data = [
                'message' => 'Company created successfully',
                'company' => $company
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to created company'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {

        if ($company) {
            $data = [
                'message' => 'Company details',
                'company' => $company
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error'], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'province_id' => 'required|integer',
            'name' => 'required',
            'priority' => 'required|integer',

        ]);

        $company->province_id = $request->province_id;
        $company->name = $request->name;
        $company->ubication = $request->ubication;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->priority = $request->priority;
        $company->save();

        if ($company) {
            $data = [
                'message' => 'Company updated successfully',
                'company' => $company
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to updated company'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        if ($company) {
            $data = [
                'message' => 'Company deleted successfully',
                'company' => $company
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to deleted company'], 500);
    }
}
