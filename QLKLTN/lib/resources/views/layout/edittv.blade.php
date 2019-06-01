@extends('layout.master')
@section('title','Sửa thành viên')
@section('title2','Quản lý thành viên')
@section('title3','Sửa thành viên')
@section('main')

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Sửa thành viên</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Mã cá nhân</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="ma_thanhvien" value="{{$tv->ma_thanhvien}}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Mật khẩu</label>

        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" value="{{$tv->password}}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Họ tên</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="ten_thanhvien" value="{{$tv->ten_thanhvien}}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Ảnh đại diện</label>

        <div class="col-sm-10">
          <input type="file" name="anh" onchange="changeImg(this)">
          <img width="150px" src="{{asset('lib/storage/app/avatar/'.$tv->anh)}}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" value="{{$tv->email}}">
        </div>
      </div>
      @if(Auth::user()->quyen == 1)
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="khoa_thanhvien" rel="khoa" class="form-control">
            @foreach($khoalist as $khoa)
            <option value="{{$khoa->id_khoa}}" @if($tv->khoa_thanhvien == $khoa->id_khoa) selected @endif>{{$khoa->ten_khoa}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="nganh_thanhvien" rel="nganh" class="form-control">
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="quyen" class="form-control">
            <option value="unselect" selected="">Lựa chọn quyền hạn</option>
            <option value="1" @if($tv->quyen==1) selected @endif>Thư kí</option>
            <option value="2" @if($tv->quyen==2) selected @endif>Giáo viên</option>
            <option value="3" @if($tv->quyen==3) selected @endif>Sinh viên</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Khóa</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="lop" value="{{$tv->lop}}">
        </div>
      </div>
      @else
      <input type="hidden" name="khoa_thanhvien" value="{{Auth::user()->khoa_thanhvien}}">
      <input type="hidden" name="nganh_thanhvien" value="{{Auth::user()->nganh_thanhvien}}">
      <input type="hidden" name="quyen" value="{{Auth::user()->quyen}}">
      <input type="hidden" name="lop" value="{{Auth::user()->lop}}">
      @endif
    </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <a href="{{asset('thanh-vien/danh-sach')}}" class="btn btn-default">Hủy</a>
    <button type="submit" class="btn btn-info pull-right">Sửa</button>
  </div>
  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    function select()
    {
      var id = $('[rel="khoa"] :selected').val();
      $.ajax({
        url: "{{ url('/ajax/nganh') }}",
        data: { idkhoa: id, idnganh: {{ $tv->nganh_thanhvien }} }
      }).done(function(data2){
        $('[rel="nganh"]').html(data2)
      });
    }

    select();
    $('[rel="khoa"]').change(function(){
      select();

    });

  });

</script>
@stop