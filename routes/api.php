<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [LoginController::class, 'login1'])->withoutMiddleware('smoking');

Route::get('/ios/1.0/smoker/schedule', [App\Http\Controllers\Ios\SmokerController::class, 'getSchedule']);
Route::post('/ios/1.0/smoker/schedule', [App\Http\Controllers\Ios\SmokerController::class, 'postSchedule']);

Route::get('/android/1.0/smoker/schedule', [App\Http\Controllers\Android\SmokerController::class, 'getSchedule']);
Route::post('/android/1.0/smoker/schedule', [App\Http\Controllers\Android\SmokerController::class, 'postSchedule']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
