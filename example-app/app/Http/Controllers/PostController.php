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
//        return Post::latest()->filter(
//          request(['search', 'category', 'author'])
//        )->paginate(6)
//        ;

        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(5)->withQueryString(),
            // solution of N + 1 problem clockwork -  extension بدل ما نعمل جمل سيليكت كثير بنعمل وحدة وممكن تتحقق من خلال ال
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post
        ]);
    }
}
