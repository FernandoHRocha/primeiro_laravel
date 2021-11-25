<?php

namespace App\Http\Controllers;

use App\Service\Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Newsletter $newsletter) {
    
        request()->validate([
            'subscribe' => ['required','email']
        ]);
    
        try {
            $newsletter->subscribe(request('subscribe'));
        } catch (\Exception $e) {
            back()->with(['subscribe'=>'O e-mail informado não pode ser adicionado a nossa Newsletter.']);
        }
    
        return redirect('/')->with('success','Você estará por dentro de todas as nossas novidades.');
    }
}
