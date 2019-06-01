@extends('frontend.master')
@section('main')
@section('title','Single Video')

<div class="breadcumb-nav">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{asset('video')}}"></i> Video</a></li>
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
    <div class="row single-video">
        {!!$sv->embed!!}
        <script type="text/javascript" src="http://ylx-4.com/layer.php?section=ad5&pub=593847&ga=g&show=3&fp"></script>
    </div>
    <div class="row">
        <a style="margin: 0 auto;" href="{{$sv->download}}"><button style="cursor: pointer;" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
    </div>
</div>
@stop