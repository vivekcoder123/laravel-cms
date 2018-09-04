@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<h1>Edit Post</h1>

<div class="col-sm-3">
  <img src="{{$post->photo?$post->photo->file:'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
</div>

<div class="col-sm-9">

{!!Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true])!!}

<div class="form-group">
  {!!Form::label('title','Title:')!!}
  {!!Form::text('title',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('category_id','Category:')!!}
{!!Form::select('category_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('photo_id','Photo:')!!}
{!!Form::file('photo_id',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('body','Description:')!!}
{!!Form::textarea('body',null,['class'=>'form-control','rows'=>'8'])!!}
</div>

<div class="form-group">
{!!Form::submit('Edit Post',['class'=>'btn btn-primary form-control'])!!}
</div>

{!!Form::close()!!}

{!!Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]])!!}

<div class="form-group">
{!!Form::submit('Delete Post',['class'=>'btn btn-danger form-control'])!!}
</div>

{!!Form::close()!!}


</div>

@include('includes/form_error');



@endsection

@section('footer')

@endsection
