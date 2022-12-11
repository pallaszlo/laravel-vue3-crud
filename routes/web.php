<?php

use App\Http\Controllers\ProfileController;
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
Route::get('posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);
Route::post('posts/store', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('posts/edit/{post}', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/edit/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
