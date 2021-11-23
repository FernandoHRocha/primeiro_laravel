<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class AuthorDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.author-dropdown', [
            'authors' => User::all(),
            'currentAuthor' => User::firstWhere('slug',request('author'))
        ]);
    }
}
