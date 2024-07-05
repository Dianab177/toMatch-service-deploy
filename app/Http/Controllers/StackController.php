<?php

namespace App\Http\Controllers;

use App\Models\Stack;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stacks = Stack::all();
        return response()->json($stacks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $stack = new Stack();
        $stack->name = $request->name;
        $stack->save();

        if ($stack) {
            $data = [
                'message' => 'Stack created successfully',
                'stack' => $stack
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to create stack'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stack $stack)
    {

        if ($stack) {
            $data = [
                'message' => 'Stack details',
                'stack' => $stack
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error '], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stack $stack)
    {
        $request->validate([
            'name' => 'required',

        ]);


        $stack->name = $request->name;
        $stack->save();

        if ($stack) {
            $data = [
                'message' => 'Stack updated successfully',
                'stack' => $stack
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to update stack'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stack $stack)
    {
        $stack->delete();

        if ($stack) {
            $data = [
                'message' => 'Stack delete successfully',
                'stack' => $stack
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to delete stack'], 500);
    }

    public function recruiters(Request $request)
    {
        $request->validate([
            'stack_id' => 'required|integer'

        ]);
        $stacks = Stack::find($request->stack_id);
        $recruiters = $stacks->recruiter;

        if ($stacks) {
            $data = [
                'message' => 'Recruiters fetched successfully',
                'recruiters' => $recruiters
            ];
            return response()->json($data);
        }

        return response()->json(['message' => 'Error to fetched Recruiters'], 500);
    }

    public function coders(Request $request)
    {
        $request->validate([
            'stack_id' => 'required|integer'

        ]);
        $stacks = Stack::find($request->stack_id);
        $coders = $stacks->coder;

        if ($stacks) {
            $data = [
                'message' => 'Coders fetched successfully',
                'coders' => $coders
            ];
            return response()->json($data);
        }

        return response()->json(['message' => 'Error to fetched Coders'], 500);
    }
}
