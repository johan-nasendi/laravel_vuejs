<?php

use App\Http\Controllers\ApiDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users',[ApiDataController::class, 'index']);
Route::get('/users/{id}',[ApiDataController::class, 'show']);

Route::post('/users',[ApiDataController::class, 'store']);
Route::post('/users/photo/{id}',[ApiDataController::class, 'upload']);

Route::put('/users/{id}',[ApiDataController::class, 'update']);
Route::delete('/users/{id}',[ApiDataController::class, 'destroy']);
