<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PagesController::class, 'index']);
Route::resource('/blog', PostsController::class);
//authentication route
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//comment sytsem
Route::post('comments', [\App\Http\Controllers\CommentsController::class, 'store']);
Route::post('delete-comment', [\App\Http\Controllers\CommentsController::class, 'destroy']);

Route::post('/add_comment', [PostsController::class, 'add_comment']);
Route::post('/add_reply', [PostsController::class, 'add_reply']);
Route::get('/delete_comment/{id?}', [PostsController::class, 'delete_comment'])->name('delete_comment');
Route::get('/delete_reply/{id?}', [PostsController::class, 'delete_reply'])->name('delete_reply');

Route::post('/like-post/{$post}', [HomeController::class, 'likePost'])->name('post.like')->middleware('auth');
