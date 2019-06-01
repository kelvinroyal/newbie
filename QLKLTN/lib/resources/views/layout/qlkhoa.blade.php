@extends('layout.master')
@section('title','Quản lý khoa')
@section('title2','Quản lý khoa')
@section('title3','Khoa được giảng dạy')
@section('main')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Thêm khoa mới</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="post">
    @include('errors.note')
    <div class="box-body">
      <input required="" name="ten_khoa" type="text" class="form-control" placeholder="Nhập tên khoa mới">
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
    <h3 class="box-title">Các khoa hiện có</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tbody><tr>
        <th>Khoa</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
      @foreach($khoalist as $khoa)
      <tr>
        <td>{{$khoa->ten_khoa}}</td>
        <td><a href="{{asset('khoa/edit/'.$khoa->id_khoa)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
        <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('khoa/delete/'.$khoa->id_khoa)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
      </tr>
      @endforeach
    </tbody></table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
      {{$khoalist->links()}}
    </ul>
  </div>
</div>
@stop