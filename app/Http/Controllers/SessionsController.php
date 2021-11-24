<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {

        $attributes = request()->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255']
        ]);

        if(!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['login'=>'Credenciais não autorizadas.']);
        }

        //session fixation
        session()->regenerate();

        return redirect('/')->with('success','Bem vindo '. auth()->user()->name .'.');
    }

    public function destroy() {

        $name = auth()->user()->name;

        auth()->logout();

        return redirect('/')->with('success','Até a próxima '. $name .'.');
    }
}
