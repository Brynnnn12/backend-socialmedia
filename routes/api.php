<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Middleware\JWTMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::prefix('v1')->group(function () {
    Route::post('register', [\App\Http\Controllers\Api\JwtAuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\Api\JwtAuthController::class, 'login']);

    //middleware JWTMiddleware

    Route::middleware(JWTMiddleware::class)->group(function () {
        Route::apiResource('posts', PostController::class);
        Route::apiResource('comments', CommentController::class);
        Route::apiResource('likes', LikeController::class);
        Route::apiResource('messages', \App\Http\Controllers\Api\MessageController::class);
    });
});
