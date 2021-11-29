<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function index() {

        return view('post.index', [
            'posts' => Post::latest('updated_at')->filter(request(['search','category','author']))->simplePaginate(6)->withQueryString(),
            'authors' => User::all()
        ]);
    }

    public function show(Post $post) {

        return view('post.post', [
            'post' => $post
        ]);
    }
}
