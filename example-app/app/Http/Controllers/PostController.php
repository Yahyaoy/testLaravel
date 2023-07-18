<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(5)->withQueryString(),
            // solution of N + 1 problem clockwork -  extension بدل ما نعمل جمل سيليكت كثير بنعمل وحدة وممكن تتحقق من خلال ال
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = \request()->validate([
            'body' => 'required',
            'excerpt' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'title' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

//        $attributes['user_id'] = auth()->user()->id;
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);
        return redirect('/');

    }
}
