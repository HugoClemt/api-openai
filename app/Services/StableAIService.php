<?php

namespace App\Services;

class StableAIService
{
    protected $apiKey;
    protected $imagePath = 'storage/app/public/image';


    public function __construct()
    {
        $this->apiKey = env('STABLE_API_KEY');

    }

    function generateImage(string $promptImage, string $name)
    {

        $imageName = $name . ".jpg";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://clipdrop-api.co/text-to-image/v1");

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "x-api-key:" . $this->apiKey,
            )
        );

        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            array(
                "prompt" => $promptImage,
            )
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);

        curl_close($ch);

        $imagePath = public_path('image/' . $imageName);

        if (!file_exists(public_path('image'))) {
            mkdir(public_path('image'), 0755, true);
        }

        file_put_contents($imagePath, $result);

        return $imagePath;
    }
}