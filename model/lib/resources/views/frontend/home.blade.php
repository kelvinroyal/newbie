@extends('frontend.master')
@section('main')
@section('title','Sweet Girl')
<!-- Master page -->
<section class="welcome-post-sliders owl-carousel">

    <!-- Single Slide -->
    @foreach($slide as $s)
    <div class="welcome-single-slide">
        <!-- Post Thumb -->
        <img src="{{asset('lib/storage/app/bg-img/'.$s->photo_slide)}}">
        <!-- Overlay Text -->
        <div class="project_title">
            <div class="post-date-commnents d-flex">
                <a>{{$s->cont_slide}}</a>
                <a>{{$s->na_slide}}</a>
            </div>
            <a href="{{$s->link_slide}}">
                <h5>{{$s->name_slide}}</h5>
            </a>
        </div>
    </div>
    @endforeach

</section>
<!-- ****** Welcome Area End ****** -->

<!-- ****** Categories Area Start ****** -->

<section class="categories_area clearfix" id="about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                    <img src="img/catagory-img/1.jpg" alt="">
                    <div class="catagory-title">
                        <a href="{{asset('video')}}">
                            <h5>Video</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single_catagory wow fadeInUp" data-wow-delay=".6s">
                    <img src="img/catagory-img/2.jpg" alt="">
                    <div class="catagory-title">
                        <a href="{{asset('photo')}}">
                            <h5>Photo</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single_catagory wow fadeInUp" data-wow-delay=".9s">
                    <img src="img/catagory-img/3.jpg" alt="">
                    <div class="catagory-title">
                        <a href="{{asset('album')}}">
                            <h5>Album</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row banner">
            @foreach($banner as $b)
            @if($b->id_banner==1)
            <div style="margin: 0 auto;"><a href="{{$b->link_banner}}"> {!!$b->content_banner!!}</a></div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- ****** Categories Area End ****** -->

<!-- ****** Blog Area Start ****** -->
<section class="blog_area section_padding_0_80">
    <div class="container">
        <div class="row justify-content-center">

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
                                    @php $co=0; @endphp
                                    @foreach($comment as $c)
                                        @if($c->user_comment == $m->id_model)
                                            @php $co=$co+1; @endphp
                                        @endif
                                    @endforeach
                                    <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> {{$co}}</a>
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
    </div>
</section>
@stop