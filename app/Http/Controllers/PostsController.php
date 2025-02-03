<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'slug' => 'first_post',
                'title' => 'Post 1',
                'text' => 'text Post 1'
            ],
            [
                'id' => 2,
                'slug' => 'second_post',
                'title' => 'Post 2',
                'text' => 'text Post 2'
            ],
            [
                'id' => 3,
                'slug' => 'third_post',
                'title' => 'Post 3',
                'text' => 'text Post 3'
            ]
        ];
        return view('posts', [
            'posts' => $posts
        ]);
    }

    public function show(string $id)
    {
        $post = [
            'id' => $id,
            'title' => 'Title' . $id,
            'text' => 'text title' . $id
        ];
        return view('post', [
            'post' => $post
        ]);
    }
}
