@extends('layout.master')
@section('title','Tải lên báo cáo')
@section('title2','Quản lý báo cáo')
@section('title3','Tải lên báo cáo')
@section('main')

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Tải báo cáo</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">File báo cáo</label>

        <div class="col-sm-10">
          <input type="file" class="form-control" name="bao_cao">
        </div>
      </div>
      
    </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <a href="{{asset('bao-cao')}}" class="btn btn-default">Hủy</a>
    <button type="submit" class="btn btn-info pull-right">Lưu</button>
  </div>
  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop