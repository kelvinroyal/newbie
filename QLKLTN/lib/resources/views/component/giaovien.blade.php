<option value="unselect" selected="">Lựa chọn giáo viên</option>

@foreach($giaovien->thanhvien as $tv)
@if($tv->quyen == 2) 
	<option value="{{ $tv->id }}">{{ $tv->ten_thanhvien }}</option>
@endif
@endforeach