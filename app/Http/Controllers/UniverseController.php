<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\StoreUniverseRequest;
use App\Models\Character;
use App\Models\Universe;


use App\Services\CharacterFacade;
use App\Services\UniverseFacade;
use Illuminate\Http\Request;

use App\Services\OpenAIService;
use App\Services\StableAIService;

class UniverseController extends Controller
{

    protected $openAIService;

    public function __construct(OpenAIService $openAIService, StableAIService $stableAIService)
    {
        $this->openAIService = $openAIService;
        $this->stableAIService = $stableAIService;
    }
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

    public function store(StoreUniverseRequest $request, UniverseFacade $universeFacade)
    {
        return $universeFacade->createUniverse($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCharacter($universeId, Request $request, CharacterFacade $characterFacade)
    {
        $data = $request->all();
        $response = $characterFacade->createCharacter($universeId, $data);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json([
                'status' => false,
                'message' => 'universe not found',
            ], 404);
        }
        return response()->json($universe);
    }

    public function ShowCharacter($id)
    {
        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json([
                'status' => false,
                'message' => 'Univers non trouvé',
            ], 404);
        }

        $characters = Character::where('id_universe', $id)->get();

        return response()->json([
            'status' => true,
            'universe' => $universe->name,
            'characters' => $characters,
        ]);
    }

    //function for update character width id on url and universe id on url 
    public function UpdateCharacter($id, $id_character, Request $request)
    {

        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json([
                'status' => false,
                'message' => 'universe not found',
            ], 404);
        }

        $character = Character::find($id_character);

        if (!$character) {
            return response()->json([
                'status' => false,
                'message' => 'character not found',
            ], 404);
        }

        if ($character->id_universe !== $universe->id) {
            return response()->json([
                'status' => false,
                'message' => 'character is not part of the specified universe',
            ], 404);
        }

        $character->update($request->all());

        return response()->json([
            'status' => true,
            'data universe' => $universe->name,
            'datat charachter' => $character
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Universe $universe)
    {
        $universe = Universe::find($universe->id);
        if (!$universe) {
            return response()->json([
                'status' => false,
                'message' => 'universe not found',
            ], 404);
        }

        $universe->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'universe updated successfully',
            'universe' => $universe,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Universe $universe)
    {
        $universe = Universe::find($universe->id);
        if (!$universe) {
            return response()->json([
                'status' => false,
                'message' => 'universe not found',
            ], 404);
        }
        $universe->delete();
        return response()->json([
            'status' => true,
            'message' => 'universe deleted successfully',
        ], 200);
    }

    public function DeleteCharacter($id, $id_character)
    {

        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json([
                'status' => false,
                'message' => 'universe not found',
            ], 404);
        }

        $character = Character::find($id_character);

        if (!$character) {
            return response()->json([
                'status' => false,
                'message' => 'character not found',
            ], 404);
        }

        if ($character->id_universe !== $universe->id) {
            return response()->json([
                'status' => false,
                'message' => 'character is not part of the specified universe',
            ], 404);
        }

        $character->delete();

        return response()->json([
            'status' => true,
            'message' => 'character deleted successfully',
        ], 200);
    }
}
