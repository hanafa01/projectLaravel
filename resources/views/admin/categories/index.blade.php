@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['method'=>'post','action'=>'AdminCategoriesController@store']) !!}
                <div class="form-group">
                    {!! Form::label('Name','Name')!!}
                    {!! Form::text('name','',['class'=>'form-control']) !!}
                </div>
                {!! Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                        <tr>    
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>{{$category->updated_at->diffForHumans()}}</td>
                        </tr>
                        @endforeach     
                    @else
                        <tr>
                            <td colspan="4" class="text-center text-danger">No Categories Available.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection