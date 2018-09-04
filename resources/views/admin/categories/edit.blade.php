@extends('layouts.admin')

@section('content')

  <div class="col-sm-6">
    <h3>Update Category</h2>
    {!!Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]])!!}
    <div class="form-group">
      {!!Form::label('name','Name of the Category:')!!}
      {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>
      {!!Form::submit('Update Category',['class'=>'btn btn-primary form-control'])!!}
    {!!Form::close()!!}
    <br>
    {!!Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]])!!}
      {!!Form::submit('Delete Category',['class'=>'btn btn-danger form-control'])!!}
    {!!Form::close()!!}
  </div>
    @include('includes/form_error');


@endsection

@section('footer')

@endsection
