@extends('layout.master')
@section('title','Sửa đề tài')
@section('title2','Quản lý đề tài')
@section('title3','Sửa đề tài')
@section('main')

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Sửa đề tài</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Đề tài</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="ten_detai" value="{{$detai->ten_detai}}">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="ky" class="form-control">
            <option value="{{$detai->ky}}">@if($detai->ky==1) Kỳ I @endif @if($detai->ky==2) Kỳ II @endif @if($detai->ky==3) Kỳ III @endif</option>
            <option value="1">Kỳ I</option>
            <option value="2">Kỳ II</option>
            <option value="3">Kỳ III</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="nhom" class="form-control">
            <option value="{{$detai->nhom}}">@if($detai->nhom==1) Nhóm 1 @endif @if($detai->nhom==2) Nhóm 2 @endif @if($detai->nhom==3) Nhóm 3 @endif</option>
            <option value="1">Nhóm 1</option>
            <option value="2">Nhóm 2</option>
            <option value="3">Nhóm 3</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="nam_detai" class="form-control">
            @foreach($namlist as $nam)
            <option value="{{$nam->id_nam}}" @if($detai->nam_detai == $nam->id_nam) selected @endif>{{$nam->so_nam}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <a href="{{asset('de-tai/danh-sach')}}" class="btn btn-default">Hủy</a>
    <button type="submit" class="btn btn-info pull-right">Sửa</button>
  </div>
  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop