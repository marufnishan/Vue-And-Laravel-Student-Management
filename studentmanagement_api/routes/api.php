<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
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

Route::prefix('v1')->group(function(){
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/registration',[AuthController::class,'registration']);
    Route::post('/forgot',[ForgotPasswordController::class,'forgotPassword']);
    Route::post('/reset',[ResetPasswordController::class,'passwordReset']);

    Route::get('/login',function(){
        return response()->json([
            'message' => 'Unauthenticated'
         ],401);
    })->name('login');

    Route::middleware('auth:api')->group(function(){
        Route::post('/logout',[AuthController::class,'logout']);
    });
});

