<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class PostsController extends Controller
{
    public function index(Posts $posts)
    {

        //$posts = $posts->getPosts();

        $posts = DB::table('posts')->get()->toArray();
        // dd($posts);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show( string $id)
    {
        $post = DB::table('posts')->where('id',$id)->first();

        if(!$post)
        {
           abort(404,"НЕт такого поста!");
        }
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
