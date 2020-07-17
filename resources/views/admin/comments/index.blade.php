@extends('layouts.admin')

@section('content')
    <h1>Comments</h1>

    @if (count($comments) > 0)
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
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->body}}</td>
                        <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
                        @if ($comment->is_active == 0)
                            <td>
                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                                    {!! Form::hidden('is_active',1) !!}
                                    {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            </td>
                        @else
                        <td>
                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                            {!! Form::hidden('is_active',0) !!}    
                            {!! Form::submit('Un-approve',['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </td>
                        @endif
                        <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else

    @endif

@endsection