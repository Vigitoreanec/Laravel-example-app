<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Client\Request;

class CategoryController extends Controller
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
        //dd($category);
        //$posts = Post::all()->where('category_id', $category);
        $posts = $category->posts;

        //dd($posts);
        //$category = Category::find($id);


        return view('admin.categories.show', [
            'posts' => $posts,
            'categories' => $category
        ]);
    }

    public function store(Request $request)
    {
        //валидация должна происходить в контроллере
        $validated = $request->validate([
            'name' => 'required|min:5|max:255',
        ]);

        try {
            $category = Category::create($validated);
        } catch (\Exception $e) {
            return redirect()->route('admin.categories.create')->with('error', 'Ошибка добавления категории') .
                $e->getMessage();
        }

        //return redirect()->route('posts.show', $id)->with('success', 'Пост успешно добавлен');
        return redirect()->route('admin.categories.index', $category)->with('success', 'Категория успешно добавлена');
    }

    public function create()
    {
        
        return view('admin.categories.create');
    }

    public function edit()
    {



        return view('admin.categories.edit');
    }
}
