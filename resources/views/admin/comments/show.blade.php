@extends('layouts.admin')

@section('content')

<h1>Comments</h1>

<table class="table table-striped">

<thead>
  <th>Id</th>
  <th>Author</th>
  <th>Email</th>
  <th>Body</th>
  <th>Created</th>
  <th>Post Name</th>
</thead>

<tbody>
  @if($comments)
    @foreach ($comments as $comment)
      <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->body}}</td>
        <td>{{$comment->created_at->diffForHumans()}}</td>
        <td>{{$comment->post->title}}</td>
        <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
        <td><a href="{{route('admin.comments.replies.show',$comment->id)}}">View Replies</a></td>
        <td>
        @if ($comment->is_active == 0)

          {!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]])!!}

             <input type="hidden" name="is_active" value="1">
            {!!Form::submit('Approve',['class'=>'btn btn-success'])!!}
          {!!Form::close()!!}

      @else

          {!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]])!!}

             <input type="hidden" name="is_active" value="0">
            {!!Form::submit('Un-Approve',['class'=>'btn btn-warning'])!!}
          {!!Form::close()!!}

       @endif
     </td>
     <td>
       {!!Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]])!!}
         {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
       {!!Form::close()!!}
     </td>
      </tr>
    @endforeach
  @endif
</tbody>

</table>

@endsection

@section('footer')

@endsection
