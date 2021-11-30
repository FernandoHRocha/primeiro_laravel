<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home',[
            'posts' => Post::where('user_id',auth()->user()->id)->get(),
            'categories' => Category::get(),
            'comments' => Comment::where('user_id',auth()->user()->id)->count()
        ]);
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

        $post = Post::create(
            array_merge(
                $this->validatePost(),[
                    'user_id' => auth()->user()->id,
                    'thumbnail' => request()->file('thumbnail')?->store('thumbnails')
                    ]
                )
            );

        return redirect($post->path)->with('success','Sua nova publicação está pronta. Olha como ficou.');
    }

    public function edit(Post $post) {
        return view('admin.edit_post', ['post' => $post]);
    }

    public function update(Post $post) {

        $post->update(
            array_merge(
                $this->validatePost($post),
                [
                    'thumbnail'=>request()->file('thumbnail')?->store('thumbnails')
                ]
            )
        );
        return redirect($post->path)->with('success','Sua postagem foi modificada com sucesso.');
    }

    public function destroy(Post $post) {

        $post->delete();

        return back()->with('success','A postagem foi excluida com sucesso.');
    }

    protected function validatePost(?Post $post = null): array {

        return request()->validate([
            'title'=>['required', 'min:5', Rule::unique('posts','title')->ignore($post)],
            'thumbnail'=> ['image'],
            'excerpt'=>['required','min:5'],
            'body'=>['required'],
            'category_id'=>['required', Rule::exists('categories','id')]
        ]);
    }
}