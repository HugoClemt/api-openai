<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConversationRequest;
use App\Models\Conversation;
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
    public function create()
    {
        //create conversation
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Conversation $conversation)
    {
        //show conversato
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
    public function destroy(Conversation $conversation)
    {
        //
    }
}
