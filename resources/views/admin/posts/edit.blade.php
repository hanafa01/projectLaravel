@extends('layouts.admin')

@section('content')
    <h1>Edit Post</h1>
<div class="row">
    <div class="col-sm-3">
        <img height="200px" width="200px" src="{{$post->photo ? $post->photo->file : 'https://placehold.it/400x400'}}" alt="">
    </div>
    <div class="col-sm-9">
        {!! Form::model($post,['method'=>'PUT','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('Title','Title: ') !!}
            {!! Form::text('title',$post->title,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category: ') !!}
            {!! Form::select('category_id',['0'=>'Select Categor2y: '] + $categories,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','File: ') !!}
            {!! Form::file('photo_id',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Description: ') !!}
            {!! Form::textarea('body',$post->body,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::submit('Edit Post',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id],'class'=>'pull-right']) !!}
        <div class="form-group">
        {!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}

    </div>
</div>
<div class="row">
    @include('includes.form_errors')
</div>
@endsection