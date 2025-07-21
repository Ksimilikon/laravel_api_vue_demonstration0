<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\UsersController;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware("auth:sanctum")->group(function(){
    Route::get('user', function (Request $request){
        return $request->user();
    });
    Route::get('/checkAuth', function(){
        return response()->json(['auth'=>true]);
    });
    Route::get('/get-conversations', [ConversationController::class, 'getConversations']);
    Route::get('/chat/{idChat}', [ConversationController::class, 'getMessages']);
    Route::get('/search-users', [UsersController::class, 'searchUsers']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('/send-message', [ConversationController::class, 'setMessage']);
});
