<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reply;


use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $comment = comment::orderby('id','desc')->get();
        $reply = reply::all();
        return view('index',compact('comment','reply'))
        ->with('posts',Post::orderBy('updated_at','Desc')->get());
    }
}
