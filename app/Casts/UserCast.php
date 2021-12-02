<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use App\Models\User;
use App\Models\Post;

class UserCast implements CastsAttributes {

    public function get($model, string $key, $value, array $attributes) {
        //return $attributes['post_count'] = Post::where('user_id',$attributes['id'])->count();
        //($attributes, $key, $value);
    }

    public function set($model, string $key, $value, array $attributes) {
        return $this->$attributes['post_count'] = Post::where('user_id',$attributes['id'])->count();
        //$value = Post::where('user_id',$attributes['id'])->count();
    }
}