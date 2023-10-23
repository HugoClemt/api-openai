<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UniverseController;
use App\Models\Character;
use App\Models\Message;
use App\Models\Universe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('/hello', function() {
    return response()->json(['message' => 'Hello World!']);
});


Route::middleware(['token.check'])->apiResource('user', UserController::class);

Route::apiResource('universe', UniverseController::class);

Route::apiResource('message', MessageController::class);

Route::apiResource('character', CharacterController::class);

Route::get('/header', function(Request $request) {
    
    $allHeaders = $request->headers->all();

    // authentification
    $token = $request->header('Authorization');
});