<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function authors() {
        return response()->json( DB::table('users')
                        ->join('posts','users.id','=','posts.user_id')
                        ->select('users.id','users.name','users.email',DB::raw('count(posts.user_id) as post_count'))
                        ->groupBy('users.id','users.name','users.email')
                        ->get()
            , 200);
    }

    public function users() {
        return response()->json( DB::table('users')
                    ->join('comments','users.id','=','comments.user_id')
                    ->select(
                        'users.id',
                        'users.name',
                        'users.email',
                        DB::raw('count(comments.user_id) as comments_count')
                        )
                    ->groupBy('users.id','users.name','users.email')
                    ->get()
            , 200);
    }

    public function posts() {
        return response()->json( DB::table('posts')
                    ->join('comments','comments.post_id','=','posts.id')
                    ->select(
                        'posts.id',
                        'posts.title',
                        DB::raw('(case when datediff(posts.updated_at, posts.created_at) > 0 then "updated" else "created" end) as status'),
                        DB::raw("(case when datediff(posts.updated_at, posts.created_at) < 0 then posts.updated_at else posts.created_at end) as updated"),
                        DB::raw("count(comments.id) as comments")
                    )
                    ->orderBy('posts.id','asc')
                    ->groupBy('posts.id','posts.title','status','updated')
                    ->get()
            , 200);
    }

    public function topPosts() {
        return response()->json( DB::table('posts')
                    ->join('comments','comments.post_id','=','posts.id')
                    ->select(
                        'posts.id',
                        'posts.title',
                        DB::raw('(case when datediff(posts.updated_at, posts.created_at) > 0 then "updated" else "created" end) as status'),
                        DB::raw("(case when datediff(posts.updated_at, posts.created_at) < 0 then posts.updated_at else posts.created_at end) as updated"),
                        DB::raw('count(comments.id) as comments')
                    )
                    ->orderBy('comments','desc','updated','desc')
                    ->groupBy('posts.id', 'posts.title', 'status', 'updated')
                    ->get()
            , 200);
    }
}
