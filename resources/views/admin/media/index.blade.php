@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if ($photos)
                @foreach ($photos as $photo)
                <tr>    
                    <td>{{$photo->id}}</td>
                    <td>{{$photo->file}}</td>
                    <td><img width="50" width="50" src="{{$photo->file ? $photo->file : 'https://placehold.it/400x400'}}" alt=""></td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                
                @else
                <tr>
                    <td colspan="4" class="text-center text-danger">No Users Available.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection