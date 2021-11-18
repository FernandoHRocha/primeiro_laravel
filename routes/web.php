<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {
    
    //Get the file of the post from the model Post
    $post = Post::find($slug);

    //Return the file to be rendered, with the parameter (post) declared in the post.blade.html file
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');