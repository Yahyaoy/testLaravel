<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(), // solution of N + 1 problem clockwork -  extension بدل ما نعمل جمل سيليكت كثير بنعمل وحدة وممكن تتحقق من خلال ال
            'categories' => Category::all(),
            'currentCategory' => Post::firstWhere('slug', \request('category'))
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            'post' => $post
        ]);
    }
}
