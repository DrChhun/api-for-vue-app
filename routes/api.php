<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function(){
    Route::post('register', [UserController::class, 'createUser']);
    Route::post('login', [UserController::class, 'loginUser']);
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function() {
    Route::apiResource('books',  BookController::class)->except(['exit']);
    Route::apiResource('coffees', CoffeeController::class);
    Route::apiResource('history', HistoryController::class);
    Route::get('coffees/sell/{id}/{modify}', [CoffeeController::class, 'sell']);
});
