@extends('frontend.master')
@section('main')
@section('title','Album')
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
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Album</li>
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
        @foreach($album as $a)
        <div class="album col-md-3 col-lg-3 col-6">
            <a href="{{asset('single-album/'.$a->id_album.'.html')}}"><img style="height: 300px;" class="img-thumbnail" src="{{$a->avatar_album}}">
            <h6 style="text-align: center;">{{$a->name_album}}</h6></a>
        </div>
        @endforeach
        <div class="col-12">
            <div class="pagination-area d-sm-flex mt-15">
                {{$album->onEachSide(3)->links('vendor.pagination.default')}}
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
        url: "{{ url('/ajax/cont') }}",
        data: obj
      }).done(function(data){
        $('[rel="print"]').html(data);
      });
    });
  });
</script>
@stop