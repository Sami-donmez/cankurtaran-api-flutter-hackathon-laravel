<?php

use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\QuakeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->group( function () {
    Route::put('/change-photo',[UserController::class,'changePhoto']);
    Route::put('/user/{id}',[UserController::class,'update']);
    Route::delete('/user/{id}',[UserController::class,'destroy']);
    Route::post('/user/friend/{id}',[UserController::class,'friend']);
    Route::delete('/user/friend/{id}',[UserController::class,'friendDestroy']);
    Route::post('/health', [HealthController::class, 'store']);
    Route::delete('/health/{id}', [HealthController::class, 'destroy']);
    Route::delete('/emergency/{id}', [EmergencyController::class, 'destroy']);


});
Route::get('/emergency/add', [EmergencyController::class, 'store']);

Route::get('/emergency', [EmergencyController::class, 'index']);
Route::get('/quake', [QuakeController::class, 'index']);
Route::get('/quake/{id}', [QuakeController::class, 'show']);
Route::get('/user/{id}/health',[UserController::class,'healths']);
Route::get('/user/{id}',[UserController::class,'show']);
Route::post('/login', [PassportAuthController::class, 'login'])->name('login');
Route::post('/register',[UserController::class,'create']);




