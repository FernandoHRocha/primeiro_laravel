<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;


Route::get('/',[PostController::class, 'index'])->name('home');

Route::middleware('guest')->group( fn() => 
    Route::get('/register', [RegisterController::class, 'create']),
    Route::post('/register', [RegisterController::class, 'store']),
    Route::get('/login', [SessionsController::class, 'create']),
    Route::post('/login', [SessionsController::class, 'store']),
);

Route::middleware('auth')->group( fn() => 
    Route::get('/logout', [SessionsController::class, 'destroy']),
);

//Return the file to be rendered, with the parameter (post) declared in the post.blade.html file
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class,'store']);

Route::post('newsletter',[NewsletterController::class,'subscribe']);

Route::middleware('admin')->group(fn() => 
    Route::get('/admin/post/create', [PostController::class,'create']),
);