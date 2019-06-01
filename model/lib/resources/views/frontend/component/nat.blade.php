<div class="row">

	<!-- Single Post -->
	@php $i = 0.1; @endphp
	@foreach($model as $m)
	<div class="col-12 col-md-6 col-lg-4">
		<div class="single-post wow fadeInUp" data-wow-delay="{{$i}}" style="visibility: visible; animation-delay: {{$i}}s; animation-name: fadeInUp;">
			<!-- Post Thumb -->
			<div class="post-thumb">
				<a href="{{asset($m->continents->name_continents.'/model/'.$m->id_model.'.html')}}"><img class="fiximg" src="{{$m->cover_model}}" alt=""></a>
			</div>
			<!-- Post Content -->
			<div class="post-content">
				<div class="post-meta d-flex">
					<div class="post-author-date-area d-flex">
						<!-- Post Author -->
						<div class="post-author">
							<a href="{{asset('nation/'.$m->nation->id_nation.'/'.strtolower($m->nation->name_nation)).'.html'}}">{{$m->nation->name_nation}}</a>
						</div>
						<!-- Post Date -->
						<div class="post-date">
							<a href="{{asset('continent/'.$m->continents->id_continents.'/'.strtolower($m->continents->name_continents)).'.html'}}">{{$m->continents->name_continents}}</a>
						</div>
					</div>
					<!-- Post Comment & Share Area -->
					<div class="post-comment-share-area d-flex">
						<!-- Post Favourite -->
						<div class="post-favourite">
							<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
						</div>
						<!-- Post Comments -->
						<div class="post-comments">
							<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
						</div>
						<!-- Post Share -->
						<div class="post-share">
							<a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<a href="{{asset($m->continents->name_continents.'/model/'.$m->id_model.'.html')}}">
					<h4 class="post-headline">{{$m->name_model}}</h4>
				</a>
			</div>
		</div>
	</div>
	@php $i=$i+0.1; @endphp
	@endforeach

        </div>