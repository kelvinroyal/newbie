@extends('layout.master')
@section('title','Quản lý năm học')
@section('title2','Quản lý năm')
@section('title3','Năm học')
@section('main')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Thêm năm học mới</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="post">
    @include('errors.note')
    <div class="box-body">
      <input required="" name="so_nam" type="text" class="form-control" placeholder="Nhập năm học mới">
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Thêm</button>
      <button type="reset" name="reset" class="btn btn-default">Làm mới</button>
    </div>
    {{csrf_field()}}
  </form>
</div>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Các năm hiện có</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tbody><tr>
        <th>Năm</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
      @foreach($namlist as $nam)
      <tr>
        <td>{{$nam->so_nam}}</td>
        <td><a href="{{asset('nam/edit/'.$nam->id_nam)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
        <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('nam/delete/'.$nam->id_nam)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
      </tr>
      @endforeach
    </tbody></table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
      {{$namlist->links()}}
    </ul>
  </div>
</div>
@stop