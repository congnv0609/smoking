<?php

use App\Http\Controllers\Cms\EmaController;
use App\Http\Controllers\Cms\SmokerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::post('/login', [LoginController::class, 'login'])->withoutMiddleware('jwt.auth');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/refresh', [LoginController::class, 'refresh'])->middleware('jwt.refresh');

Route::get('/smokers/list', [SmokerController::class, 'list']);
Route::get('/smokers/detail/{id}', [SmokerController::class, 'detail']);
Route::put('/smokers/update/{id}', [SmokerController::class, 'updateSchedule']);
Route::get('/smokers/overview/user/{id}', [SmokerController::class, 'overview']);

//ema
Route::get('/ema/list', [EmaController::class, 'index']);
