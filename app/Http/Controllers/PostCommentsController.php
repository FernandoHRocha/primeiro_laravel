<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostCommentsController extends Controller
{
    public function store(Post $post) {

        $validator = Validator::make(request()->all(),[
            'body' => ['required','max:255','min:1']
        ]);

        if($validator->fails()) {
            throw ValidationException::withMessages(['comment'=>'Seu comentário não pode estar em branco nem exceder 255 caracteres.']);
        }
        
        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success','Obrigado por contribuir com a comuna.');
    }
}
