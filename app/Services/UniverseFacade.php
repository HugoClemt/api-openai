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
        $stableAIService = StableAIService::getInstance();

        $data = $request->all();
        $universeName = $data['name'];

        $existingUniverse = Universe::where('name', $universeName)->first();

        if ($existingUniverse) {
            return response()->json([
                'status' => false,
                'message' => 'The universe already exists.',
            ], 409);
        }

        $promptStableDiffusion = $this->generateUniverseDescriptionDiffusion($universeName);

        $imagePath = $this->generateUniverseImage($universeName, $stableAIService, $promptStableDiffusion);

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
            'promptStableDiffusion' => $promptStableDiffusion,
        ], 201);
    }

    private function generateUniverseImage($universeName, StableAIService $stableAIService, $promptStableDiffusion)
    {
        $promptImage = "Generate an image of the " . $universeName . " using StableDiffusion: " . $promptStableDiffusion;

        $imagePath = $stableAIService->generateImage($promptImage, $universeName);

        return $imagePath;

    }

    private function generateUniverseDescription($universeName)
    {
        $prompt = "Give me a description in french of the " . $universeName . ", including details about its era, history, and unique features. This description must be a maximum of 512 characters.";
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

    private function generateUniverseDescriptionDiffusion($universeName)
    {
        $description = $this->generateUniverseDescription($universeName);
        $prompt = "Write me a prompt to generate an image with the Text-to-image artificial intelligence named StableDiffusion to represent the " . $universeName . ". The prompt must be in English and no longer than 300 characters. Description of the universe: " . $description;
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