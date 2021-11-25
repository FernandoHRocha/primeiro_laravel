<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    protected $with = ['category','author','comments'];

    //Creating a relation with the Category table
    public function category() {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    //Custom route key name
    //https://laravel.com/docs/8.x/routing#customizing-the-default-key-name
    public function getRouteKeyName() {
        return 'slug';
    }

    /**
     * Retorna se o estado do post é publicado ou atualizado
     */
    public function getStatusAttribute() {
        return $this->created_at == $this->updated_at ? 'Publicado' : 'Atualizado';
    }

    /**
     * Retorna a data de criação/atualização formatada no padrão hora:minuto data/mes/ano
     */
    public function getPostedAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('H:i d/n/Y');
    }

    /**
     * Retorna a somatória de comentários que a postagem possui
     */
    public function getCountCommentsAttribute() {
        return count($this->comments);
    }

    public function scopeFilter($query, array $filters) {

        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where(
                fn($query) =>
                    $query
                        ->where('title','like','%' . $search . '%')
                        ->orWhere('body','like','%' . $search .'%')
            );
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            $query
                ->whereHas('category', fn($query) => 
                    $query
                        ->where('slug', $category)
            /*
                ->whereExists(fn($query) =>
                    $query->from('categories')
                        //whereColumn -> to search for category_id column of the posts table
                        ->whereColumn('categories.id','posts.category_id')
                        //where -> to search for a specific value of $category
                        ->where('categories.slug',$category)
                );
            */
            );
        });

        $query->when($filters['author'] ?? false, function($query, $author) {
            $query
                ->whereHas('author', fn($query) =>
                    $query
                        ->where('slug',$author)
                );
            }
        );
    }
}
