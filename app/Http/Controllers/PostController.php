<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{

    public function index() {

        return view('post.index', [
            'posts' => Post::latest('created_at')->filter(request(['search','category','author']))->get(),
            'authors' => User::all()
        ]);
    }

    public function show(Post $post) {

        return view('post.post', [
            'post' => $post
        ]);
    }
}
