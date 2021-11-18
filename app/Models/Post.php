<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {

    public static function find($slug) {

        /*Get the path to the file from the {post} of the url
        $path = __DIR__ . "/../resources/posts/{$slug}.html";*/

        /*Get the path to the file from the {post} of the url with the resource_path function
        $path = resource_path("posts/{$slug}.html")*/

        if(! file_exists($path = resource_path("posts/{$slug}.html"))) {
            /*Debug error
            dd('File does not exists.');*/
            /*Debug error
            ddd('File does not exists.');*/
            /*Throw error with code 404
            abort(404);*/
            /*Redirect to the route '/'
            return redirect('/');*/
            
            throw new ModelNotFoundException();

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
        return cache()->remember("posts.{$slug}", 5, fn() => file_get_contents($path));
    }

    public static function all () {
        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }
}