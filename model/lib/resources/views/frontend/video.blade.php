@extends('frontend.master')
@section('main')
@section('title','Video')
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

<div class="breadcumb-nav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Video</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row" id="select">
            <div class="col-4">
                <select name="continents" class="form-control">
                    <option value="unselected" selected="">Select a continent</option>
                    @foreach($cont as $c)
                    <option value="{{$c->id_continents}}">{{$c->name_continents}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-1">
                <button type="submit" rel="submit4" class="btn btn-info">Submit</button>
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
<div class="container">
    <div class="row" rel="print">
        @foreach($video as $v)
        <div class="single-post col-md-3 col-lg-3 col-12">
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
                            <a href="{{asset($v->model->continents->name_continents.'/model/'.$v->model->id_model.'.html')}}">{{str_limit($v->model->name_model,18)}}</a>
                        </div>
                        <!-- Post Date -->
                        <div class="post-date">
                            <a>{{date('Y-m-d', strtotime($v->created_at))}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-12">
            <div class="pagination-area d-sm-flex mt-15">
                {{$video->onEachSide(3)->links('vendor.pagination.default')}}
          </div>
      </div>
  </div>
</div>
@stop
@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="submit4"]').click(function(){

      var select = $('#select select');
      var obj = {};
      for(var i = 0; i < select.length; i++){
          obj[$(select[i]).attr('name')] = $(select[i]).val();
      }

      $.ajax({
        url: "{{ url('/ajax/cont3') }}",
        data: obj
      }).done(function(data){
        $('[rel="print"]').html(data);
      });
    });
  });
</script>
@stop