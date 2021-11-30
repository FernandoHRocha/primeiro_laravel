<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function home() {
        return view('admin.home');
    }

    public function list() {
        return view('admin.list_post', [
            'posts' => Post::with('author')->where('user_id',auth()->user()->id)->orderBy('updated_at','DESC')->get()
        ]);
    }

    public function create() {
        return view('admin.create');
    }

    public function store() {
        $attributes = request()->validate(
            [
                'title'=>['required','min:5', Rule::unique('posts','title')],
                'thumbnail'=>['image'],
                'excerpt'=>['required','min:5'],
                'body'=>['required','min:5'],
                'category_id'=>['required', Rule::exists('categories','id')]
            ]
        );

        $attributes['user_id'] = auth()->id();

        if(request('thumbnail') != null) {
            $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        }

        $post = Post::create($attributes);

        return redirect($post->path)->with('success','Sua nova publicação está pronta. Olha como ficou.');
    }

    public function edit(Post $post) {
        return view('admin.edit_post', ['post' => $post]);
    }

    public function update(Post $post) {

        $attributes = request()->validate(
            [
                'title'=>['required','min:5', Rule::unique('posts','title')->ignore($post->id)],
                'thumbnail'=>['image'],
                'excerpt'=>['required','min:5'],
                'body'=>['required','min:5'],
                'category_id'=>['required', Rule::exists('categories','id')]
            ]
        );

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumnails');
        }

        $post->update($attributes);

        return redirect($post->path)->with('success','Sua postagem foi modificada com sucesso.');

    }

    public function destroy(Post $post) {

        $post->delete();

        return back()->with('success','A postagem foi excluida com sucesso.');
    }
}
