@extends('layouts.admin')

@section('content')
<h1>Replies</h1>
    @if (count($replies) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($replies as $reply)
                    <tr>
                        <td>{{$reply->id}}</td>
                        <td>{{$reply->author}}</td>
                        <td>{{$reply->email}}</td>
                        <td>{{$reply->body}}</td>
                        <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
                        @if ($reply->is_active == 0)
                            <td>
                                {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                                    {!! Form::hidden('is_active',1) !!}
                                    {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            </td>
                        @else
                        <td>
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            {!! Form::hidden('is_active',0) !!}    
                            {!! Form::submit('Un-approve',['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </td>
                        @endif
                        <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No replies</h1>
    @endif

@endsection