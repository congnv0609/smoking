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

//Api
Route::get('/1.0/smoker/schedule', [App\Http\Controllers\Api\SmokerController::class, 'getSchedule']);
Route::post('/1.0/smoker/schedule', [App\Http\Controllers\Api\SmokerController::class, 'postSchedule']);
Route::put('/1.0/smoker/schedule', [App\Http\Controllers\Api\SmokerController::class, 'updateSchedule']);

Route::put('/1.0/ema/{id}/update', [App\Http\Controllers\Api\EmaController::class, 'update']);

Route::get('/1.0/incentive/finished', [App\Http\Controllers\Api\IncentiveController::class, 'finished']);
Route::get('/1.0/incentive/progress', [App\Http\Controllers\Api\IncentiveController::class, 'progress']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
