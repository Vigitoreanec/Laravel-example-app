<?php

namespace App\Http\Controllers;

use App\Models\Post;


class PostsController extends Controller
{
    public function index()
    {

        //1)//$posts = $posts->getPosts();

        //2)//$posts = DB::table('posts')->get()->toArray();
        // dd($posts);

        $posts = Post::paginate(10);
        
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
