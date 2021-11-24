<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::post('newsletter',function() {
    
    request()->validate([
        'email' => ['required','email']
    ]);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us20'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('514af6fb09',[
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    } catch (\Exception $e) {
        throw \Illuminate\Validation\ValidationException::withMessages(['email'=>'O e-mail informado não pode ser adicionado a nossa Newsletter.']);
    }

    return redirect('/')->with('success','Você estará por dentro de todas as nossas novidades.');
});

Route::get('/',[PostController::class, 'index'])->name('home');

//Return the file to be rendered, with the parameter (post) declared in the post.blade.html file
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class,'store']);

Route::middleware('guest')->group( fn() => 
    Route::get('/register', [RegisterController::class, 'create']),
    Route::post('/register', [RegisterController::class, 'store']),
    Route::get('/login', [SessionsController::class, 'create']),
    Route::post('/login', [SessionsController::class, 'store']),
);

Route::middleware('auth')->group( fn() => 
    Route::get('/logout', [SessionsController::class, 'destroy']),
);