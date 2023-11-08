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

        $characterName = $data['name'];

        $existingCharacter = Character::where('name', $characterName)
            ->where('id_universe', $universe->id)
            ->first();

        if ($existingCharacter) {
            return response()->json([
                'status' => false,
                'message' => 'The character already exists in this universe.',
            ], 409);
        }

        $promptStableDiffusion = $this->generateCharacterDescriptionDiffusion($characterName, $universe->name);

        $imagePath = $this->generateCharacterImageWithDescription($characterName, $universe->name, $promptStableDiffusion);
        $description = $this->generateCharacterDescription($characterName, $universe->name);

        $character = new Character();
        $character->name = $data['name'];
        $character->id_universe = $universe->id;
        $character->image = $imagePath;
        $character->description = $description;
        // $character->save();

        return response()->json([
            'status' => true,
            'message' => 'Personnage ajouté avec succès à l\'univers',
            'data' => $character,
            'promptStableDiffusion' => $promptStableDiffusion,
        ], 201);
    }

    private function findUniverse($universeId)
    {
        $universe = Universe::find($universeId);

        return $universe;
    }

    private function generateCharacterImageWithDescription($characterName, $universeName, $promptStableDiffusion)
    {
        $promptImage = "Generate an image of the " . $characterName . " of " . $universeName . " using StableDiffusion: " . $promptStableDiffusion;

        $imagePath = $this->stableAIService->generateImage($promptImage, $characterName);

        return $imagePath;
    }

    private function generateCharacterDescription($characterName, $universeName)
    {
        $prompt = "Give me a description in french of the " . $characterName . " from the " . $universeName . "Give me his background, personality and special features. This description must be a maximum of 512 characters.";

        $text = $this->openAIService->complete($prompt);

        if (isset($text['choices']) && is_array($text['choices']) && count($text['choices']) > 0) {
            $description = $text['choices'][0]['text'];
            $caractere = array("\n", "\r", "'\'");
            $description = str_replace($caractere, "", $description);
            $description = preg_replace('/[^\p{L}0-9\s.\']/u', '', $description);
        } else {
            $description = "Description non disponible";
        }

        return $description;
    }

    private function generateCharacterDescriptionDiffusion($characterName, $universeName)
    {
        $description = $this->generateCharacterDescription($characterName, $universeName);
        $prompt = "Write me a prompt to generate an image with the Text-to-image artificial intelligence named StableDiffusion to represent the " . $characterName . " of " . $universeName . ". The prompt must be in English and no longer than 300 characters. Description of the character: " . $description;
        $text = $this->openAIService->complete($prompt);

        if (isset($text['choices']) && is_array($text['choices']) && count($text['choices']) > 0) {
            $promptStableDiffusion = $text['choices'][0]['text'];
            $caractere = array("\n", "\r");
            $promptStableDiffusion = str_replace($caractere, "", $promptStableDiffusion);
            $promptStableDiffusion = preg_replace('/[^\p{L}0-9\s.\']/u', '', $promptStableDiffusion);
        } else {
            $promptStableDiffusion = "Prompt non disponible";
        }

        return $promptStableDiffusion;
    }
}
