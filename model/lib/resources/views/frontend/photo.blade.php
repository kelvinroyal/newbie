@extends('frontend.master')
@section('main')
@section('title','Photo')
<div class="breadcumb-nav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Photo</li>
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
<div class="container-fluid">
    <div class="row" rel="print">
        @foreach($photo as $p)
        <div class="col-md-2 col-lg-2 col-6 zoom2">
            <img data-id="{{$p->id_photo}}" rel="view-photo" style="cursor: -webkit-zoom-in;" src="{{$p->p_photo}}">
        </div>
        @endforeach
        
        <div class="col-12">
            <div class="pagination-area d-sm-flex mt-15">
                {{$photo->onEachSide(3)->links('vendor.pagination.default')}}
          </div>
      </div>
        
        <!-- The Modal -->
        <div id="myModal3" class="modal">
        </div>
  </div>
</div>
@stop
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    // Get the modal
        $('[rel="view-photo"]').click(function(){

          let id = $(this).data('id');

          $.ajax({
            url: "{{ url('/ajax/view-photo') }}",
            data: { id: id }
          }).done(function(data){
            console.log(data)
            $('#myModal3').html(data);
            $('#myModal3').modal('show');
          });

        });

        $('[rel="submit4"]').click(function(){

          var select = $('#select select');
          var obj = {};
          for(var i = 0; i < select.length; i++){
              obj[$(select[i]).attr('name')] = $(select[i]).val();
          }

          $.ajax({
            url: "{{ url('/ajax/cont2') }}",
            data: obj
          }).done(function(data){
            $('[rel="print"]').html(data);
          });
        });
    });
</script>
@stop