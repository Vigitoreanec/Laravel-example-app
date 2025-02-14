<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

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

    public function edit(Category $category)
    {

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:255',
        ]);

        $category->fill($validated);
        if ($category->save()) {
            return redirect()->route('posts.show', $category->id)->with('success', 'Категория успешно изменена!');
        }
        return back()->with('error', 'Ошибка изменения Категории');
    }

    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно удалена!');
        }
        return redirect()->route('admin.categories.index', $category)->with('error', 'Категория не удалена');
    }
}
