<option value="unselect" selected="">Select National</option>

@foreach($nations->nation as $nation)
	<option @if(isset($idnation) && $idnation == $nation->id_nation) selected @endif value="{{ $nation->id_nation }}">{{ $nation->name_nation }}</option>
@endforeach