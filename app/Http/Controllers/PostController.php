<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){

        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(2)->withQueryString(),
//        'categories' => Category::all(),
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(){
//        ddd(request()->file('thumbnail'));
//        request()->file('thumbnail')->store('thumbnails');
        $attributes = request()->validate([

            'title' => 'required',
            'thumbnail'=> 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);

        return redirect('/admin/posts/create');
    }

}
