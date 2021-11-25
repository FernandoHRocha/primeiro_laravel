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
            'posts' => Post::latest('created_at')->filter(request(['search','category','author']))->simplePaginate(6)->withQueryString(),
            'authors' => User::all()
        ]);
    }

    public function show(Post $post) {

        return view('post.post', [
            'post' => $post
        ]);
    }

    public function store(){
        $attributes = request()->validate([
            'title' => ['required','min:5', Rule::unique('posts','title')],
            'excerpt' => ['required','min:5'],
            'body' => ['required','min:5'],
            'category_id' => ['required', Rule::exists('categories','id')]
        ]);

        $attributes['user_id'] = auth()->id();

        $post = Post::create($attributes);

        return redirect('/posts' . '/' . $post->slug)->with('success','Parabéns, sua nova publicação está pronta.');
    }

    public function create() {
        return view('post.create');
    }
}
