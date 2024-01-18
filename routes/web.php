<?php

use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Services\Newsletter;
use \Illuminate\Validation\ValidationException;


Route::post('/newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}',  [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/login', [SessionsController::class, 'store']);

});
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin');




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
