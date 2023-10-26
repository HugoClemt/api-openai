<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class TokenController extends Controller
{
    public function createdToken(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        //$key = Config::get('SECRET_KEY_TOKEN');
        $key = env('SECRET_KEY_TOKEN');

/*         return response()->json([
            'status' => true,
            'token' => $key,
        ]); */

        $payload = [
            'login' => $login,
            'password' => $password,
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        // $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

        return response()->json([
            'status' => true,
            'token' => $jwt,
        ])->header('Authorization', $jwt);
    }
    
}
