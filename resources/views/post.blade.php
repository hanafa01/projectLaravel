@extends('layouts.blog-post')

@section('content')
                    <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo ? $post->photo->file : "http://placehold.it/900x300"}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{{$post->body}}</p>
                <hr>

                <!-- Blog Comments -->
                @if (Session::has('commentMessage'))
                    <div class="alert alert-success">
                        {{Session('commentMessage')}}
                    </div>
                @endif
                <!-- Comments Form -->
                @if (Auth::user())
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <div class="form-group">
                        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
                            {!! Form::hidden('post_id',$post->id)!!}
                            {!! Form::textarea('comment','',['class'=>'form-control','rows'=>'3']) !!}
                            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                @endif

                <hr>

                <!-- Posted Comments -->
                @if (count($comments) > 0)
                @foreach ($comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="40" width="40" class="media-object" src="{{$comment->photo}}" alt="">
                    </a> 
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        <p>{{$comment->body}}</p>
                        @if(count($comment->replies) > 0)
                        @foreach ($comment->replies as $reply)
                        @if ($reply->is_active == 1)
                            <div id="nested-comment" class="media">
                                <a class="pull-left" href="#">
                                    <img width="40" height="40" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    <p>{{$reply->body}}</p>
                                </div>
                            </div>
                        @endif
                        @endforeach
                        @endif
                        <div class="comment-reply-container">
                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                            <div class="comment-reply">
                                    {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@store']) !!}
                                        {!! Form::hidden('comment_id',$comment->id)!!}
                                        {!! Form::label('body','Body: ')!!}
                                        {!! Form::textarea('comment','',['class'=>'form-control','rows'=>'1']) !!}
                                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

@endsection




@section('content2')
                    <!-- Blog Search Well -->
                    <div class="well">
                        <h4>Blog Search</h4>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                        <!-- /.input-group -->
                    </div>
    
                    <!-- Blog Categories Well -->
                    <div class="well">
                        <h4>Available Categories</h4>
                        <div class="row">
                            @if(count($categories) >0)
                            @foreach ($categories->chunk(4) as $categoryChunk)
                            <div class="col-lg-6">
                                @foreach ($categoryChunk as $category)
                                    <ul class="list-unstyled">
                                        <li><a href="">{{$category->name}}</a></li>
                                    </ul>
                                @endforeach
                            </div>
                            @endforeach
                            @else
                                <div class="col-lg-12">
                                    No Categories
                                </div>
                            @endif
                        </div>
                        <!-- /.row -->
                    </div>
    
                    <!-- Side Widget Well -->
                    <div class="well">
                        <h4>Side Widget Well</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                    </div>
@endsection






@section('scripts')
    <script>
     $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });

    </script>
@endsection