<?php

namespace App\Http\Controllers\Api;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
            ], 422);
        }

        $like = Like::create([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Like created successfully',
            'data' => $like,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $like = Like::find($id);
        if (!$like) {
            return response()->json([
                'success' => false,
                'message' => 'Like not found',
            ], 404);
        }
        $like->delete();

        return response()->json([
            'success' => true,
            'message' => 'Like deleted successfully',
        ], 200);
    }
}
