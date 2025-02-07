<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function posts()
    {
        
        return view('admin.posts.index');
    }

    public function categories()
    {
        return view('admin.categories');
    }

    public function create()
    {
        return view('admin.posts.create');
    }
}
