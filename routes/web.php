<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CommentController,
    PostController,
    ReactionTypeController,
    PostStatusController,
    ReactionController,
    ReplyController,
    UsersController,
    HomeController,
};


Route::get('/', function () {
    return view('welcome');
});


Route::get('/search' , [UsersController::class , 'search'])->name('search');

$pages = ['about' , 'service' , 'contacts'];

foreach ($pages as $page){
    Route::view($page , "$page");
}
Route::resources(
    [
        'comments' => CommentController::class,
        'posts' => PostController::class,
        'post-reactions' => ReactionTypeController::class,
        'post-statuses' => PostStatusController::class,
        'reactions' => ReactionController::class,
        'replies' => ReplyController::class,
        'users' => UsersController::class,
        '/' =>HomeController::class,
    ]
);
