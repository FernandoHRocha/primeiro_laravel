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
                    ->select('users.id','users.name','users.email',DB::raw('count(comments.user_id) as comments_count'))
                    ->groupBy('users.id','users.name','users.email')
                    ->get()
            , 200);
    }

    public function posts() {
        return response()->json( DB::table('posts')
                    ->select('posts.title','posts.count_comments')
                    ->get()
            , 200);
    }
}
