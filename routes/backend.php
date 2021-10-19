<?php

use App\Http\Controllers\Cms\SmokerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::post('/login', [LoginController::class, 'login'])->withoutMiddleware('auth');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/smokers/list', [SmokerController::class, 'list']);
