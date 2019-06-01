@extends('frontend.master')
@section('main')
@section('title',$sa->name_album)
<div class="ad-left">
    @foreach($banner as $b)
    @if($b->id_banner==2)
    <div style='margin:0 0 5px 0; padding:0;width:160px;position:fixed; right:50%; top:90px; margin-right:590px;'>
        <span data-mce-style="color: #ff0000;">
            <a href="{{$b->link_banner}}"> {!!$b->content_banner!!}</a>
        </span>
    </div>
    @endif
    @endforeach
</div>
<div class="ad-right"> 
    @foreach($banner as $b)
    @if($b->id_banner==2) 
    <div style='margin:0 0 5px 0; padding:0;width:160px;position:fixed; left:50%; top:90px; margin-left:590px;'>
        <span data-mce-style="color: #ff0000;">
            <a href="{{$b->link_banner}}"> {!!$b->content_banner!!}</a>
        </span>
    </div>
    @endif
    @endforeach
</div>

<div class="breadcumb-nav">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{asset('album')}}"></i> Album</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$sa->name_album}}</li>
                        <li class="breadcrumb-item"><a href="{{asset($sa->model->continents->name_continents.'/model/'.$sa->model->id_model.'.html')}}">{{$sa->model->name_model}}</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-2">
                <div class="post-share pull-right">
                   <div class="fb-share-button" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                    </div>
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
    <div class="row">
        <div class="col-12 single-album">
            {!!$sa->content_album!!}
        </div>
    </div>
</div>
@stop