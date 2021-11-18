<?php

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
    return view('posts');
});

Route::get('posts/{post}', function ($slug) {
    /*Get the path to the file from the {post} of the url
    $path = __DIR__ . "/../resources/posts/{$slug}.html";*/

    if(! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
        /*Debug error
        dd('File does not exists.');*/
        /*Debug error
        ddd('File does not exists.');*/
        /*Throw error with code 404
        abort(404);*/
        /*Redirect to the route '/'
        return redirect('/');*/

        return redirect('/');
    }

    /*
    Cache the page for reuse
    Second parameter is in seconds, or using one of the above options:
    now()->AddMinutes()
    now()->AddHour()
    now()->AddDay()
    now()->AddWeeks()
    $post = cache()->remember("posts.{$slug}", now()->addMinutes(0.1), function () use ($path)  {
        
        //Indicates when we are using this function, instead of a cached file
        var_dump('file_get_contents');
        
        //Get the file from the given path
        return file_get_contents($path);
    });*/
    //The arrow form for the function
    $post = cache()->remember("posts.{$slug}", 5, fn() => file_get_contents($path));

    //Return the file to be rendered, with the parameter declared in the post.blade.html file
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');