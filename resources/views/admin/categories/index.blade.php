@extends('layouts.admin')

@section('content')

@if (Session::has('created_categ'))
  <h4 class="alert alert-success">{{session('created_categ')}}</h4>
@endif

@if (Session::has('updated_categ'))
  <h4 class="alert alert-success">{{session('updated_categ')}}</h4>
@endif

@if (Session::has('deleted_categ'))
  <h4 class="alert alert-danger">{{session('deleted_categ')}}</h4>
@endif

<h1>Categories</h1>

<div class="row">

<div class="col-sm-6">
  <h3>Create Category</h2>
  {!!Form::open(['method'=>'post','action'=>'AdminCategoriesController@store'])!!}
  <div class="form-group">
    {!!Form::label('name','Name of the Category:')!!}
    {!!Form::text('name',null,['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
    {!!Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
  </div>
  {!!Form::close()!!}
  @include('includes/form_error');
</div>

<div class="col-sm-6">
  <table class="table table-striped">

  <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Created</th>
    <th>Updated</th>
  </thead>

  <tbody>
    @if($categories)
      @foreach ($categories as $category)
        <tr>
          <td>{{$category->id}}</td>
          <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
          <td>{{$category->created_at->diffForHumans()}}</td>
          <td>{{$category->updated_at->diffForHumans()}}</td>
        </tr>
      @endforeach
    @endif
  </tbody>

  </table>
</div>

</div>

@endsection

@section('footer')

@endsection
