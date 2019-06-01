@extends('backend.master')
@section('main')
@section('title','Edit photo')
@section('title2','Photos')
<div class="box box-primary">

  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="box-header">
        <h3 class="box-title">Edit photo</h3>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Model</label>
        <div class="col-sm-10">
          <select name="model_photo" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
            @foreach($model as $m)
            <option value="{{$m->id_model}}" @if($m->id_model==$photo->model_photo) selected="selected" @endif>{{$m->name_model}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Model's photo</label>

        <div class="col-sm-10">
          <input class="form-control" type="text" name="p_photo" required="" value="{{$photo->p_photo}}">
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <a href="{{asset('admin/photo')}}" class="btn btn-default">Cancel</a>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  {{csrf_field()}}
</form>
@stop