<div class="no-reply-container" style="padding:2%;">


<button type="button" class="pull-right btn btn-primary" id="rb">Reply</button>



<!-- End Nested Comment -->
<div id='reply' style="display:none">
{!!Form::open(['method'=>'post','action'=>'CommentRepliesController@commentReply'])!!}
  <input type="hidden" name="comment_id" value="{{$comment->id}}">
<div class="form-group">
{!!Form::textarea('body',null,['class'=>'form-control','rows'=>1])!!}
</div>

{!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
</div>
  </div>
