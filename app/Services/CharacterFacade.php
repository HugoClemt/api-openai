<?php

namespace App\Services;

use App\Models\Character;
use App\Models\Universe;

class CharacterFacade
{
    private $stableAIService;
    private $openAIService;

    public function __construct(StableAIService $stableAIService, OpenAIService $openAIService)
    {
        $this->stableAIService = $stableAIService;
        $this->openAIService = $openAIService;
    }

    public function createCharacter($universeId, $data)
    {
        $universe = $this->findUniverse($universeId);

        if (!$universe) {
            return response()->json([
                'status' => false,
                'message' => 'Univers non trouvé',
            ], 404);
        }

        $imagePath = $this->generateCharacterImage($data['name'], $universe->name);
        $description = $this->generateCharacterDescription($data['name'], $universe->name);

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

    private function findUniverse($universeId)
    {
        $universe = Universe::find($universeId);

        return $universe;
    }

    private function generateCharacterImage($characterName, $universeName)
    {
        $promptImage = "Generate a high-quality realistic image of 
        the character " . $characterName . " related to " . $universeName;

        return $this->stableAIService->generateImage($promptImage, $characterName);
    }

    private function generateCharacterDescription($characterName, $universeName)
    {
        $prompt = "Dans le cadre de ce jeu de rôle, génère une description pour le personnage en 256 caractères. 
        Le personnage est nommé " . $characterName . " et il appartient à l'univers " . $universeName;

        $text = $this->openAIService->complete($prompt);

        if (isset($text['choices']) && is_array($text['choices']) && count($text['choices']) > 0) {
            $description = $text['choices'][0]['text'];
            $description = str_replace("\n", "", $description);
        } else {
            $description = "Description non disponible";
        }

        return $description;
    }
}
