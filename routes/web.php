<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

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
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::resource('/blog', PostsController::class);
//authentication route
Auth::routes();

//comment sytsem

Route::post('/add_comment', [CommentsController::class, 'add_comment']);
Route::get('/delete_comment/{id?}', [CommentsController::class, 'delete_comment'])->name('delete_comment');
Route::get('/edit_comment/{id?}', [CommentsController::class, 'edit_comment'])->name('edit_comment');
Route::any('/edit-action-comment',[CommentsController::class,'comment_update'])->name('edit-action-comment');

Route::post('/add_reply', [CommentsController::class, 'add_reply']);
Route::get('/delete_reply/{id?}', [CommentsController::class, 'delete_reply'])->name('delete_reply');
Route::get('/edit_reply/{id?}', [CommentsController::class, 'edit_reply'])->name('edit_reply');
Route::any('/edit-action-reply',[CommentsController::class,'reply_update'])->name('edit-action-reply');


//like system
Route::post('/like-post/{post}', [PostsController::class, 'likePost'])->name('post.like')->middleware('auth');

