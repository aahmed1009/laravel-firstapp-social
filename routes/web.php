<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllerResource;


use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('ID/{id}', function ($id) {
        echo $id;
});
Route::get('AgeRoute', function() {
    echo " <br> called page <br>";
})->middleware('age:13');

Route::resource('User',UserControllerResource::class);
Auth::routes();
Route::resource('posts', PostController::class);
Route::patch('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::resource('posts.comments', CommentController::class)->shallow();



Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');