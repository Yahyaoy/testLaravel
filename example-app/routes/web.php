<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
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
Route::post('newsletter', function (Request $request){
    $request->validate(['email' => 'required|email']);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us11',
    ]);

    try {
        $response = $mailchimp->lists->addListMember('af6fbc9e68', [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    } catch (\Exception $e) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }
    return redirect('/')->with('success', 'You are now signed up for our newsletter!');

});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}',[PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [SessionController::class, 'create']);
Route::post('login', [SessionController::class, 'store']);
Route::post('logout', [SessionController::class, 'destroy']);

