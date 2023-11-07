<?php

namespace App\Services;

use App\Http\Requests\StoreUniverseRequest;
use App\Models\Universe;

use App\Services\OpenAIService;
use App\Services\StableAIService;

class UniverseFacade
{
    private $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function createUniverse(StoreUniverseRequest $request)
    {
        $stableAIService = app(StableAIService::class);

        $data = $request->all();
        $universeName = $data['name'];

        $imagePath = $this->generateUniverseImage($universeName, $stableAIService);
        $description = $this->generateUniverseDescription($universeName);

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

    private function generateUniverseImage($universeName, StableAIService $stableAIService)
    {
        $promptImage = "Generate an ultra-realistic image that faithfully captures the iconic characters, settings, and elements of "
            . $universeName . ", ensuring it reflects the true essence of the "
            . $universeName . " universe. Pay meticulous attention to details, textures, 
            and lighting to make it look like a photograph from within the " . $universeName . " world.";
        return $stableAIService->generateImage($promptImage, $universeName);
    }

    private function generateUniverseDescription($universeName)
    {
        $prompt = "Dans le cadre de ce jeu rôle, génère une description pour l'univers en 256 caractères. L'univers est nommée " . $universeName;
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