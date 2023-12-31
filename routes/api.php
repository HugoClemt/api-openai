<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\TokenController;
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

//Route for User with token check middleware on /user

Route::middleware(['token.check'])->apiResource('user', UserController::class);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::put('/user/{id}', [UserController::class, 'update']);

Route::delete('/user/{id}', [UserController::class, 'destroy']);

//Route for Universe

Route::middleware(['token.check'])->apiResource('universe', UniverseController::class);

Route::get('/universe/{id}', [UniverseController::class, 'show']);

Route::put('/universe/{id}', [UniverseController::class, 'update']);

Route::delete('/universe/{id}', [UniverseController::class, 'destroy']);

Route::get('/universe/{id}/character', [UniverseController::class, 'ShowCharacter']);

Route::post('/universe/{id}/character', [UniverseController::class, 'CreateCharacter']);

Route::put('/universe/{id}/character/{id_character}', [UniverseController::class, 'UpdateCharacter']);

Route::delete('/universe/{id}/character/{id_character}', [UniverseController::class, 'DeleteCharacter']);

//Route for Conversation

Route::middleware(['token.check'])->apiResource('conversation', ConversationController::class);

Route::get('/conversation/{id}', [ConversationController::class, 'show']);

Route::delete('/conversation/{id}', [ConversationController::class, 'destroy']);

Route::get('/conversation/{id}/message', [ConversationController::class, 'ShowMessage']);

Route::post('/conversation/{id}/message', [ConversationController::class, 'CreateMessage']);


//Route for Message

Route::middleware(['token.check'])->apiResource('message', MessageController::class);

Route::get('/message/{id}', [MessageController::class, 'show']);

Route::put('/message/{id}', [MessageController::class, 'update']);

Route::delete('/message/{id}', [MessageController::class, 'destroy']);

//Route for Character

Route::middleware(['token.check'])->apiResource('character', CharacterController::class);

Route::get('/character/{id}', [CharacterController::class, 'show']);

Route::put('/character/{id}', [CharacterController::class, 'update']);

Route::delete('/character/{id}', [CharacterController::class, 'destroy']);

//Route auth for generate token

Route::post('/auth', [TokenController::class, 'createdToken']);

//Route for header with token

Route::get('/header', function(Request $request) {
    
    $allHeaders = $request->headers->all();

    // authentification
    $token = $request->header('Authorization');
});