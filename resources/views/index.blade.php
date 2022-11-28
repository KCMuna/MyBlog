@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
            <div class="comment-area mt-4">

            @if(session('message'))
                <h6 class="alert alert-warning mb-3">{{session('message')}}</h6>
            @endif
                <div class="card card-body">
                    <h6 class="card-title">Leave a comment
                    </h6>
                    <form action="{{url ('comments') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                        <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                        <button type="submit" class="btn btn-primary mt-3">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            @forelse($post->comments as $comment)

            <div class="comment-container card card-body shadow-sm mt-3">
                <div class="detail-area">
                    <h6 class="user-name mb-1">
                        @if($comment->user)
                            {{ $comment->user->name }}
                        @endif
                        <small class="ms-3 text-primary">Commented on: {{ $comment->created_at->format('d-m-Y')}}</small>
                    </h6>
                    <p class="user-comment mb-1">
                        {!! $comment->comment_body !!}        
                    </p>
                </div>
                @if(Auth::check() && Auth::id()==$comment->user_id)
                <div>
                    <!-- <a href="" class="btn btn-primary btn-sm me-2">Edit</a> -->
                    <button type="button" value="{{$comment->id}}" class="deleteComment btn btn-danger btn-sm me-2">Delete</button>
                </div>
                @endif
            </div>
            @empty
            <h6>NO Comments Yet</h6>
            @endforelse
        </div>
    </div>
@endforeach
@endsection

@section('scripts')

 <script>
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
 </script>
@endsection

