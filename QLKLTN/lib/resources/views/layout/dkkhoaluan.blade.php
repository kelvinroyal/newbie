@extends('layout.master')
@section('title','Đăng ký làm khóa luận')
@section('title2','Quản lý khóa luận')
@section('title3','Đăng ký làm khóa luận')
@section('main')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Đăng ký làm kháo luận</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  @include('errors.note')
  <form class="form-horizontal" method="post">
    {{-- <input type="hidden" name="trang_thai" id="trang_thai" value="1"> --}}
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Đề tài khóa luận</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="de_tai" placeholder="Điền tên đề tài">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="ky" class="form-control">
            <option value="unselect" selected="">Lựa chọn kỳ</option>
            <option value="1">Kỳ I</option>
            <option value="2">Kỳ II</option>
            <option value="3">Kỳ III</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="nhom" class="form-control">
            <option value="unselect" selected="">Lựa chọn nhóm</option>
            <option value="1">Nhóm 1</option>
            <option value="2">Nhóm 2</option>
            <option value="3">Nhóm 3</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="nam_khoaluan" class="form-control">
            <option value="unselect" selected="">Lựa chọn năm</option>
            @foreach($khoaluan as $kl)
            <option value="{{$kl->id_nam}}">{{$kl->so_nam}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <b>*Liên lạc Thư ký nếu muốn hủy đăng ký</b>
        </div>
      </div>
    </div>

    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{asset('khoa-luan/danh-sach')}}" class="btn btn-default">Hủy</a>
      <button type="submit" class="btn btn-info pull-right">Đăng ký</button>
    </div>
    <!-- /.box-footer -->
    {{csrf_field()}}
  </form>
</div>
@stop