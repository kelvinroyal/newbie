<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Mã giáo viên">Mã giáo viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tên giáo viên">Tên giáo viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Khoa">Khoa</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Kỳ">Kỳ</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nhóm">Nhóm</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Năm">Năm</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Sửa">Sửa</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Xóa">Xóa</th></tr>
        </thead>
        <tbody>
@foreach($hoidonglist as $hoidong)
          <tr role="row" class="odd">
            <td class="sorting_1">{{$hoidong->thanhvien->ma_thanhvien}}</td>
            <td>{{$hoidong->thanhvien->ten_thanhvien}}</td>
            <td>{{$hoidong->thanhvien->khoa->ten_khoa}}</td>
            <td>@if($hoidong->ky == 1) Kỳ I @endif @if($hoidong->ky == 2) Kỳ II @endif @if($hoidong->ky == 3) Kỳ III @endif</td>
            <td>@if($hoidong->nhom == 1) Nhóm 1 @endif @if($hoidong->nhom == 2) Nhóm 2 @endif @if($hoidong->nhom == 3) Nhóm 3 @endif</td>
            <td>{{$hoidong->nam->so_nam}}</td>
            <td><a><span class="glyphicon glyphicon-pencil" data-id="{{$hoidong->id_hoidong}}" rel="hoi-dong"></span></a></td>
            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('hoi-dong/delete/'.$hoidong->id_hoidong)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
          </tr>
@endforeach
</tbody>
      </table></div>
    </div></div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
            
</div>
<script type="text/javascript">
  $(document).ready(function(){
    
    $('[rel="hoi-dong"]').click(function(){

    let id = $(this).data('id');

    $.ajax({
      url: "{{ url('/ajax/hoi-dong') }}",
      data: { id: id }
    }).done(function(data){
      console.log(data)
      $('#myModal').html(data);
      $('#myModal').modal('show');
    });
    
  });
  });
</script>