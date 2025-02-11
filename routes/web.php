<?php

use App\Http\Controllers\admin\IndexController as AdminController;
use App\Http\Controllers\admin\PostController as PostController;
use App\Http\Controllers\CategoryController;
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
    ->middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/users', [AdminController::class, 'posts'])->name('users');
        Route::get('/categories', [AdminController::class, 'categories'])->name('categories');

        Route::name('categories.')
            ->prefix('category')
            ->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
                Route::get('/create', [CategoryController::class, 'create'])->name('create');
                Route::post('/store', [CategoryController::class, 'store'])->name('store');
                Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
                Route::put('/edit/{category}', [CategoryController::class, 'update'])->name('update');
            });


        Route::name('posts.')
            ->prefix('posts')
            ->group(function () {
                Route::get('/', [PostController::class, 'posts'])->name('index');
                Route::get('/create', [PostController::class, 'create'])->name('create');
                Route::post('/store', [PostController::class, 'store'])->name('store');
                Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
                Route::put('/edit/{post}', [PostController::class, 'update'])->name('update');
                Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
            });
    });
// Route::name('categories.')
//     ->prefix('categories')
//     ->group(function () {
//         Route::get('/index', [CategoriesController::class, 'index'])->name('index');
//         Route::get('/show', [CategoriesController::class, 'show'])->name('show');
//         //         //Route::get('/show/{categories}', [CategoriesController::class, 'show'])->name('show');
//         //     });
//     });

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('index');
