<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class PostsController extends Controller
{
    public function index(Posts $posts)
    {

        $posts = $posts->getPosts();

        return view('posts', [
            'posts' => $posts
        ]);
    }

    public function show(Posts $posts, string $id)
    {
        $post = $posts->getPost($id);

        if(!$post)
        {
           abort(404,"НЕт такого поста!");
        }
        return view('post', [
            'post' => $post
        ]);
    }
}
