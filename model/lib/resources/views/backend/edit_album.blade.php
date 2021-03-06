@extends('backend.master')
@section('main')
@section('title','Edit album')
@section('title2','Albums')
<!-- Master -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Edit album</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data>
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Album's name</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_album" value="{{$album->name_album}}" required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Avatar</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="avatar_album" value="{{$album->avatar_album}}" required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Content</label>
        <div class="col-sm-10">
          <textarea required="" class="form-control" rows="3" id="a" name="content_album">{{$album->content_album}}</textarea>
          <script type="text/javascript">
            CKEDITOR.replace('a');
          </script>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="model_album" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
            @foreach($model as $m)
            <option value="{{$m->id_model}}" @if($m->id_model==$album->model_album) selected="selected" @endif>{{$m->name_model}}</option>
            @endforeach
          </select>
        </div>
      </div> 
    <div class="box-footer">
      <button type="submit" class="btn btn-info">Submit</button>
      <a href="{{asset('admin/album/list')}}" class="btn btn-default">Cancel</a>
    </div>

  <!-- /.box-body -->

  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop