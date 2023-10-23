<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUniverseRequest;
use App\Models\Universe;
use Illuminate\Http\Request;

class UniverseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universe = Universe::all();
        return response()->json([
            'status' => true,
            'universe' => $universe,
        ]);
    }

    public function store(StoreUniverseRequest $request){
        $universe = Universe::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'universe created successfully',
            'universe' => $universe,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Universe $universe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Universe $universe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Universe $universe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Universe $universe)
    {
        //
    }
}