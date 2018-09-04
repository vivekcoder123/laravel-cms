@extends('layouts.admin')

@section('content')

  @if (Session::has('deleted_post'))
     <p class="text-danger alert alert-danger">{{session('deleted_post')}}</p>
  @endif

  @if (Session::has('created_user'))
     <p class="text-success alert alert-success">{{session('created_post')}}</p>
  @endif

  @if (Session::has('updated_user'))
     <p class="text-success alert alert-success">{{session('updated_post')}}</p>
  @endif

<h1>Posts</h1>

<table class="table table-striped">

<thead>
  <th>Id</th>
  <th>User</th>
  <th>Category</th>
  <th>Photo</th>
  <th>Title</th>
  <th>Body</th>
  <th>Created</th>
  <th>Updated</th>
</thead>

<tbody>
  @if($posts)
    @foreach ($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category->name}}</td>
        <td><img height="100px" src="{{$post->photo?$post->photo->file:'http://placehold.it/100x100'}}"></td>
        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
        <td>{!! str_limit($post->body,8) !!}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
        <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
        <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
      </tr>
    @endforeach
  @endif
</tbody>

</table>

@endsection

@section('footer')

@endsection
