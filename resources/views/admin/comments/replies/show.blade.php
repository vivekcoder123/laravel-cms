@extends('layouts.admin')

@section('content')

<h1>Replies</h1>

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
  @if($replies)
    @foreach ($replies as $reply)
      <tr>
        <td>{{$reply->id}}</td>
        <td>{{$reply->author}}</td>
        <td>{{$reply->email}}</td>
        <td>{{$reply->body}}</td>
        <td>{{$reply->created_at->diffForHumans()}}</td>
        <td>{{$reply->comment->post->title}}</td>
        <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
        <td>
        @if ($reply->is_active == 0)

          {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]])!!}

             <input type="hidden" name="is_active" value="1">
            {!!Form::submit('Approve',['class'=>'btn btn-success'])!!}
          {!!Form::close()!!}

      @else

          {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]])!!}

             <input type="hidden" name="is_active" value="0">
            {!!Form::submit('Un-Approve',['class'=>'btn btn-warning'])!!}
          {!!Form::close()!!}

       @endif
     </td>
     <td>
       {!!Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]])!!}
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
