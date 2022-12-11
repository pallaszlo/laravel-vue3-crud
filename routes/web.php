<?php

use Illuminate\Support\Facades\Route;

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

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [\App\Http\Controllers\PostController::class, 'create']);
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);
Route::post('posts/store', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::delete('posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy']);

/*
Route::get('posts', function (){
   $posts = \App\Models\Post::all();
   //print_r($posts);
    foreach ($posts as $post){
        echo $post->title . "<br>";
    }
});

Route::get('posts/{id}', function ($id){
   echo \App\Models\Post::find($id);
});
*/
