<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="MSV">Mã sinh viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tên sinh viên bảo vệ">Tên sinh viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Đề tài đăng ký">Đề tài</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Giáo viên hướng dẫn">Giáo viên hướng dẫn</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Thời gian">Thời gian</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Phòng">Phòng</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Xác nhận">Xác nhận</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Xóa">Xóa</th></tr>
        </thead>
        <tbody>
          @if($row > 0)
          @foreach($khoaluanlist as $xn)
          @if($xn->diem1 == null && $xn->diem2 == null && $xn->diem3 == null && $xn->diem4 == null)
          <tr role="row" class="odd">
            @if($xn->de_tai != null and $xn->thoi_gian != null and $xn->phong != null and $xn->huongdan != null)
              <td class="sorting_1">{{$xn->thanhvien->ma_thanhvien}}</td>
            @else
              <td class="sorting_1" style="background: #FFFACD;">{{$xn->thanhvien->ma_thanhvien}}</td>
            @endif
            <td>{{$xn->thanhvien->ten_thanhvien}}</td>
            <td>{{$xn->de_tai}}</td>
            <td>@if($xn->huongdan != null) {{$xn->huongdan->ten_thanhvien}} @endif</td>
            <td>{{$xn->thoi_gian}}</td>
            <td>{{$xn->phong}}</td>
            <td><a><span data-id="{{ $xn->id_khoaluan }}" rel="xac-nhan" class="glyphicon glyphicon-ok-circle" ></span></a></td>
            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('khoa-luan/delete/'.$xn->id_khoaluan)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
          </tr>
          @endif
          @endforeach
          @elseif(isset($row3))
            @foreach($khoaluanlist3 as $xn)
            @if($xn->diem1 == null && $xn->diem2 == null && $xn->diem3 == null && $xn->diem4 == null)
            <tr role="row" class="odd">
              @if($xn->de_tai != null and $xn->thoi_gian != null and $xn->phong != null and $xn->huongdan != null)
                <td class="sorting_1">{{$xn->thanhvien->ma_thanhvien}}</td>
              @else
                <td class="sorting_1" style="background: #FFFACD;">{{$xn->thanhvien->ma_thanhvien}}</td>
              @endif
              <td>{{$xn->thanhvien->ten_thanhvien}}</td>
              <td>{{$xn->de_tai}}</td>
              <td>@if($xn->huongdan != null) {{$xn->huongdan->ten_thanhvien}} @endif</td>
              <td>{{$xn->thoi_gian}}</td>
              <td>{{$xn->phong}}</td>
              <td><a><span data-id="{{ $xn->id_khoaluan }}" rel="xac-nhan" class="glyphicon glyphicon-ok-circle" ></span></a></td>
              <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('khoa-luan/delete/'.$xn->id_khoaluan)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
            </tr>
            @endif
            @endforeach
              @elseif(isset($row2))
              @foreach($khoaluanlist2 as $xn)
              @if($xn->diem1 == null && $xn->diem2 == null && $xn->diem3 == null && $xn->diem4 == null)
              <tr role="row" class="odd">
                @if($xn->de_tai != null and $xn->thoi_gian != null and $xn->phong != null and $xn->huongdan != null)
                  <td class="sorting_1">{{$xn->thanhvien->ma_thanhvien}}</td>
                @else
                  <td class="sorting_1" style="background: #FFFACD;">{{$xn->thanhvien->ma_thanhvien}}</td>
                @endif
                <td>{{$xn->thanhvien->ten_thanhvien}}</td>
                <td>{{$xn->de_tai}}</td>
                <td>@if($xn->huongdan != null) {{$xn->huongdan->ten_thanhvien}} @endif</td>
                <td>{{$xn->thoi_gian}}</td>
                <td>{{$xn->phong}}</td>
                <td><a><span data-id="{{ $xn->id_khoaluan }}" rel="xac-nhan" class="glyphicon glyphicon-ok-circle" ></span></a></td>
                <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('khoa-luan/delete/'.$xn->id_khoaluan)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
              </tr>
              @endif
              @endforeach
                @elseif(isset($row1))
                @foreach($khoaluanlist1 as $xn)
                @if($xn->diem1 == null && $xn->diem2 == null && $xn->diem3 == null && $xn->diem4 == null)
                <tr role="row" class="odd">
                  @if($xn->de_tai != null and $xn->thoi_gian != null and $xn->phong != null and $xn->huongdan != null)
                    <td class="sorting_1">{{$xn->thanhvien->ma_thanhvien}}</td>
                  @else
                    <td class="sorting_1" style="background: #FFFACD;">{{$xn->thanhvien->ma_thanhvien}}</td>
                  @endif
                  <td>{{$xn->thanhvien->ten_thanhvien}}</td>
                  <td>{{$xn->de_tai}}</td>
                  <td>@if($xn->huongdan != null) {{$xn->huongdan->ten_thanhvien}} @endif</td>
                  <td>{{$xn->thoi_gian}}</td>
                  <td>{{$xn->phong}}</td>
                  <td><a><span data-id="{{ $xn->id_khoaluan }}" rel="xac-nhan" class="glyphicon glyphicon-ok-circle" ></span></a></td>
                  <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('khoa-luan/delete/'.$xn->id_khoaluan)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
                </tr>
                @endif
                @endforeach
          @endif
        </tbody>
      </table></div></div>{{-- <div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiển thị 10 khóa luận mỗi trang</div></div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          {{$khoaluanlist->links()}}
        </ul>
      </div>
    </div> --}}</div>
          <!-- Modal -->
    
    <div class="modal fade" id="myModal" role="dialog">
            
    </div>

<script type="text/javascript">
  $(document).ready(function(){
    
    $('[rel="xac-nhan"]').click(function(){

    let id = $(this).data('id');

    $.ajax({
      url: "{{ url('/ajax/xac-nhan') }}",
      data: { id: id }
    }).done(function(data){
      console.log(data)
      $('#myModal').html(data);
      $('#myModal').modal('show');
    });
    
  });
  });
</script>
