<option value="0" selected="">Lựa chọn ngành</option>

@foreach($nganhs->nganh as $nganh)
	<option @if(isset($idnganh) && $idnganh == $nganh->id_nganh) selected @endif value="{{ $nganh->id_nganh }}">{{ $nganh->ten_nganh }}</option>
@endforeach