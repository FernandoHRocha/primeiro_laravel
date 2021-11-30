<?php

use App\Http\Controllers\AdminController;
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

Route::middleware('can:admin')->group(fn() =>
    Route::resource('post', AdminController::class)
    /*Route::get('dashboard',[AdminController::class,'home']),
    Route::post('post/create', [AdminController::class,'store']),
    Route::get('post/create', [AdminController::class,'create']),
    Route::get('post/{post}/edit',[AdminController::class,'edit']),
    Route::patch('post/{post}',[AdminController::class,'update']),
    Route::delete('post/{post}',[AdminController::class,'destroy']),
    Route::get('post/list',[AdminController::class,'list']),*/
);