<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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

    
    public function categories()
    {
        return view('admin.categories');
    }
}
