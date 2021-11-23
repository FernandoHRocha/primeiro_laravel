<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/',[PostController::class, 'index'])->name('home');

//Return the file to be rendered, with the parameter (post) declared in the post.blade.html file
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('categories/{category}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'authors' => User::all(),
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('/authors/{author:slug}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all(),
        'currentAuthor' => $author,
        'authors' => User::all()
    ]);
})->name('author');