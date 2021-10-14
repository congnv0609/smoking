<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::post('/login', [LoginController::class, 'login'])->withoutMiddleware('auth');

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
// });

Route::get('/me', [LoginController::class, 'me']);

Route::get('/logout', [LoginController::class, 'logout']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     $user = User::where('email', 'leonard@bvcreation.com')->first();
//     return response()->json($user);
// });