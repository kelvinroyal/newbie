@extends('layout.master')
@section('title','Sửa khoa')
@section('title2','Quản lý khoa')
@section('title3','Sửa khoa')
@section('main')

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Sửa khoa</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Tên khoa</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="ten_khoa" value="{{$khoa->ten_khoa}}">
        </div>
      </div>
    </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <a href="{{asset('khoa')}}" class="btn btn-default">Hủy</a>
    <button type="submit" class="btn btn-info pull-right">Sửa</button>
  </div>
  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop