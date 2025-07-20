<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id; // Ambil ID user yang sedang login

        $messages = Message::where('receiver_id', $user_id)->orWhere('sender_id', $user_id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Messages retrieved successfully',
            'data' => $messages,
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [

            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
            ], 422);
        }

        $message = Message::create([
            'sender_id' => $user->id,
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message created successfully',
            'data' => $message,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $message = Message::find($id);

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Message retrieved successfully',
            'data' => $message,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
            ], 422);
        }

        $message = Message::find($id);

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        $message->update($request->only('content'));

        return response()->json([
            'success' => true,
            'message' => 'Message updated successfully',
            'data' => $message,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::find($id);

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        $message->delete();

        return response()->json([
            'success' => true,
            'message' => 'Message deleted successfully',
        ], 200);
    }
}
