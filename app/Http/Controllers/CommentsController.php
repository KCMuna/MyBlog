<?php

namespace App\Http\Controllers;
use App\Models\Reply;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
///////////////////////////////////////////  comment crud starts here
    public function add_comment(Request $request){
        if(Auth::id()){

            $comment = new comment;
            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->save();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
    public function edit_comment(Request $request){
        $id = $request->id;
        $edit=DB::table('comments')->where('id', '=', $id)->first();
        return view('edit_comment', compact('edit'));
    }
    public function comment_update(Request $request){
        if($request->isMethod('get')){
            return redirect()->back();
        }
        if($request->isMethod('post')){        
        $data['comment'] = $request->editcomment;
        $id=$request->criteria;
        
        DB::table('comments')->where('id', '=', $id)->update($data);
        return redirect()->route('index')->with('success','updated successfully');
        }
    }
    public function delete_comment($id)
    {
        $post=Comment::where('id',$id);
        $post->delete();

        return redirect()->back()->with('message','Your reply has been deleted!');

    }
///////////////////////////////////////////  comment crud ends here

///////////////////////////////////////////  reply crud starts here

    public function add_reply(Request $request){
        if(Auth::id()){
            $reply = new reply;
            $reply->name = Auth::user()->name;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;
            $reply->user_id = Auth::user()->id;
            $reply->save();
            return redirect()->back();

        }else{
            return redirect('login');
        }

    }

    public function edit_reply(Request $request){
        $id = $request->id;
        $edit=DB::table('replies')->where('id', '=', $id)->first();
        return view('edit_reply', compact('edit'));
    }
    public function reply_update(Request $request){
        if($request->isMethod('get')){
            return redirect()->back();
        }
        if($request->isMethod('post')){        
        $data['reply'] = $request->editreply;
        $id=$request->criteria;
        
        DB::table('replies')->where('id', '=', $id)->update($data);
        return redirect()->route('index')->with('success','updated successfully');
        }
    }
    public function delete_reply($id)
    {
        $post=Reply::where('id',$id);
        $post->delete();

        return redirect()->back()->with('message','Your reply has been deleted!');

    }
   
///////////////////////////////////////////  reply crud ends here











































    // public function store(Request $request)
    // {
    //        if(Auth::check())
    //        {
    //             $validator=Validator::make($request->all(),[
    //                 'comment_body'=>'required|string'
    //             ]);
    //             if($validator->fails())
    //             {
    //                 return redirect()->back()->with('message','comment is mandatory');
    //             }

    //             $post=Post::where('slug', $request->post_slug)->first();
    //             if($post)
    //             {
    //                 Comment::create([
    //                     'post_id'=>$post->id,
    //                     'user_id'=>Auth::user()->id,
    //                     'comment_body'=>$request->comment_body

    //                 ]);
    //                 return redirect()->back()->with('message','Commented Successfully');

    //             }else
    //             {
    //                return redirect()->back()->with('message','No such post found');
    //             }
    //        } else
    //         {
    //             return redirect('login')->with('message','Login first to comment');
    //         }
    // }
    // public function destroy(Request $request)
    // {
    //     if(Auth::check())
    //     {
    //         $comment = Comment::where('id',$request->comment_id)
    //         ->where('user_id',Auth::user()->id)->first();

    //         if($comment)
    //         {
    //             $comment->delete();
    //             return response()->json([
    //                 'status'=>200,
    //                 'message'=>'Comment Deleted Successfully'
    //             ]);
    //         }else
    //         {
    //             return response()->json([
    //                 'status'=>500,
    //                 'message'=>'Something went wrong'
    //             ]);

    //         }
           

    //     } else
    //     {
    //         return response()->json([
    //             'status'=>401,
    //             'message'=>'Login to Delete this comment'
    //         ]);
    //     }
    // }
}
