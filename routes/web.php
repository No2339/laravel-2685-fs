<?php

use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

$static_pages = ['contact-us', 'about', 'services'];

foreach ($static_pages as $page) {
    Route::view($page, "static.$page");
}



// Route::get('posts', 'App\Http\Controllers\PostController@index');
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);



Route::resource('replies', ReplyController::class);

// Fallback
Route::fallback(function () {
    return view('static.404');
});
