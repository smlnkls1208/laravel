<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\ReadingListController;
use App\Http\Controllers\Api\V1\RentalController;
use App\Http\Controllers\Api\V1\UserController;

Route::prefix('v1')->middleware('throttle:api')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/{book}', [BookController::class, 'show']);
});

Route::prefix('v1')->middleware(['throttle:api', 'auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('reading-list', [ReadingListController::class, 'index']);
    Route::post('reading-list', [ReadingListController::class, 'store']);
    Route::delete('reading-list/{book}', [ReadingListController::class, 'destroy']);
    Route::get('rentals', [RentalController::class, 'index']);
    Route::post('rentals', [RentalController::class, 'store']);
    Route::apiResource('books', BookController::class)
        ->only(['store', 'update', 'destroy'])
        ->parameters(['books' => 'book']);
    Route::get('users', [UserController::class, 'index']);
    Route::patch('users/{user}/toggle-block', [UserController::class, 'toggleBlock']);
});
