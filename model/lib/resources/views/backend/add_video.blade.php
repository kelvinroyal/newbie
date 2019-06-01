@extends('backend.master')
@section('main')
@section('title','Add video')
@section('title2','Videos')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Add video</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Avatar</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Link avatar video" name="avatar_video" required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Link Video</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="download" placeholder="Link download">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Embed Video</label>
        <div class="col-sm-10">
          <textarea required="" class="form-control" rows="3" id="e" name="embed"></textarea>
          <script type="text/javascript">
            CKEDITOR.replace('e');
          </script>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="model_video" class="selectpicker form-control" data-live-search="true">
            <option value="unselect" selected="">Select Model</option>
            @foreach($model as $m)
            <option value="{{$m->id_model}}">{{$m->name_model}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-info">Submit</button>
      <button type="reset" name="reset" class="btn btn-default">Reset</button>
    </div>
  <!-- /.box-body -->

  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop