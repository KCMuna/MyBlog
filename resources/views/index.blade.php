@extends('layouts.app')
<!-- CSS only -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Do you want to become a developer?
                </h1>
                <a
                    href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://i.pinimg.com/564x/8a/6b/26/8a6b268403311fe47067f542da1665e5.jpg" width="600" alt="">
        </div>
        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Struggling to be a better Web developer?
            </h2>
            <p class="py-8 text-gray-500 text-s">
                Lorem ipsum dolor sit amet, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suntst eligendi. Consectetur omnis.
            </p>
            <p class="font-extrabold text-gray-600 text-s pb-9">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda natus, ipsa iure a quidem obcaec.
            </p>
            <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text- font-extrabold py-4 px-8 rounded-3xl">
                Find Out More
            </a>
        </div>
    </div>





    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            I'm an expert in...
        </h2>
        <span class="font-extrabold block text-4xl py-1">
            Project Management
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Digital Strategy
        </span>
        <span class="font-extrabold block text-4xl py-1">
           Backend Deelopment
        </span>
        
    </div>
    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>
        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>
        <p class="m-auto w-4/5 text-gray-500">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam consequuntur obcaecati, hic repellendus doloremque 
        </p>

    </div>
    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    PHP
                </span>
                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit saepe, ducimus eum quos mollitia dolore fuga, id repellat facilis quisquam in nostrum magni suscipit perspiciatis pariatur, optio reiciendis dolorum eius!
                </h3>
                <a href="" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>
            </div>
        </div>
        <div>
            <img src="https://i.pinimg.com/564x/d2/0b/36/d20b362a9cf422dd0e056bf32ddde12c.jpg" width="600" alt="">
         </div>
    </div>

    @foreach ($posts as $post)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
        <img src="{{ asset('images/' . $post->image_path) }}" width="600" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{$post->title}}
            </h2>
            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{$post->user->name}}
                </span>, Created on {{ date('jS M Y',strtotime($post->updated_at)) }}
            </span>
           
            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{$post->description}}
            </p>
            <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>
                {{-- likes and dislikes starts --}}
                <div style="margin-left: 45%;">
            @guest
                <i class="fa fa-heart-o"aria-hidden="true"> </i> lily and 4 people like this
            @else
            
                <a href="#" onclick="document.getElementById('like-form-{{ $post->id }}').submit();"><i class="fa fa-heart" aria-hidden="true" style="color:{{ Auth::user()->likedPosts()->where('post_id',$post->id)->count()>0?'red':'' }}" > </i> {{ $post->likedUsers->count() }}</a>
               <p style="font-family: cursive">Total Likes</p>
            
            <form action="{{ route('post.like',$post->id) }}" method="POST" style="display: :none" id="like-form-{{ $post->id }}">
                @csrf
            </form>

    @endguest
            </div>
                {{-- likes and dislikes ends --}}

            {{-- comment and reply system starts --}}
            <div>
                <h1 style="font-size: 25px; padding-top:20px;
                padding-bottom:20px;">Comments</h1>
                <form action="{{ url('add_comment') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                    <textarea style="height: 80px; width:380px; border-radius:5px;" placeholder="comment something here" name="comment"></textarea><br>
                </div>
                <div class="col-md-4">
                    <input style="margin-top:35px;" type="submit" class="btn btn-primary" value="Comment">
                </div>
                </div>
                </form>
            </div>
            <div>
                {{-- <h1 style="font-size: 15px;
                padding-bottom:20px;">All Comments</h1> --}}
                @foreach ($comment as $key=>$comment)
                    <div>
                        <b>{{++$key.'.'}}</b>
                        <b>{{ $comment->name }}</b>
                        <p>{{ $comment->comment }}</p>
                        <a style="color:blue;font-size:14px; opacity:50%; font-style:italic;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>
                        <a style="opacity:50%;font-size:14px; font-style:italic;" href="{{ route('edit_comment').'/'.$comment->id }}">Edit</a>
                        <a style="color:red;opacity:50%; font-size:14px; font-style:italic;" onclick="return confirm('Are you sure you want to delete the comment?')" href="{{route('delete_comment').'/'.$comment->id}}">Delete</a><br>

                        @foreach ($reply as $rep)
                            @if($rep->comment_id==$comment->id)
                                <div style="padding-left: 3%; padding-bottom:10px;">
                                    <b>{{ $rep->name }}</b>
                                    <p>{{ $rep->reply }}</p>
                                    <a style="color: blue opacity:50%;font-size:14px; font-style:italic;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>
                                    <a style="opacity:50%;font-size:14px; font-style:italic;" href="{{ route('edit_reply').'/'.$rep->id }}">Edit</a>
                                    <a style="color:red;opacity:50%; font-size:14px; font-style:italic;" onclick="return confirm('Are you sure you want to delete the comment?')" href="{{route('delete_reply').'/'.$rep->id}}">Delete</a><br>

                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
               

                {{-- reply text box --}}
                
                <div style="display: none" class="replyDiv">
                    <form action="{{ url('add_reply') }}" method="post">
                        @csrf
                    
                        <input type="text" id="commentId" name="commentId" hidden="">
                        <textarea style="height:100px; width:350px;" name="reply" placeholder="write something here"></textarea>

                        <input type="submit" value="reply" class="btn btn-warning ">

                        <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>
                    </form>
                </div>
            </div>

            {{-- comment and reply system ends --}}
           
        </div>
    </div>
@endforeach
@endsection

@section('scripts')

<script type="text/javascript">
    function reply(caller)
    {
        document.getElementById('commentId').value=$(caller).attr('data-Commentid');
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
    }
    function reply_close(caller)
    {
        $('.replyDiv').hide();
    }

    </script>


 {{-- <script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.deleteComment',function(){
            if(confirm('Are you sure you want to delete this comment?'))
            {
                var thisClicked=$(this);
                var comment_id=thisClicked.val();

                $.ajax({
                    type:"Post",
                    url:"/delete-comment",
                    data:{
                        'comment_id':comment_id
                    },
                    success: function (res){
                        if(res.status==200){
                            thisClicked.closest('.comment-container').remove();
                            alert(res.message);
                        }else{
                            
                           alert(res.message);
                            
                        }
                    }

                });
            }
        });

    });
 </script> --}}
 <script>
    document.addEventListener("DOMContentLoaded", function(event) { 
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
@endsection

