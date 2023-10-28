<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConversationRequest;
use App\Models\Character;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Universe;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conversation = Conversation::all();
        return response()->json([
            'status' => true,
            'conversation' => $conversation,
        ]);
    }

    public function store(StoreConversationRequest $request){
        $conversation = Conversation::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Conversation created successfully',
            'Message' => $conversation,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function CreateMessage($id)
    {
        $conversation = Conversation::find($id);

        if(!$conversation){
            return response()->json([
                'status' => false,
                'message' => 'Conversation not found',
            ], 404);
        }

        $data = json_decode(file_get_contents("php://input"), true);

        $message = new Message($data);
        $message->id_conversation = $conversation->id;
        $message->save();

        $id = $message->id;

        return response()->json([
            'status' => true,
            'conversation' => $message,
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $conversation = Conversation::find($id);

        if(!$conversation){
            return response()->json([
                'status' => false,
                'message' => 'Conversation not found',
            ], 404);
        }

        $character = Character::find($conversation->id_character);

        $universe = Universe::find($character->id_universe);

        return response()->json([
            'status' => true,
            'conversation' => $conversation,
            'character' => $character,
            'universe' => $universe,

        ]);
    }

    public function ShowMessage($id){

        $conversation = Conversation::find($id);

        if(!$conversation){
            return response()->json([
                'status' => false,
                'message' => 'Conversation not found',
            ], 404);
        }

        $message = Message::where('id_conversation', $id)->get();

        return response()->json([
            'status' => true,
            'conversation' => $conversation,
            'message' => $message,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $conversation = Conversation::find($id);

        if(!$conversation){
            return response()->json([
                'status' => false,
                'message' => 'Conversation not found',
            ], 404);
        }

        $conversation->delete();

        return response()->json([
            'status' => true,
            'message' => 'Conversation deleted successfully',
        ]);
    }
}
