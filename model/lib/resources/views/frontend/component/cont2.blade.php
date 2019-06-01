@foreach($photo as $p)
<div class="col-md-2 col-lg-2 col-6 zoom2">
	<img data-id="{{$p->id_photo}}" rel="view-photo" style="cursor: -webkit-zoom-in;" src="{{$p->p_photo}}">
</div>
@endforeach

<!-- The Modal -->
<div id="myModal3" class="modal">
</div>