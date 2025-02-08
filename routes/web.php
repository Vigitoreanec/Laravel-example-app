<?php

use App\Http\Controllers\admin\IndexController as AdminController;
use App\Http\Controllers\admin\PostController as PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/posts', [PostsController::class, 'index'])->name('posts');

//Route::get('/post/{slug}', [PostsController::class, 'show'])->where('id', '[0-9]+')->name('post');

Route::name('posts.')
    ->prefix('posts')
    ->group(function () {
        Route::get('/{post}', [PostsController::class, 'show'])->where('post', '[0-9]+')->name('show');
        Route::get('/', [PostsController::class, 'index'])->name('index');
    });

Route::name('admin.')
    ->prefix('admin')
    // ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/users', [AdminController::class, 'posts'])->name('users');

        Route::name('posts.')
            ->prefix('posts')
            ->group(function () {
                Route::get('/', [PostController::class, 'posts'])->name('index');
                Route::get('/create', [PostController::class, 'create'])->name('create');
                Route::post('/store', [PostController::class, 'store'])->name('store');
            });

        Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    });

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('index');
