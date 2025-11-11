<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;


Route::prefix('v1')->middleware('throttle:api')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('v1')->middleware(['throttle:api', 'auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});
