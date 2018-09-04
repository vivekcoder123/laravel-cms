@extends('layouts.admin')

@section('styles')
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
@endsection

@section('content')

@if (Session::has('deleted_media'))

  <h4 class="alert alert-danger">{{session('deleted_media')}}</h4>

@endif

<h1>Media</h1>

<form action="delete/media" method="post" class="form-inline">
 {{ csrf_field() }}
 {{method_field('delete')}}

<div class="form-group">

<select name="checkBoxArray" class="form-control">
  <option value="">Delete</option>
</select>

</div>

<div class="form-group">
  <input type="submit" value="Submit" name="delete_all" class="btn btn-danger">
</div>

<table class="table table-striped">

<thead>
  <th><input type="checkbox" id="options"></th>
  <th>Id</th>
  <th>Image</th>
  <th>Created</th>

</thead>

<tbody>
  @if($photos)
    @foreach ($photos as $photo)
      <tr>
        <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{$photo->id}}"></td>
        <td>{{$photo->id}}</td>
        <td><img height="100px" src="{{$photo->file?$photo->file:'http://placehold.it/100x100'}}" alt=""></td>
        <td>{{$photo->created_at->diffForHumans()}}</td>
        <td>
        {{-- {!!Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]])!!}
          {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
        {!!Form::close()!!} --}}

         <div class="form-group">
           <button type="submit" name="delete_single" value="{{$photo->id}}" class="btn btn-danger">Delete</button>
         </div>


      </td>
      </tr>
    @endforeach
  @endif
</tbody>

</table>

</form>

<div class="text-center">
  {{$photos->render()}}
</div>

@endsection

@section('footer')

  <script type="text/javascript">

     $(document).ready(function(){

         $('#options').click(function(){

           if(this.checked){
             $('.checkBoxes').each(function(){
               this.checked=true;
             });
           }else{
             $('.checkBoxes').each(function(){
               this.checked=false;
             });
           }

         });

     });

  </script>

@endsection
