@extends('backend.master')
@section('main')
@section('title','Edit Comment')
@section('title2','Comments')
<div class="box box-primary">

  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="box-header">
        <h3 class="box-title">Edit Comment</h3>
      </div>

      <div class="form-group">
       <label class="col-sm-2 control-label">User</label>
       <div class="col-sm-10">
        <input class="form-control" type="text" disabled="disabled" value="{{$comment->user->name_user}}">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Comment</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="3" name="content_comment">{{$comment->content_comment}}</textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Check</label>

      <div class="col-sm-10">
        <input type="radio" name="status_comment" value="1" @if($comment->status_comment==1) checked="checked" @endif>Checked<br>
        <input type="radio" name="status_comment" value="0" @if($comment->status_comment==0) checked="checked" @endif>Uncheck<br>
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-info">Submit</button>
      <a href="{{asset('admin/comment')}}" class="btn btn-default">Cancel</a>
    </div>
  </div>
</div>
<!-- /.box-body -->
{{csrf_field()}}
</form>
@stop