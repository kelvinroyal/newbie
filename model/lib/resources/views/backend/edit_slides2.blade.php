@extends('backend.master')
@section('main')
@section('title','Edit slide2')
@section('title2','Slides2')
<div class="box box-primary">

  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="box-header">
        <h3 class="box-title">Edit slide2</h3>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Link Slide2</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="link_slide2" value="{{$slide2->link_slide2}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Photo's Slide2 [1:1(square)]</label>

        <div class="col-sm-10">
          <input type="file" name="photo_slide2" onchange="changeImg(this)">
          <img width="150px" src="{{asset('lib/storage/app/slide2-img/'.$slide2->photo_slide2)}}">
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <a href="{{asset('admin/slide2')}}" class="btn btn-default">Cancel</a>
      </div>
    </div>
    {{csrf_field()}}
  </form>
</div>
@stop