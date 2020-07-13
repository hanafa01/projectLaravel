@extends('layouts.admin')

@section('content')
    <h1>Edit Category</h1>
     {!! Form::model($category,['method'=>'PUT','action'=>['AdminCategoriesController@update',$category->id],]) !!}
        <div class="form-group">
            {!! Form::label('name','Name: ') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::submit('Edit Category',['class'=>'btn btn-primary col-md-6']) !!}
        </div>
     {!! Form::close() !!}

     {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
     <div class="form-group">
     {!! Form::submit('Delete Category',['class'=>'btn btn-danger col-md-6']) !!}
     </div>
     {!! Form::close() !!}

@endsection