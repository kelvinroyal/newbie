<table class="table table-striped">
	<thead><tr>
		<th>Ngành</th>
		<th>Thuộc khoa</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
</thead>
<tbody >
	@foreach($khoalist as $nganh)
	<tr>
		<td>{{$nganh->ten_nganh}}</td>
		<td>{{$nganh->ten_khoa}}</td>
		<td><a href="{{asset('nganh/edit/'.$nganh->id_nganh)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('nganh/delete/'.$nganh->id_nganh)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
	</tr>
	@endforeach
</tbody></table>