<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get()->toArray();
        // dd($posts);
        
        return view('admin.index',[
            'posts' => $posts
        ]);
    }

    public function posts()
    {
        $posts = DB::table('posts')->get()->toArray();
        // dd($posts);
        $posts = Post::paginate(10);
        
        return view('admin.posts.index',[
            'posts' => $posts
        ]);
    }

    public function categories()
    {
        return view('admin.categories');
    }

    public function store(Request $request) 
    {
        //валидация должна происходить в контроллере
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'text' => 'required|min:15|max:20000',
        ]);

        DB::table('posts')->insert($validated);
        $id = DB::getPdo()->lastInsertId();



        //return redirect()->route('posts.show', $id)->with('success', 'Пост успешно добавлен');
        return redirect()->route('admin.posts.index', $id)->with('success', 'Пост успешно добавлен');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function delete()
    {
        return view('admin.posts.delete');
    }
}
