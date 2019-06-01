@extends('frontend.master')
@section('main')
@section('title',$model->name_model)
<div class="breadcumb-nav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Asia</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Model</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row banner">
            @foreach($banner as $b)
            @if($b->id_banner==1)
            <div style="margin: 0 auto;"><a href="{{$b->link_banner}}"> {!!$b->content_banner!!}</a></div>
            @endif
            @endforeach
        </div>
    </div>
</div>

<section class="single_blog_area section_padding_80">
    <div class="container">
        <div class="row justify-content-center">

            <!-- ****** Blog Sidebar ****** -->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="blog-sidebar mt-5 mt-lg-0">
                    <!-- Single Widget Area -->
                    <div class="single-widget-area about-me-widget text-center">
                        <div class="widget-title">
                            <h6>Model</h6>
                        </div>
                        <div class="about-me-widget-thumb">
                            <img src="{{asset('lib/storage/app/avarmodel-img/'.$model->avatar_model)}}" alt="">
                        </div>
                        <h4 class="font-shadow-into-light">{{$model->name_model}}</h4>
                        <p>{!!$model->info_model!!}</p>
                        <a href="{{asset('continent/'.$model->continents->id_continents.'/'.strtolower($model->continents->name_continents)).'.html'}}">{{$model->continents->name_continents}}</a> ❤ <a href="{{asset('nation/'.$model->nation->id_nation.'/'.strtolower($model->nation->name_nation)).'.html'}}">{{$model->nation->name_nation}}</a>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area subscribe_widget text-center">
                        <div class="widget-title">
                            <h6>Subscribe &amp; Follow</h6>
                        </div>
                        <div class="subscribe-link">
                            @if(isset($model->facebook))<a href="{{$model->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>@else <a onclick="return alert('None!')"><i class="fa fa-facebook" aria-hidden="true"></i></a>@endif
                            @if(isset($model->twitter))<a href="{{$model->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>@else <a onclick="return alert('None!')"><i class="fa fa-twitter" aria-hidden="true"></i></a>@endif
                            @if(isset($model->instagram))<a href="{{$model->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>@else <a onclick="return alert('None!')"><i class="fa fa-instagram" aria-hidden="true"></i></a>@endif
                        </div>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area popular-post-widget">
                        <div class="widget-title text-center">
                            <h6 id="show"><a style="color: blue; cursor: pointer;">Suggestions <i style="font-size: 20px;" class="fa fa-caret-down"></i></a></h6>
                        </div>
                        <div id="abc" style="display: none;">
                            @foreach($sug as $s)
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="{{$s->cover_model}}" alt="">
                                <div class="post-content">
                                    <a href="{{asset($s->continents->name_continents.'/model/'.$s->id_model.'.html')}}">
                                        <h6>{{$s->name_model}}</h6>
                                    </a>
                                    <a href="{{asset('nation/'.$s->nation->id_nation.'/'.strtolower($s->nation->name_nation)).'.html'}}"><p>{{$s->nation->name_nation}}</p></a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <script src="js/jquery/jquery-1.12.0.min.js"></script>
                        <script>
                            $(document).ready(function(){
                                $("#show").click(function(){
                                    $("#abc").toggle();
                                })
                            })
                        </script>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area">
                        @foreach($banner as $b)
                        @if($b->id_banner==3)
                        <div style="margin: 0 auto;"><a href="{{$b->link_banner}}"> {!!$b->content_banner!!}</a></div>
                        @endif
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="row no-gutters">

                    <!-- Single Post -->
                    <div class="col-12 col-sm-12">
                        <div class="single-post">
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a>Latest update</a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="{{asset($model->continents->name_continents.'/model/'.$model->id_model.'.html')}}">{{date('Y-m-d', strtotime($model->updated_at))}}</a>
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
                                            <div class="fb-share-button" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <!-- Photo list -->
                        <h4 class="mb-30 label"><span style="background: #ff697ed6;">Photo</span></h4>
                        <div class="row">
                            @foreach($photo as $p)
                            <div class="col-4 zoom">
                                <img data-id="{{$p->id_photo}}" rel="photo-model" style="cursor: -webkit-zoom-in;" src="{{$p->p_photo}}">
                            </div>
                            @endforeach
                            <!-- The Modal -->
                            <div id="myModal3" class="modal">
                          </div>
                      </div>

                      <!-- Related Post Area -->
                      <div class="section_padding_50">
                        <h4 class="mb-30 label"><span style="background: #ff9969d9;">Video</span></h4>

                        <div class="related-post-slider owl-carousel">
                            @foreach($video as $v)
                            <!-- Single Related Post-->
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb video">
                                    <a href="{{asset('single-video/'.$v->id_video.'.html')}}"><img src="{{$v->avatar_video}}" alt=""></a>
                                    <div class="overlay">
                                        <a href="{{asset('single-video/'.$v->id_video.'.html')}}"><i class="icon fa fa-play-circle-o"></i></a>
                                    </div>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">{{date('Y-m-d', strtotime($v->created_at))}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Album list -->
                    <div class="post-content">
                        <div class="post-meta d-flex">
                            <h4 class="mb-30 label"><span style="background: #a369ffd1;">Album</span></h4>
                        </div>
                        <div class="row">
                            @foreach($album as $a)
                            <div class="album col-md-3 col-lg-3 col-6">
                                <a href="{{asset('single-album/'.$a->id_album.'.html')}}">
                                    <img style="height: 190px;" class="img-thumbnail" src="{{$a->avatar_album}}">
                                    <h6 style="text-align: center;">{{$a->name_album}}</h6>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tags Area -->
                    <div class="tags-area">
                        <a href="{{asset('continent/'.$model->continents->id_continents.'/'.strtolower($model->continents->name_continents)).'.html'}}">{{$model->continents->name_continents}}</a>
                        <a href="{{asset('nation/'.$model->nation->id_nation.'/'.strtolower($model->nation->name_nation)).'.html'}}">{{$model->nation->name_nation}}</a>
                    </div>

                    <!-- Comment Area Start -->
                    
                        <div id="exTab1" class="section_padding_50 container"> 
                            <ul class="nav nav-pills">
                                <a class="btn btn-secondary" style="color: white;" data-target="#1a" data-toggle="tab">Comment</a>
                                <a class="btn btn-primary" style="color: white;" data-target="#2a" data-toggle="tab">Fb-Comment</a>
                            </ul>

                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="1a">

                                    <div class="comment_area section_padding_50 clearfix">
                                        <h4 class="mb-30">{{$comment2}} Comments</h4>

                                        <ol>
                                            @foreach($comment as $c)
                                            <li class="single_comment_area">
                                                <div class="comment-wrapper d-flex">
                                                    <!-- Comment Meta -->
                                                    <div class="comment-author">
                                                        <img src="{{asset('lib/storage/app/avatar/'.$c->user->avatar)}}" alt="">
                                                    </div>
                                                    <!-- Comment Content -->
                                                    <div class="comment-content">
                                                        <span class="comment-date text-muted">{{$c->created_at}}</span>
                                                        <h5>{{$c->user->name_user}}</h5>
                                                        <p>{{$c->content_comment}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                    <!-- Leave A Comment -->
                                    @if(isset(Auth::user()->id))
                                    <div class="leave-comment-area section_padding_50 clearfix">
                                        <div class="comment-form">
                                            <h4 class="mb-30">Leave A Comment</h4>

                                            <!-- Comment Form -->
                                            <form method="post">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content_comment" cols="30" rows="10" placeholder="Comment..."></textarea>
                                                </div>
                                                <button type="submit" class="btn contact-btn">Post Comment</button>
                                                {{csrf_field()}}
                                            </form>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                                <div class="tab-pane" id="2a">
                                    <div class="fb-comments" data-href="{{asset($model->continents->name_continents.'/model/'.$model->id_model.'.html')}}" data-numposts="5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
</section>

<script>
    $(document).ready(function(){
    // Get the modal
        $('[rel="photo-model"]').click(function(){

          let id = $(this).data('id');

          $.ajax({
            url: "{{ url('/ajax/photo-model') }}",
            data: { id: id }
          }).done(function(data){
            console.log(data)
            $('#myModal3').html(data);
            $('#myModal3').modal('show');
          });

        });
    });
</script>
@stop