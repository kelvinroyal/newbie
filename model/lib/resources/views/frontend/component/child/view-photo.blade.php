@foreach($banner as $b)
@if($b->id_banner==1)
<div style="margin-left: auto; margin-right: auto; margin-top: -85px; display: block;"></div>
@endif
@endforeach
<button type="button" class="close" data-dismiss="modal">&times;</button>
<img class="modal-content" src="{{$p->p_photo}}">
<h5 style="text-align: center;"><a href="{{asset($p->model->continents->name_continents.'/model/'.$p->model->id_model.'.html')}}">{{$p->model->name_model}}</a></h5>