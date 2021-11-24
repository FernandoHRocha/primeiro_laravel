<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Auth\Authenticatable;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {

        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'min:3', Rule::unique('users','name')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users','email')],
            'password' => ['required', 'max:255', 'min:5']
        ]);

        $user = User::Create($attributes);

        auth()->login($user);

        return redirect('/?author='.$user['slug'])->with('success','Agora você é um membro da nossa comuna.');
    }
}
