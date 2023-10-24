<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::all();
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }

    public function store(StoreMessageRequest $request){
        $message = Message::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Message created successfully',
            'Message' => $message,
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $message = Message::find($id);

        if(!$message){
            return response()->json([
                'status' => false,
                'message' => 'Message not found',
            ], 404);
        }
        return response()->json($message);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        $message = Message::find($message->id);
        if(!$message){
            return response()->json([
                'status' => false,
                'message' => 'Message not found',
            ], 404);
        }
        $message->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Message updated successfully',
            'Message' => $message,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message = Message::find($message->id);
        if(!$message){
            return response()->json([
                'status' => false,
                'message' => 'Message not found',
            ], 404);
        }
        $message->delete();
        return response()->json([
            'status' => true,
            'message' => 'Message deleted successfully',
        ], 200);
    }
}
