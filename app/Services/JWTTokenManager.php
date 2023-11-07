<?php 

namespace App\Services;

use App\Contracts\TokenManagerInterface;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Config;
use Firebase\JWT\Key;

class JWTTokenManager implements TokenManagerInterface
{
    public function createToken(array $payload)
    {
        $key = env('SECRET_KEY_TOKEN');
        $jwt = JWT::encode($payload, $key, 'HS256');

        return $jwt;
    }

    public function checkToken(string $token)
    {
        try {
            $key = env('SECRET_KEY_TOKEN');
            
            $keyTTT = new Key($key, 'HS256');

            $decoded = JWT::decode($token, $keyTTT);
            return $decoded;
        } catch (\Exception $e) {
            
            return null;
        }
    }
}

?>