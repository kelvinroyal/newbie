@extends('layout.master')
@section('title','Danh sách thành viên')
@section('title2','Quản lý thành viên')
@section('title3','Danh sách thành viên')
@section('main')

<div class="box">
  <div class="box-header with-border">
    <div class="col-md-5"><h3 class="box-title">Danh sách các thành viên trên hệ thống</h3></div>
    
    
      <div class="col-md-2">
        <form action="{{asset('thanh-vien/search2/')}}" role="search2" method="get">
          <div class="form-group">
            <input type="text" name="result2" class="form-control" placeholder="Search...">
          </div>
        </form>
      </div>

    <div id="select">
    <div class="col-md-2">
      <div class="form-group">
        <select name="khoa" rel="khoa" class="form-control">
          <option value="unselect" selected="">Lựa chọn khoa</option>
          @foreach($khoalist as $khoa)
          <option value="{{$khoa->id_khoa}}">{{$khoa->ten_khoa}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <select name="trang_thai" rel="trang_thai" class="form-control">
          <option value="unselect" selected="">Trạng thái sinh viên</option>
          <option value="1">Đã đăng ký</option>
          <option value="2">Chưa đăng ký</option>
        </select>
      </div>
    </div>
    <div class="col-md-1">
      <button type="submit" rel="submit" class="btn bg-purple">Lọc</button>
    </div>
  </div>

  </div>
  <!-- /.box-header -->
  <div rel="indulieu">
  <div class="box-body">
    @if(Auth::user()->quyen != 3)
    <table class="table table-bordered">
      <tbody><tr>
        <th>Mã cá nhân</th>
        <th>Tên</th>
        <th style="width: 60px">Sửa</th>
        <th style="width: 60px">Xem</th>
        <th style="width: 60px">Quyền</th>
        @if(Auth::user()->quyen == 1) <th style="width: 60px">Xóa</th> @endif
      </tr>
      @foreach($items2 as $tv)
      <tr>
        <td>{{$tv->ma_thanhvien}}</td>
        <td>{{$tv->ten_thanhvien}}</td>
        <td>@if($tv->quyen != 1)<a href="{{asset('thanh-vien/edit/'.$tv->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
        @elseif(Auth::user()->id == $tv->id) <a href="{{asset('thanh-vien/edit/'.$tv->id)}}"><span class="glyphicon glyphicon-pencil"> @endif</td>
        <td><span class="glyphicon glyphicon-search" data-id="{{ $tv->id }}" rel="chi-tiet"></span></td>
        <td><span @if($tv->quyen==1) class="badge bg-red" @endif @if($tv->quyen==2) class=" badge bg-blue" @endif @if($tv->quyen==3) class="badge bg-green" @endif>@if($tv->quyen==1) Thư kí @endif @if($tv->quyen==2) Giáo viên @endif @if($tv->quyen==3) Sinh viên @endif</span></td>
        @if(Auth::user()->quyen == 1) <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('thanh-vien/delete/'.$tv->id)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td> @endif
      </tr>
      @endforeach
    </tbody></table>
    @endif
    @if(Auth::user()->quyen == 3)
    <table class="table table-bordered">
      <tbody><tr>
        <th>Mã cá nhân</th>
        <th>Tên</th>
        <th style="width: 60px">Xem</th>
        <th style="width: 60px">Quyền</th>
      </tr>
      @foreach($items2 as $tv)
      <tr>
        <td>{{$tv->ma_thanhvien}}</td>
        <td>{{$tv->ten_thanhvien}}</td>
        <td><span class="glyphicon glyphicon-search" data-id="{{ $tv->id }}" rel="chi-tiet"></span></td>
        <td><span @if($tv->quyen==1) class="badge bg-red" @endif @if($tv->quyen==2) class=" badge bg-blue" @endif @if($tv->quyen==3) class="badge bg-green" @endif>@if($tv->quyen==1) Thư kí @endif @if($tv->quyen==2) Giáo viên @endif @if($tv->quyen==3) Sinh viên @endif</span></td>
      </tr>
      @endforeach
    </tbody></table>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="submit"]').click(function(){

      var select = $('#select select');
      var obj = {};
      for(var i = 0; i < select.length; i++){
          obj[$(select[i]).attr('name')] = $(select[i]).val();
      }

      $.ajax({
        url: "{{ url('/ajax/tv') }}",
        data: obj
      }).done(function(data){
        $('[rel="indulieu"]').html(data);
      });

    });



    $('[rel="chi-tiet"]').click(function(){

      let id = $(this).data('id');

      $.ajax({
        url: "{{ url('/ajax/chi-tiet') }}",
        data: { id: id }
      }).done(function(data){
        console.log(data)
        $('#myModal').html(data);
        $('#myModal').modal('show');
      });

    });
  });
</script>
@stop
@stop

