<?php

namespace App\Models;

class Posts
{
    private $posts = [
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

    public function getPosts()
    {
        return $this->posts;
    }

    public function getPost($id)    //принимаем, либо id, либо слаг
    {
        foreach ($this->posts as $post) {
            if ($post['id'] == $id || $post['slug'] == $id) {
                return $post;
            }
        }
        return null;
    }
}
