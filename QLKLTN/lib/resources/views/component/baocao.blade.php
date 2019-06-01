<style type="text/css">
.led-red {
  margin: 5px auto;
  width: 10px;
  height: 10px;
  background-color: #940;
  border-radius: 50%;
}
.led-green {
  margin: 5px auto;
  width: 10px;
  height: 10px;
  background-color: #690;
  border-radius: 50%;
}
</style>
<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
  <thead>
    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="MSV">Mã sinh viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tên sinh viên bảo vệ">Tên sinh viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Đề tài đăng ký">Đề tài</th>@if(Auth::user()->quyen == 1)<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Cập nhật điểm">Lưu trữ</th>@endif<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tải báo cáo">Tải xuống</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Đã nộp">Đã nộp</th>@if(Auth::user()->quyen == 1)<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Xóa">Xóa</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Pub">Public</th>@endif</tr>
  </thead>
  <tbody>
    <form id="sub" method="post" enctype="multipart/form-data">
      @if($row > 0)
      @foreach($khoaluanlist as $baocao)
      <tr role="row" class="odd">
        <td class="sorting_1">{{$baocao->thanhvien->ma_thanhvien}}</td>
        <td>{{$baocao->thanhvien->ten_thanhvien}}</td>
        <td>{{$baocao->de_tai}}</td>
        @if(Auth::user()->quyen == 1) <td><a href="{{asset('bao-cao/edit/'.$baocao->id_khoaluan)}}"><span class="glyphicon glyphicon-folder-open"></span></a></td> @endif
        @if(Auth::user()->quyen != 3)
        <td>@if($baocao->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$baocao->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@endif</td>
        @else
        @if($baocao->pub == 1)
        <td>@if($baocao->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$baocao->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@endif</td>
        @else
        <td><span class="glyphicon glyphicon-ban-circle"></span></td>
        @endif
        @endif
        <td>@if($baocao->bao_cao != null) <div class="led-green"></div> @else <div class="led-red"></div> @endif</td>
        @if(Auth::user()->quyen == 1) <td><a href="{{asset('bao-cao/delete/'.$baocao->id_khoaluan)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
        <td><a><span class="glyphicon glyphicon-off" data-id="{{ $baocao->id_khoaluan }}" rel="pub"></span></a></td> @endif
      </tr>
      @endforeach
      @elseif(isset($row3))
      @foreach($khoaluanlist3 as $baocao)
      <tr role="row" class="odd">
        <td class="sorting_1">{{$baocao->thanhvien->ma_thanhvien}}</td>
        <td>{{$baocao->thanhvien->ten_thanhvien}}</td>
        <td>{{$baocao->de_tai}}</td>
        @if(Auth::user()->quyen == 1) <td><a href="{{asset('bao-cao/edit/'.$baocao->id_khoaluan)}}"><span class="glyphicon glyphicon-folder-open"></span></a></td> @endif
        @if(Auth::user()->quyen != 3)
        <td>@if($baocao->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$baocao->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@endif</td>
        @else
        @if($baocao->pub == 1)
        <td>@if($baocao->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$baocao->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@endif</td>
        @else
        <td><span class="glyphicon glyphicon-ban-circle"></span></td>
        @endif
        @endif
        <td>@if($baocao->bao_cao != null) <div class="led-green"></div> @else <div class="led-red"></div> @endif</td>
        @if(Auth::user()->quyen == 1) <td><a href="{{asset('bao-cao/delete/'.$baocao->id_khoaluan)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
        <td><a><span class="glyphicon glyphicon-off" data-id="{{ $baocao->id_khoaluan }}" rel="pub"></span></a></td> @endif
      </tr>
      @endforeach
        @elseif(isset($row2))
        @foreach($khoaluanlist2 as $baocao)
        <tr role="row" class="odd">
          <td class="sorting_1">{{$baocao->thanhvien->ma_thanhvien}}</td>
          <td>{{$baocao->thanhvien->ten_thanhvien}}</td>
          <td>{{$baocao->de_tai}}</td>
          @if(Auth::user()->quyen == 1) <td><a href="{{asset('bao-cao/edit/'.$baocao->id_khoaluan)}}"><span class="glyphicon glyphicon-folder-open"></span></a></td> @endif
          @if(Auth::user()->quyen != 3)
          <td>@if($baocao->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$baocao->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@endif</td>
          @else
          @if($baocao->pub == 1)
          <td>@if($baocao->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$baocao->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@endif</td>
          @else
          <td><span class="glyphicon glyphicon-ban-circle"></span></td>
          @endif
          @endif
          <td>@if($baocao->bao_cao != null) <div class="led-green"></div> @else <div class="led-red"></div> @endif</td>
          @if(Auth::user()->quyen == 1) <td><a href="{{asset('bao-cao/delete/'.$baocao->id_khoaluan)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
          <td><a><span class="glyphicon glyphicon-off" data-id="{{ $baocao->id_khoaluan }}" rel="pub"></span></a></td> @endif
        </tr>
        @endforeach
          @elseif(isset($row1))
          @foreach($khoaluanlist1 as $baocao)
          <tr role="row" class="odd">
            <td class="sorting_1">{{$baocao->thanhvien->ma_thanhvien}}</td>
            <td>{{$baocao->thanhvien->ten_thanhvien}}</td>
            <td>{{$baocao->de_tai}}</td>
            @if(Auth::user()->quyen == 1) <td><a href="{{asset('bao-cao/edit/'.$baocao->id_khoaluan)}}"><span class="glyphicon glyphicon-folder-open"></span></a></td> @endif
            @if(Auth::user()->quyen != 3)
            <td>@if($baocao->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$baocao->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@endif</td>
            @else
            @if($baocao->pub == 1)
            <td>@if($baocao->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$baocao->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@endif</td>
            @else
            <td><span class="glyphicon glyphicon-ban-circle"></span></td>
            @endif
            @endif
            <td>@if($baocao->bao_cao != null) <div class="led-green"></div> @else <div class="led-red"></div> @endif</td>
            @if(Auth::user()->quyen == 1) <td><a href="{{asset('bao-cao/delete/'.$baocao->id_khoaluan)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
            <td><a><span class="glyphicon glyphicon-off" data-id="{{ $baocao->id_khoaluan }}" rel="pub"></span></a></td> @endif
          </tr>
          @endforeach
      @endif
      {{csrf_field()}}
    </form>
  </tbody>

  <div class="modal fade" id="myModal" role="dialog">
  </div>

</table></div></div>{{-- <div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiển thị 10 khóa luận mỗi trang</div></div><div class="col-sm-7">
  <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
      {{$khoaluanlist->links()}}
    </ul>
  </div>
</div></div> --}}</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="pub"]').click(function(){

      let id = $(this).data('id');

      $.ajax({
        url: "{{ url('/ajax/pub') }}",
        data: { id: id }
      }).done(function(data){
        console.log(data)
        $('#myModal').html(data);
        $('#myModal').modal('show');
      });

    });
  });
</script>
