<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $touches = ['post'];

    public function post() {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function author() {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * Retorna se o estado do comentário é Comentado ou Editado
     */
    public function getStatusAttribute() {
        return $this->created_at == $this->updated_at ? 'Comentado' : 'Editado';
    }

    public function getPostedAttribute($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d/n/Y H:i');
    }
}
