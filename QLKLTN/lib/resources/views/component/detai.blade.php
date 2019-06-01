<table class="table table-bordered">
	<thead>
		<tr>
			<th style="width: 10px">#</th>
			<th>Đề tài</th>
			<th>Khoa</th>
			<th>Ngành</th>
			<th>Năm</th>
			<th>Giáo viên gợi ý</th>
			<th>Đã chọn</th>
			@if(Auth::user()->quyen != 3) <th style="width: 60px">Sửa</th>
			<th style="width: 60px">Xóa</th>@endif
		</tr>
	</thead>
	<tbody>
		@if($row > 0)
		@foreach($detailist as $detai)
		<tr>
			<td>{{$detai->id_detai}}.</td>
			<td>{{$detai->ten_detai}}</td>
			<td>{{ $detai->thanhvien->khoa->ten_khoa }}</td>
			<td>{{ $detai->thanhvien->nganh->ten_nganh }}</td>
			<td>{{$detai->nam->so_nam}}</td>
			<td>{{$detai->thanhvien->ten_thanhvien}}</td>
			<td class="badge bg-grey">
				@php $a=0; @endphp
				@foreach($kllist as $kl)
				@if($kl->de_tai == $detai->ten_detai)
				@php $a=$a+1; @endphp
				@endif
				@endforeach
				{{$a}} lần
			</td>
			@if(Auth::user()->quyen != 3) <td><a href="{{asset('de-tai/edit/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('de-tai/delete/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>@endif
		</tr>
		@endforeach

		@elseif(isset($row3))
		@foreach($detailist3 as $detai)
		<tr>
			<td>{{$detai->id_detai}}.</td>
			<td>{{$detai->ten_detai}}</td>
			<td>{{ $detai->thanhvien->khoa->ten_khoa }}</td>
			<td>{{ $detai->thanhvien->nganh->ten_nganh }}</td>
			<td>{{$detai->nam->so_nam}}</td>
			<td>{{$detai->thanhvien->ten_thanhvien}}</td>
			<td class="badge bg-grey">
				@php $a=0; @endphp
				@foreach($kllist as $kl)
				@if($kl->de_tai == $detai->ten_detai)
				@php $a=$a+1; @endphp
				@endif
				@endforeach
				{{$a}} lần
			</td>
			@if(Auth::user()->quyen != 3) <td><a href="{{asset('de-tai/edit/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('de-tai/delete/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>@endif
		</tr>
		@endforeach
			@elseif(isset($row2))
			@foreach($detailist2 as $detai)
			<tr>
				<td>{{$detai->id_detai}}.</td>
				<td>{{$detai->ten_detai}}</td>
				<td>{{ $detai->thanhvien->khoa->ten_khoa }}</td>
				<td>{{ $detai->thanhvien->nganh->ten_nganh }}</td>
				<td>{{$detai->nam->so_nam}}</td>
				<td>{{$detai->thanhvien->ten_thanhvien}}</td>
				<td class="badge bg-grey">
					@php $a=0; @endphp
					@foreach($kllist as $kl)
					@if($kl->de_tai == $detai->ten_detai)
					@php $a=$a+1; @endphp
					@endif
					@endforeach
					{{$a}} lần
				</td>
				@if(Auth::user()->quyen != 3) <td><a href="{{asset('de-tai/edit/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('de-tai/delete/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>@endif
			</tr>
			@endforeach
				@elseif(isset($row1))
				@foreach($detailist1 as $detai)
				<tr>
					<td>{{$detai->id_detai}}.</td>
					<td>{{$detai->ten_detai}}</td>
					<td>{{ $detai->thanhvien->khoa->ten_khoa }}</td>
					<td>{{ $detai->thanhvien->nganh->ten_nganh }}</td>
					<td>{{$detai->nam->so_nam}}</td>
					<td>{{$detai->thanhvien->ten_thanhvien}}</td>
					<td class="badge bg-grey">
						@php $a=0; @endphp
						@foreach($kllist as $kl)
						@if($kl->de_tai == $detai->ten_detai)
						@php $a=$a+1; @endphp
						@endif
						@endforeach
						{{$a}} lần
					</td>
					@if(Auth::user()->quyen != 3) <td><a href="{{asset('de-tai/edit/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
					<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('de-tai/delete/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>@endif
				</tr>
				@endforeach
		@endif
	</tbody></table>