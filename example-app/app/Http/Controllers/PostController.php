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
            'posts' => Post::latest()->filter(request(['search']))->get(), // solution of N + 1 problem clockwork -  extension بدل ما نعمل جمل سيليكت كثير بنعمل وحدة وممكن تتحقق من خلال ال
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            'post' => $post
        ]);
    }
}
