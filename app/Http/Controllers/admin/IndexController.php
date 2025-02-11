<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // dd($posts);

        return view('admin.index', [
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

    public function categories()
    {
        $categories = Category::all();
        
        return view('admin.categories', [
            'categories' => $categories
        ]);
    }
}
