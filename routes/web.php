<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::view('/{any}', 'admin.index')->where('any', '.*');
// });

Route::view('/{any}', 'admin.index')->where('any', '.*');
// Route::view('/{any}', 'index')->where('any', '.*');

// Route::any('/{any}',function(){
//         return view('index');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
