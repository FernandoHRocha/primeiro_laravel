<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home() {
        return view('admin.home');
    }

    public function edit() {
        return view('admin.edit', [
            'posts' => auth()->user()->posts()->orderBy('updated_at','asc')->get()
        ]);
    }
}
