<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversationController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware(GuestMiddleware::class)->group(function(){
//     //unauthorized users
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::post('/register', [AuthController::class, 'register']);
// });
// Route::middleware(AuthMiddleware::class)->group(function(){
//     //authorized users
//     Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// });
Route::get('/test', [ConversationController::class, 'test']);