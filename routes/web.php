<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}',  [PostController::class, 'show']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);


//Route::get('/categories/{category:slug}', function (Category $category){
//    return view('posts', [
//        'posts' => $category->posts->load(['category', 'user']),
//        'currentCategory' => $category,
//        'categories' => Category::all()
//
//    ]);
//});


//Route::get('/users/{user:username}', function (User $user){
//    return view('posts.index', [
//        'posts' => $user->posts->load(['category', 'user']),
////        'categories' => Category::all()
//
//    ]);
//});
