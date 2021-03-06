@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>
    {!! Form::open(['method'=>'post','action'=>'AdminUsersController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name: ') !!}
            {!! Form::text('name','',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email: ') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role','Role: ') !!}
            {!! Form::select('role_id',[''=>'Select Role: ']+$roles,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status','Status: ') !!}
            {!! Form::select('is_active',['1'=>'Active','0'=>'Not Active'],'0',['class'=>'form-control']) !!} <!--  we can put null instead of '0' -->
        </div>
        <div class="form-group">
            {!! Form::label('password','Password: ') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','File: ') !!}
            {!! Form::file('photo_id',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

        @include('includes.form_errors')
@endsection