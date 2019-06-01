@foreach($album as $a)
<div class="album col-md-3 col-lg-3 col-6">
	<a href="{{asset('single-album/'.$a->id_album.'.html')}}"><img style="height: 300px;" class="img-thumbnail" src="{{$a->avatar_album}}">
		<h6 style="text-align: center;">{{$a->name_album}}</h6></a>
	</div>
	@endforeach