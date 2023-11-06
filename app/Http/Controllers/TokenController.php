<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Contracts\TokenManagerInterface;

class TokenController extends Controller
{
    protected $tokenManager;

    public function __construct(TokenManagerInterface $tokenManager)
    {
        $this->tokenManager = $tokenManager;
    }

    public function createdToken(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        $payload = [
            'login' => $login,
            'password' => $password,
        ];

        $jwt = $this->tokenManager->createToken($payload);

        return response()->json([
            'status' => true,
            'token' => $jwt,
        ])->header('Authorization', $jwt);
    }
}
