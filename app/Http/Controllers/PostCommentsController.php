<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostCommentsController extends Controller
{
    public function store(Post $post) {

        $validate = Validator::make(request()->all(),[
            'body' => ['required','max:255','min:5']
        ]);

        if($validate->fails()){
            throw ValidationException::withMessages(['comment','Ocorreu um erro, certifique que seu comentário possui entre 5 e 255 caracteres.']);
        }

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success','Obrigado por contribuir com a comuna.');
    }
}
