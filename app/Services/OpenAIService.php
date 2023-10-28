<?php

namespace App\Services;

class OpenAIService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENAI_API_KEY');

    }

    function complete(string $request_body){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/completions");
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $this->apiKey,
            "Content-Type: application/json"
        ));

        // verify peer false
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $request = array(
            "model" => "gpt-3.5-turbo-instruct",
            "temperature" =>   1,
            "max_tokens" => 256,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            "stop" => ["Human:", "AI:"],
            "prompt" => $request_body
        );


        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        // return $result;

        return json_decode($result, true);
    }
}
