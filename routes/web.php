<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/test', [HomeController::class, 'test']);
Route::get('/single', TestController::class);

Route::prefix('admin')->name('admin.')->group(function() {
/*    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store')->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update')->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);*/

/*    Route::resource('posts', PostController::class);*/

    Route::resource('products', PostController::class)->except(['create', 'store','edit','update','destroy'])->names(['show' => 'products.view',]);


});

