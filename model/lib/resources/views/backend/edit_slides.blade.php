@extends('backend.master')
@section('main')
@section('title','Edit slide')
@section('title2','Slides')
<div class="box box-primary">

  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="box-header">
        <h3 class="box-title">Edit slide</h3>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Model's Name</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_slide" value="{{$slide->name_slide}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Link Slide</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="link_slide" value="{{$slide->link_slide}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Continent Slide</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="cont_slide" value="{{$slide->cont_slide}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Nation Slide</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="na_slide" value="{{$slide->na_slide}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Photo's Slide [2:3(4:6)]</label>

        <div class="col-sm-10">
          <input type="file" name="photo_slide" onchange="changeImg(this)">
          <img width="150px" src="{{asset('lib/storage/app/bg-img/'.$slide->photo_slide)}}">
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <a href="{{asset('admin/slide')}}" class="btn btn-default">Cancel</a>
      </div>
    </div>
    {{csrf_field()}}
  </form>
</div>
<!-- /.box-body -->
@stop