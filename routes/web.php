<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class, 'index'])->name('home');

//Return the file to be rendered, with the parameter (post) declared in the post.blade.html file
Route::get('/posts/{post}', [PostController::class, 'show']);