<?php

use Illuminate\Support\Facades\Route;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/posts', function () {
    return view('posts')
        ->with('posts', [
            [
                'id' => 1,
                'title' => 'Post 1',
                'text' => 'text Post 1'
            ],
            [
                'id' => 2,
                'title' => 'Post 2',
                'text' => 'text Post 2'
            ],
            [
                'id' => 3,
                'title' => 'Post 3',
                'text' => 'text Post 3'
            ]
        ]);
});

Route::get('/post/{id}', function (string $id) {
    return view('post')
        ->with('post', [
            'title' => 'title' . $id,
            'text' => 'text' . $id
        ]);
});
