@extends('backend.master')
@section('main')
@section('title','Edit banner')
@section('title2','Banner')
<!-- Master -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Edit banner</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Banner's link</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="link_banner" value="{{$banner->link_banner}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Information</label>
        <div class="col-sm-10">
          <textarea required="" class="form-control" rows="3" id="c" name="content_banner">{{$banner->content_banner}}</textarea>
          <script type="text/javascript">
            CKEDITOR.replace('c');
          </script>
        </div>
      </div>              
    </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-info">Submit</button>
    <a href="{{asset('admin/banner/list')}}" class="btn btn-default">Cancel</a>
  </div>
  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop