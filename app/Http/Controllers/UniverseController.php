<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\StoreUniverseRequest;
use App\Models\Character;
use App\Models\Universe;

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

    public function store(StoreUniverseRequest $request, StableAIService $stableAIService)
    {
        $data = $request->all();
        $universeName = $data['name'];

        $promptImage = "Generate a high-quality realistic image of the universe related to ". $data['name'];

        $imagePath = $stableAIService->generateImage($promptImage, $universeName);

        $prompt = "Dans le cadre de ce jeu rôle, génère une description pour l'univers en 256 caractère. L'universe est nommée ". $data['name'];
 
        $text = $this->openAIService->complete($prompt);

        $description = $text['choices'][0]['text'];
        $description = str_replace("\n", "", $description);

        $universe = new Universe();
        $universe->name = $data['name'];
        $universe->id_user = $data['id_user'];
        $universe->image = $imagePath;
        $universe->description = $description;

        $universe->save();

        return response()->json([
            'status' => true,
            'message' => 'universe created successfully',
            'universe' => $universe,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function CreateCharacter($id, StableAIService $stableAIService)
    {
        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json([
                'status' => false,
                'message' => 'Univers non trouvé',
            ], 404);
        }

        $data = json_decode(file_get_contents("php://input"), true);

        $promptImage = "Generate a high-quality realistic image of the character ". $data['name'] ." related to ". $universe->name;

        $imagePath = $stableAIService->generateImage($promptImage, $data['name']);

        $prompt = "Dans le cadre de ce jeu rôle, génère une description pour le personnage en 256 caractère. Le personnage est nommée ". $data['name'] . " et il est dans l'univers ". $universe->name ;

        $text = $this->openAIService->complete($prompt);
        $description = $text['choices'][0]['text'];
        $description = str_replace("\n", "", $description);
        
        $character = new Character();
        $character->name = $data['name'];
        $character->id_universe = $universe->id;
        $character->image = $imagePath;
        $character->description = $description;

        $character->save();

        return response()->json([
            'status' => true,
            'message' => 'Personnage ajouté avec succès à l\'univers',
            'data' => $character,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $universe = Universe::find($id);

        if(!$universe){
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
    public function UpdateCharacter($id, $id_character, Request $request){

        $universe = Universe::find($id);

        if(!$universe){
            return response()->json([
                'status' => false,
                'message' => 'universe not found',
            ], 404);
        }

        $character = Character::find($id_character);

        if(!$character){
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
        if(!$universe){
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
        if(!$universe){
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

    public function DeleteCharacter($id, $id_character){
        
        $universe = Universe::find($id);

        if(!$universe){
            return response()->json([
                'status' => false,
                'message' => 'universe not found',
            ], 404);
        }

        $character = Character::find($id_character);

        if(!$character){
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
