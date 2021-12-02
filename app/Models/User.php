<?php

namespace App\Models;

use App\Casts\UserCast;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime:d/n/Y H:i',
        'updated_at' => 'datetime:d/n/Y H:i',
        'email_verified_at' => 'datetime:d/m/Y H:i'
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function getNameAttribute($name) {
        return ucwords($name);
    }

    public function getPostCountAttribute() {
        return count($this->posts);
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = strtoLower(trim($name));
        $this->attributes['slug'] = str_replace('.','',str_replace(' ','-',strtoLower(trim($name))));
    }
}
