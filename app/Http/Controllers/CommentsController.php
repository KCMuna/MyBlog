<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
           if(Auth::check())
           {
                $validator=Validator::make($request->all(),[
                    'comment_body'=>'required|string'
                ]);
                if($validator->fails())
                {
                    return redirect()->back()->with('message','comment is mandatory');
                }

                $post=Post::where('slug', $request->post_slug)->first();
                if($post)
                {
                    Comment::create([
                        'post_id'=>$post->id,
                        'user_id'=>Auth::user()->id,
                        'comment_body'=>$request->comment_body

                    ]);
                    return redirect()->back()->with('message','Commented Successfully');

                }else
                {
                   return redirect()->back()->with('message','No such post found');
                }
           } else
            {
                return redirect('login')->with('message','Login first to comment');
            }
    }
    public function destroy(Request $request)
    {
        if(Auth::check())
        {
            $comment = Comment::where('id',$request->comment_id)
            ->where('user_id',Auth::user()->id)->first();

            if($comment)
            {
                $comment->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Comment Deleted Successfully'
                ]);
            }else
            {
                return response()->json([
                    'status'=>500,
                    'message'=>'Something went wrong'
                ]);

            }
           

        } else
        {
            return response()->json([
                'status'=>401,
                'message'=>'Login to Delete this comment'
            ]);
        }
    }
}
