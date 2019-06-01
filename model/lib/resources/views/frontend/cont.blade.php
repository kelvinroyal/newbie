@extends('frontend.master')
@section('main')
@section('title',$continent->name_continents.' Girl')
<div class="ad-left">
    @foreach($banner as $b)
    @if($b->id_banner==4)
    <div style="margin: 0 auto;"><a href="{{$b->link_banner}}"> {!!$b->content_banner!!}</a></div>
    @endif
    @endforeach
</div>
<div class="ad-right">
    @foreach($banner as $b)
    @if($b->id_banner==5)
    <div style="margin: 0 auto;"><a href="{{$b->link_banner}}"> {!!$b->content_banner!!}</a></div>
    @endif
    @endforeach
</div>

<div class="breadcumb-area" style="background-image: url({{asset('lib/storage/app/bg-img/'.str_slug($continent->name_continents).'bg.jpg')}});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>{{$continent->name_continents}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="breadcumb-nav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$continent->name_continents}} Girl</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row" id="select">
            <div class="col-4">
                <select name="nation_continents" class="form-control">
                    <option value="unselected" selected="">Select a nation</option>
                    @foreach($nation as $n)
                    <option value="{{$n->id_nation}}">{{$n->name_nation}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-1">
                <button rel="submit" type="submit" class="btn btn-info">Submit</button>
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

<section class="archive-area section_padding_80">
    <div class="container" rel="print">
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
    </div>
</section>
@stop
@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="submit"]').click(function(){

      var select = $('#select select');
      var obj = {};
      for(var i = 0; i < select.length; i++){
          obj[$(select[i]).attr('name')] = $(select[i]).val();
      }

      $.ajax({
        url: "{{ url('/ajax/nat') }}",
        data: obj
      }).done(function(data){
        $('[rel="print"]').html(data);
      });
    });
  });
</script>
@stop