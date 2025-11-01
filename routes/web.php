<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', function () {
    return '<h1>Hello world!</h1>';
});*/

/*Route::get('/', function() {
    return view('hi', ['title' => 'Main page']);
});*/

Route::view('/', 'test/hi', ['title' => 'Main page']);

/*Route::get('/posts/{id?}', function($id = 1) {
    return "Posts ID: {$id}";
});

Route::get('/posts/{id}/comments/{comment}', function($id, $comment_id) {
    return "Posts ID: {$id}, Comment ID: {$comment_id}";
});*/

/*Route::get('/posts/{id}', function($id) {
    return "Posts ID: {$id}";
})->where(['id' => '[\d]+']);*/

Route::get('/posts', function() {
    return "Posts page";
});

Route::get('/posts/{id}', function($id) {
    return "Posts ID: {$id}";
});

Route::get('/posts/contact', function() {
    return "post CONTACT";
});

Route::get('/posts/{slug}', function($slug) {
    return "Posts SLUG: {$slug}";
});

Route::get('/search/{search}', function($search) {
    return "Searching: {$search}";
})->where(['search' => '.*']); //данный метод уже не работает на 12 версии ларавел


Route::post('posts', function() {
    return 'Store posts';
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

/*Route::match(['get', 'post'], '/get-post', function() {
    return 'Hello from GET|POST';
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);*/

Route::any('/get-post', function() {
    return 'Hello from GET|POST';
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

Route::redirect('/here', 'get-post', 301);
