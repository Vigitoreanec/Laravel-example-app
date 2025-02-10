<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function posts()
    {
        $posts = Post::all();
        $posts = Post::paginate(10);
        // dd($posts);

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }
    public function store(Request $request)
    {
        //валидация должна происходить в контроллере
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'text' => 'required|min:15|max:20000',
            'category_id' => 'required|exists:categories,id'
        ]);

        // DB::table('posts')->insert($validated);
        // $id = DB::getPdo()->lastInsertId();

        try {
            $post = Post::create($validated);
        } catch (\Exception $e) {
            return redirect()->route('admin.posts.create')->with('error', 'Ошибка добавления поста') .
                $e->getMessage();
        }

        //return redirect()->route('posts.show', $id)->with('success', 'Пост успешно добавлен');
        return redirect()->route('admin.posts.index', $post->id)->with('success', 'Пост успешно добавлен');
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories
        ]);
    }

    public function edit(Post $post)
    {

        $categories = Category::all();

        return view('admin.posts.edit', [
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'text' => 'required|min:15|max:20000',
            'category_id' => 'required|exists:categories,id'
        ]);


        $post->fill($validated);

        if ($post->save()) {
            return redirect()->route('posts.show', $post->id)->with('success', 'Пост успешно изменен!');
        }
        return back()->with('error', 'Ошибка изменения поста');
    }

    public function destroy(Post $post)
    {
        
        $post->delete();
        // if ($post->delete()) {
        //     return redirect()->route('admin.posts.index')->with('success', 'Пост успешно удален!');
        // }
        return redirect()->route('admin.posts.index', $post)->with('success', 'Пост успешно удален');
    }
    
}
