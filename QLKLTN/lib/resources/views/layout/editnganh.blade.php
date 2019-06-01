@extends('layout.master')
@section('title','Sửa ngành')
@section('title2','Quản lý ngành')
@section('title3','Sửa ngành')
@section('main')

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Sửa ngành</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Tên ngành</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="ten_nganh" value="{{$nganh->ten_nganh}}">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="khoa_nganh" class="form-control">
            @foreach($khoalist as $khoa)
            <option value="{{$khoa->id_khoa}}" @if($nganh->khoa_nganh == $khoa->id_khoa) selected @endif>{{$khoa->ten_khoa}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <a href="{{asset('nganh')}}" class="btn btn-default">Hủy</a>
    <button type="submit" class="btn btn-info pull-right">Sửa</button>
  </div>
  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop