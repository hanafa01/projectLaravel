@extends('layouts.admin')

@section('content')

    @if (Session::has('deletedUser'))
        <div class="alert alert-danger">{{session('deletedUser')}}</div>
    @endif
    <h1>Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if ($users)
                @foreach ($users as $user)
                <tr>    
                    <td>{{$user->id}}</td>
                    <td><img width="50" width="50" src="{{$user->photo ? $user->photo->file : 'https://placehold.it/400x400'}}" alt=""></td>
                    <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
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