@extends('layout.master')
@section('title','Khóa luận cá nhân')
@section('title2','Thông tin khóa luận cá nhân')
@section('title3','Những khóa luận của bạn')
@section('main')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Khóa luận của bạn</h3>
  </div>
  <div class="box-body">
    @foreach($kl as $kls)
    <div class="col-md-6">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user-2">
        <div class="widget-user-header bg-yellow">
          <div class="widget-user-image">
            <img class="img-circle" src="dist/img/TLU.jpg" alt="TLU" style="margin-top: -10px;">
          </div>
          <!-- /.widget-user-image -->
          <h5 class="widget-user-username">{{$kls->de_tai}}</h5>
        </div>
        <div class="box-footer no-padding">
          <ul class="nav nav-stacked">
            <li><a>Phòng: <span class="pull-right badge bg-blue">{{$kls->phong}}</span></a></li>
            <li><a>Thời gian: <span class="pull-right badge bg-aqua">{{$kls->thoi_gian}}</span></a></li>
            <li><a>Năm: <span class="pull-right badge bg-green">{{$kls->nam->so_nam}}</span></a></li>
            <li>@if($kls->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$kls->bao_cao) }}">Báo cáo: <span class="pull-right glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')">Báo cáo: <span class="pull-right glyphicon glyphicon-download-alt" style=""></span></a>@endif</li>
            <li><a>Điểm: <span class="pull-right label bg-red btn" data-id="{{$kls->id_khoaluan}}" rel="khoa-luan">Chi tiết</span></a></li>
          </ul>
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
    @endforeach
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="modal fade" id="myModal" role="dialog">
  
    </div></div>
  </div>
  <!-- /.box-footer -->
  {{csrf_field()}}
</div>
@stop

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="khoa-luan"]').click(function(){

      let id = $(this).data('id');

      $.ajax({
        url: "{{ url('/ajax/khoa-luan') }}",
        data: { id: id }
      }).done(function(data){
        console.log(data)
        $('#myModal').html(data);
        $('#myModal').modal('show');
      });

    });
  });
</script>
@stop