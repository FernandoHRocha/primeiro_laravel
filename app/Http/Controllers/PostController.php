<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{

    public function index() {

        return view('posts', [
            'posts' => Post::latest('created_at')->filter(request(['search','category']))->get(),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug',request('category')),
            'authors' => User::all()
        ]);
    }

    public function show(Post $post) {

        return view('post', [
            'post' => $post
        ]);
    }
}
