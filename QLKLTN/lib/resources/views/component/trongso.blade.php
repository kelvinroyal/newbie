<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example2_info">
	<thead>
		<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Mã giáo viên">Mã giáo viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tên giáo viên">Tên giáo viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Vai trò">Vai trò</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Trọng số">Trọng số</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Cập nhật điểm">Cập nhật</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Xóa">Xóa</th></tr>
	</thead>
	<tbody>
		@foreach($trongsolist as $trongso)
		<tr role="row" class="odd">
			<td class="sorting_1">{{$trongso->thanhvien->ma_thanhvien}}</td>
			<td>{{$trongso->thanhvien->ten_thanhvien}}</td>
			<td>{{$trongso->chuc_vu}}</td>
			@if($trongso->trong_so != null)
				<td style="font-weight: bold;" class="pull-left bg-green">{{$trongso->trong_so}}</td>
			@else
				<td style="font-weight: bold;" class="pull-left bg-gray">Null</td>
			@endif
			<td><a><span class="glyphicon glyphicon-pencil" data-id="{{$trongso->id_hoidong}}" rel="trong-so"></span></a></td>
			<td><a href="{{asset('trong-so/delete/'.$trongso->id_hoidong)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
		</tr>
		@endforeach
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			
		</div>


	</tbody>
</table></div></div></div>

<script type="text/javascript">
  $(document).ready(function(){
    
    $('[rel="trong-so"]').click(function(){

    let id = $(this).data('id');

    $.ajax({
      url: "{{ url('/ajax/trong-so') }}",
      data: { id: id }
    }).done(function(data){
      console.log(data)
      $('#myModal').html(data);
      $('#myModal').modal('show');
    });
    
  });
  });
</script>