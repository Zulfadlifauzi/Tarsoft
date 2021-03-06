<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/user', function(){
    $users = \App\Models\User::with('posts')->get();

return view('users.index',compact('users'));

});
Route::get('/posts', function(){
    // $tag =\App\Models\Tag::first();
    $post =\App\Models\Post::with('tags')->first();
    // $post ->tags()->detach();
    $post ->tags()->sync([1,4]);

    // dd($post);

    $posts=\App\Models\Post::with(['user','tags'])->get();
    return view('posts.index',compact('posts'));
});

Route::get('/tags', function(){
    $tags =\App\Models\Tag::with('posts')->get();
    return view('tags.index',compact('tags'));
});

Route::resource("projects", ProjectController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

