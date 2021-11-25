<?php

namespace App\Http\Controllers;

use MailchimpMarketing\ApiClient;
use App\Services\Newsletter;

class NewsletterController extends Controller
{

    public function __invoke(Newsletter $newsletter){}

    public function subscribe() {
    
        request()->validate([
            'subscribe' => ['required','email']
        ]);
    
        try {
            $this->newsletter->subscribe(request('subscribe'));
        } catch (\Exception $e) {
            back()->with(['subscribe'=>'O e-mail informado não pode ser adicionado a nossa Newsletter.']);
        }
    
        return redirect('/')->with('success','Você estará por dentro de todas as nossas novidades.');
    }
}
