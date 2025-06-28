<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/post/{post}', function (Post $post) {
    return view('post.show', compact('post'));
});
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
