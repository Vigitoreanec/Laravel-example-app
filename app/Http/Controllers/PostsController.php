<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


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

    public function addLike(string $id)
    {
        
        // $post->likes+=1;
        // $post->save();
        $post = Post::find($id);

        if ($post) {
            $post->increment('likes');

            return response()->json([
                'success' => true,
                'message' => 'Лайк успешно поставлен',
                'likes' => $post->likes
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Пост не найден',
        ], 404);
    }
}
