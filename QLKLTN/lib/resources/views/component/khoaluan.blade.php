<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
  <thead>
    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="MSV">Mã sinh viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tên sinh viên bảo vệ">Tên sinh viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Đề tài đăng ký">Đề tài</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Giáo viên hướng dẫn">Giáo viên hướng dẫn</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Thời gian">Thời gian</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Phòng">Phòng</th>@if(Auth::user()->quyen<3)<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tải báo cáo">Tải xuống</th>@endif<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Điểm">Điểm tổng</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Điểm">Chi tiết</th></tr>
  </thead>
  <tbody>
    @if($row > 0)
    @foreach($khoaluanlist as $kl)
    @if($kl->huongdan != null && $kl->de_tai != null && $kl->thoi_gian != null)
    <tr role="row" class="odd">
      <td class="sorting_1">{{$kl->thanhvien->ma_thanhvien}}</td>
      <td>{{$kl->thanhvien->ten_thanhvien}}</td>
      <td>{{$kl->de_tai}}</td>
      <td>{{$kl->huongdan->ten_thanhvien}}</td>
      <td>{{$kl->thoi_gian}}</td>
      <td>{{$kl->phong}}</td>
      @if(Auth::user()->quyen<3)<td>@if($kl->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$kl->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a> @endif</td>@endif
      <td>{{$kl->diem1*($kl->ts1/100)+$kl->diem2*($kl->ts2/100)+$kl->diem3*($kl->ts3/100)+$kl->diem4*($kl->ts4/100)}}</td>
      <td><a><span class="glyphicon glyphicon-eye-open" data-id="{{$kl->id_khoaluan}}" rel="khoa-luan"></span></a></td>
    </tr>
    @endif
    @endforeach
      @elseif(isset($row3))
      @foreach($khoaluanlist3 as $kl)
      @if($kl->huongdan != null && $kl->de_tai != null && $kl->thoi_gian != null)
      <tr role="row" class="odd">
        <td class="sorting_1">{{$kl->thanhvien->ma_thanhvien}}</td>
        <td>{{$kl->thanhvien->ten_thanhvien}}</td>
        <td>{{$kl->de_tai}}</td>
        <td>{{$kl->huongdan->ten_thanhvien}}</td>
        <td>{{$kl->thoi_gian}}</td>
        <td>{{$kl->phong}}</td>
        @if(Auth::user()->quyen<3)<td>@if($kl->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$kl->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a> @endif</td>@endif
        <td>{{$kl->diem1*($kl->ts1/100)+$kl->diem2*($kl->ts2/100)+$kl->diem3*($kl->ts3/100)+$kl->diem4*($kl->ts4/100)}}</td>
        <td><a><span class="glyphicon glyphicon-eye-open" data-id="{{$kl->id_khoaluan}}" rel="khoa-luan"></span></a></td>
      </tr>
      @endif
      @endforeach
        @elseif(isset($row2))
        @foreach($khoaluanlist2 as $kl)
        @if($kl->huongdan != null && $kl->de_tai != null && $kl->thoi_gian != null)
        <tr role="row" class="odd">
          <td class="sorting_1">{{$kl->thanhvien->ma_thanhvien}}</td>
          <td>{{$kl->thanhvien->ten_thanhvien}}</td>
          <td>{{$kl->de_tai}}</td>
          <td>{{$kl->huongdan->ten_thanhvien}}</td>
          <td>{{$kl->thoi_gian}}</td>
          <td>{{$kl->phong}}</td>
          @if(Auth::user()->quyen<3)<td>@if($kl->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$kl->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a> @endif</td>@endif
          <td>{{$kl->diem1*($kl->ts1/100)+$kl->diem2*($kl->ts2/100)+$kl->diem3*($kl->ts3/100)+$kl->diem4*($kl->ts4/100)}}</td>
          <td><a><span class="glyphicon glyphicon-eye-open" data-id="{{$kl->id_khoaluan}}" rel="khoa-luan"></span></a></td>
        </tr>
        @endif
        @endforeach
          @elseif(isset($row1))
          @foreach($khoaluanlist1 as $kl)
          @if($kl->huongdan != null && $kl->de_tai != null && $kl->thoi_gian != null)
          <tr role="row" class="odd">
            <td class="sorting_1">{{$kl->thanhvien->ma_thanhvien}}</td>
            <td>{{$kl->thanhvien->ten_thanhvien}}</td>
            <td>{{$kl->de_tai}}</td>
            <td>{{$kl->huongdan->ten_thanhvien}}</td>
            <td>{{$kl->thoi_gian}}</td>
            <td>{{$kl->phong}}</td>
            @if(Auth::user()->quyen<3)<td>@if($kl->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$kl->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a> @endif</td>@endif
            <td>{{$kl->diem1*($kl->ts1/100)+$kl->diem2*($kl->ts2/100)+$kl->diem3*($kl->ts3/100)+$kl->diem4*($kl->ts4/100)}}</td>
            <td><a><span class="glyphicon glyphicon-eye-open" data-id="{{$kl->id_khoaluan}}" rel="khoa-luan"></span></a></td>
          </tr>
          @endif
          @endforeach
    @endif
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">

    </div>

  </tbody>
</table></div></div>{{-- <div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiển thị 10 khóa luận mỗi trang</div></div>
<div class="box-footer clearfix">
  <ul class="pagination pagination-sm no-margin pull-right">
    {{$khoaluanlist->links()}}
  </ul>
</div>
</div> --}}</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="khoa-luan"]').click(function(){

      let id = $(this).data('id');

      $.ajax({
        url: "{{ url('/ajax/khoa-luan') }}",
        data: { id: id }
      }).done(function(data){
        console.log(data)
        $('#myModal').html(data);
        $('#myModal').modal('show');
      });

    });
  });
</script>