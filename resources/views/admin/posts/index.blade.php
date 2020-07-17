@extends('layouts.admin')

@section('content')

    @if (Session::has('deletedPost'))
        <div class="alert alert-danger">{{session('deletedPost')}}</div>
    @endif
    <h1>Posts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                <tr>    
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                    <td><img height="100" width="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td>{{$post->title}}</td>
                    <td>{{Str::limit($post->body,10)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
                    <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
                </tr>
                @endforeach
                
                @else
                <tr>
                    <td colspan="4" class="text-center text-danger">No Posts Available.</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">  
            {{$posts->links()}}  <!-- links or render -->
        </div>
    </div>
@endsection