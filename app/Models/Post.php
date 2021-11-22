<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; //Post::factory()->create()

    //https://laravel.com/docs/8.x/eloquent#mass-assignment-json-columns
    //For security, we can't make mass assignment to the models.

    //$fillable is used to make mass assignment with JSON column => value
    //this will ignore properties that are not declared in $fillable
    protected $fillable = ['title','slug','excerpt','body','category_id'];

    //Guarded is the reverse of fillable. If fillable specifies which fields to be mass assigned, guarded specifies which fields are not mass assignable.
    //If the array are blank, you don't have control of the assignment of the models.
    protected $guarded = ['id'];

    //Creating a relation with the Category table
    public function category() {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    //Custom route key name
    //https://laravel.com/docs/8.x/routing#customizing-the-default-key-name
    public function getRouteKeyName() {
        return 'slug';
    }
}
