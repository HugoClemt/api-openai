<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCharacterRequest;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $character = Character::all();
        return response()->json([
            'status' => true,
            'character' => $character,
        ]);
    }

    public function store(StoreCharacterRequest $request){
        $character = Character::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'character created successfully',
            'character' => $character,
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
    public function show($id)
    {
        $character = Character::find($id);

        if(!$character){
            return response()->json([
                'status' => false,
                'message' => 'character not found',
            ], 404);
        }
        return response()->json($character);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $character = Character::find($character->id);
        if(!$character){
            return response()->json([
                'status' => false,
                'message' => 'character not found',
            ], 404);
        }
        $character->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'character updated successfully',
            'character' => $character,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character = Character::find($character->id);
        if(!$character){
            return response()->json([
                'status' => false,
                'message' => 'character not found',
            ], 404);
        }
        $character->delete();
        return response()->json([
            'status' => true,
            'message' => 'character deleted successfully',
        ], 200);
    }
}
