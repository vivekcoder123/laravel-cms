@extends('layouts.admin');

@section('content')

@if (Session::has('deleted_user'))
   <p class="text-danger alert alert-danger">{{session('deleted_user')}}</p>
@endif

@if (Session::has('created_user'))
   <p class="text-success alert alert-success">{{session('created_user')}}</p>
@endif

@if (Session::has('updated_user'))
   <p class="text-success alert alert-success">{{session('updated_user')}}</p>
@endif

<h1>Users</h1>

<table class="table table-striped">

<thead>
  <th>Id</th>
  <th>Photo</th>
  <th>Name</th>
  <th>Email</th>
  <th>Role</th>
  <th>Status</th>
  <th>Created</th>
  <th>Updated</th>
</thead>

<tbody>
  @if($users)
    @foreach ($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        {{-- <td><img height="50px" src="/images/{{$user->photo?$user->photo->file:'No Photo'}}"></td> --}}
        <td><img height="50px" src="{{$user->photo?$user->photo->file:'http://placehold.it/50x50'}}"></td>
        <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
    @endforeach
  @endif
</tbody>

</table>

@endsection

@section('footer')

@endsection
