<?php

use App\Http\Controllers\PostsController;
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
})->name('home');

Route::get('/posts', [PostsController::class, 'index'])->name('posts');

Route::get('/post/{slug}', [PostsController::class, 'show'])->where('id', '[0-9]+')->name('post');

Route::name('posts.')
    ->prefix('posts')
    ->group(function () {
        Route::get('/{id}', [PostsController::class, 'show'])->where('id', '[0-9]+')->name('post');
        Route::get('/', [PostsController::class, 'index'])->name('posts');
    });
