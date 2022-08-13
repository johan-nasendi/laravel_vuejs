<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});

Route::post('register',[RegisterController::class, 'store']);
Route::post('login',[AuthenticationController::class, 'login']);
Route::post('logout',[AuthenticationController::class, 'logout']);
