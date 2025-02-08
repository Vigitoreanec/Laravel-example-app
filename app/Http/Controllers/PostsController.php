<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class PostsController extends Controller
{
    public function index()
    {

        //1)//$posts = $posts->getPosts();

        //2)//$posts = DB::table('posts')->get()->toArray();
        // dd($posts);

        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        // $post = DB::table('posts')->where('id',$id)->first();
        // if(!$post)
        // {
        //    abort(404,"НЕт такого поста!");
        // }
        //$post = Post::query()->firstOrFail($id);
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
