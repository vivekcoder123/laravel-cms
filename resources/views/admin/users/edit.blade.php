@extends('layouts.admin');

@section('content')

<h1>Edit User</h1>

<div class="row">

<div class="col-sm-3">
  <img src="{{$user->photo?$user->photo->file:'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
</div>

<div class="col-sm-9">

{!!Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true])!!}

<div class="form-group">
  {!!Form::label('name','Name:')!!}
  {!!Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
  {!!Form::label('email','Email:')!!}
  {!!Form::email('email',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
  {!!Form::label('password','Password:')!!}
  {!!Form::password('password',['class'=>'form-control','placeholder'=>'Leave it blank if you don\'t want to change password'])!!}
</div>

<div class="form-group">
  {!!Form::label('role','Role:')!!}
  {!!Form::select('role_id',[''=>'Choose Options']+$roles,null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
  {!!Form::label('is_active','Status:')!!}
  {!!Form::select('is_active',array(0=>'Not Active',1=>'Active'),null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
  {!!Form::label('photo_id','Photo:')!!}
  {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
</div>

<div class="form-group col-sm-6">
  {!!Form::submit('Edit User',['class'=>'btn btn-primary'])!!}
</div>

{!!Form::close()!!}

{!!Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]])!!}

<div class="form-group">
  {!!Form::submit('Delete User',['class'=>'btn btn-danger pull-right'])!!}
</div>

{!!Form::close()!!}

</div>

</div>



@include('includes/form_error');

@endsection

@section('footer')

@endsection
