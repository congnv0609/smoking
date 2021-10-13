<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::post('/login', [LoginController::class, 'login']);

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
// });

Route::get('/test', [App\Http\Controllers\UserController::class, 'test'])->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     $user = User::where('email', 'leonard@bvcreation.com')->first();
//     return response()->json($user);
// });