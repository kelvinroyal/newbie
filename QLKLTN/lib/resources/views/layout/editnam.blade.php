@extends('layout.master')
@section('title','Sửa năm')
@section('title2','Quản lý năm')
@section('title3','Sửa năm')
@section('main')

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Sửa năm</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Số năm</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="so_nam" value="{{$nam->so_nam}}">
        </div>
      </div>
    </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <a href="{{asset('nam')}}" class="btn btn-default">Hủy</a>
    <button type="submit" class="btn btn-info pull-right">Sửa</button>
  </div>
  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop