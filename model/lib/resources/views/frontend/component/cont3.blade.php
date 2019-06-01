@foreach($video as $v)
<div class="single-post col-md-3 col-lg-3 col-6">
	<!-- Post Thumb -->
	<div class="post-thumb video" style="margin-bottom: -25px;">
		<a href="{{asset('single-video/'.$v->id_video.'.html')}}"><img src="{{$v->avatar_video}}" alt=""></a>
		<div class="overlay">
			<a href="{{asset('single-video/'.$v->id_video.'.html')}}"><i class="icon fa fa-play-circle-o"></i></a>
		</div>
	</div>
	<!-- Post Content -->
	<div class="post-content">
		<div class="post-meta d-flex">
			<div class="post-author-date-area d-flex">
				<!-- Post Author -->
				<div class="post-author">
					<a href="{{asset($v->model->continents->name_continents.'/model/'.$v->model->id_model.'.html')}}">{{$v->model->name_model}}</a>
				</div>
				<!-- Post Date -->
				<div class="post-date">
					<a href="#">{{date('Y-m-d', strtotime($v->created_at))}}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach