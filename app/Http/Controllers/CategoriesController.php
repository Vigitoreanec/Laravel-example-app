<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();


        //dd($posts);
        //$category = Category::query()->with('posts')->find($id);


        return view('admin.categories.show', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
