@extends('layout.master')
@section('title','Thêm thành viên')
@section('title2','Quản lý thành viên')
@section('title3','Thêm thành viên')
@section('main')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Thêm thành viên</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  @include('errors.note')
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Mã cá nhân</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="ma_thanhvien" placeholder="Nhập mã" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Họ tên</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="ten_thanhvien" placeholder="Nhập họ tên" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Mật khẩu</label>

        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Ảnh đại diện</label>

        <div class="col-sm-10">
          <input type="file" name="anh" onchange="changeImg(this)">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select required name="khoa_thanhvien" rel="khoa" class="form-control">
            <option value="unselect" selected="">Lựa chọn khoa</option>
            @foreach($khoalist as $khoa)
            <option value="{{$khoa->id_khoa}}">{{$khoa->ten_khoa}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select required name="nganh_thanhvien" rel="nganh" class="form-control">
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select required name="quyen" class="form-control">
            <option value="unselect" selected="">Lựa chọn quyền hạn</option>
            <option value="1">Thư kí</option>
            <option value="2">Giáo viên</option>
            <option value="3">Sinh viên</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Khóa</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="lop" placeholder="Nhập khóa">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="Địa chỉ email">
        </div>
      </div>
    </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <a href="{{asset('thanh-vien/danh-sach')}}" class="btn btn-default">Hủy</a>
    <button type="submit" class="btn btn-info pull-right">Thêm</button>
  </div>
  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="khoa"]').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "{{ url('/ajax/nganh') }}",
        data: { idkhoa: id }
      }).done(function(data){
        $('[rel="nganh"]').html(data)
      });

    });

  });

</script>
@stop