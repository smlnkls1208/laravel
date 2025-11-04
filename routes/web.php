<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/test', [HomeController::class, 'test'])->name('home.test');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::post('/store', [HomeController::class, 'store'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
Route::post('/update', [HomeController::class, 'update'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
