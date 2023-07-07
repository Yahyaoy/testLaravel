<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return Post::find('my-first-post');
    return view('posts', [
        'posts' => Post::with('category')->get() // solution of N + 1 problem clockwork -  extension بدل ما نعمل جمل سيليكت كثير بنعمل وحدة وممكن تتحقق من خلال ال
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post',[
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category){
   return view('posts', [
      'posts' => $category->posts
   ]);
});
