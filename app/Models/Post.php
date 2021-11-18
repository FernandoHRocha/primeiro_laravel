<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {

    public $title;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $date, $body, $slug)
    {
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all () {
        return collect(File::files(resource_path("posts")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($document) => new Post(
                $document->title,
                $document->date,
                $document->body(),
                $document->slug)
            )
        ->sortByDesc('date');
    }

    public static function find($slug) {
        $post = static::all()->firstWhere('slug',$slug);

        if(! $post) {
            throw new ModelNotFoundException;
        }

        return $post;
    }

}