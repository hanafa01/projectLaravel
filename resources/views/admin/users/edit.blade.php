@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>
<div class="row">
    <div class="col-sm-3">
        <img height="200px" width="200px" src="{{$user->photo ? $user->photo->file : 'https://placehold.it/400x400'}}" alt="">
    </div>
    <div class="col-sm-9">
        {!! Form::model($user,['method'=>'PUT','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name: ') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email: ') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role','Role: ') !!}
            {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status','Status: ') !!}
            {!! Form::select('is_active',['1'=>'Active','0'=>'Not Active'],null,['class'=>'form-control']) !!} <!--  we can put null instead of '0' -->
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
    </div>
</div>
<div class="row">
    @include('includes.form_errors')
</div>
@endsection