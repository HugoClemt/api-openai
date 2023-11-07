<?php

namespace App\Http\Middleware;

use App\Contracts\TokenManagerInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CaptureHeaders
{
    protected $tokenManager;

    public function __construct(TokenManagerInterface $tokenManager)
    {
        $this->tokenManager = $tokenManager;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json([
                'status' => false,
                'message' => 'Token missing',
            ], 401);
        }

        $decoded = $this->tokenManager->checkToken($token);

        if ($decoded === null) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $request->attributes->set('jwt_data', $decoded);

        return $next($request);
    }
}