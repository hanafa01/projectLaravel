@extends('layouts.admin')

@section('content')
    <h1>Create Posts</h1>

    <div class="row">
    {!! Form::open(['method'=>'post','action'=>'AdminPostsController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('Title','Title: ') !!}
        {!! Form::text('title','',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id','Category: ') !!}
        {!! Form::select('category_id',[''=>'Select Category: '] + $categories,null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','File: ') !!}
        {!! Form::file('photo_id',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Description: ') !!}
        {!! Form::textarea('body','',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
</div>

<div class="row">
    @include('includes.form_errors')
</div>

@endsection