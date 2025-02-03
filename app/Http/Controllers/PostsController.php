<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

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

        return view('post', [
            'post' => $post
        ]);
    }
}
