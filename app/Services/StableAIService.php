<?php

namespace App\Services;

class StableAIService
{
    protected $apiKey;
    protected $imagePath = 'storage/app/public';
    

    public function __construct()
    {
        $this->apiKey = env('STABLE_API_KEY');

    }

    function generateImage(string $promptImage, string $name)
    {

        $imageName = $name . ".jpg";
        // Create a curl post request
        $ch = curl_init();

        // url
        curl_setopt($ch, CURLOPT_URL, "https://clipdrop-api.co/text-to-image/v1");

        // Method post
        curl_setopt($ch, CURLOPT_POST, true);

        // header api key in "x-api-key"
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "x-api-key:" . $this->apiKey,
        )
        );

        // multipart/form-data
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            "prompt" => $promptImage,
        )
        );

        // Exec
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // verify peer false
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute the requestc 
        $result = curl_exec($ch);

        // Close the request
        curl_close($ch);

        $imagePath = $this->imagePath . '/' . $imageName;

        file_put_contents($imageName, $result);

        return $imagePath;
    }
}