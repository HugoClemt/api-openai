<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConversationRequest;
use App\Models\Character;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Universe;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use Laravel\Prompts\Prompt;

class ConversationController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }
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

        $character = Character::find($conversation->id_character);


        if(!$conversation){
            return response()->json([
                'status' => false,
                'message' => 'Conversation not found',
            ], 404);
        }

        $data = json_decode(file_get_contents("php://input"), true);

        $isHuman = isset($data['is_human']) ? $data['is_human'] : 1;

        $promptMesage = "Portray the character ".$character->name." to respond to the previous message: ".$data['text'].". The response should be in French.";

        $result = $this->openAIService->complete($promptMesage);

        $textOpen = $result['choices'][0]['text'];
        $textOpen = str_replace("\n", "", $textOpen);
        
        $userMessage = new Message([
            'text' => $data['text'],
            'is_human' => $isHuman,
        ]);
        $userMessage->id_conversation = $conversation->id;
        $userMessage->save();

        $aiMessage = new Message([
            'text' => $textOpen,
            'is_human' => 0,
        ]);
        $aiMessage->id_conversation = $conversation->id;
        $aiMessage->save();

        $userId = $userMessage->id;
        $aiMessageId = $aiMessage->id;

        return response()->json([
            'status' => true,
            'message user' => $userMessage,
            'message ai' => $aiMessage,
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

        $message = Message::where('id_conversation', $id)->orderBy('id', 'asc')->get();

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
