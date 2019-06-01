@extends('layout.master')
@section('title','Tìm kiếm')
@section('title2','Tìm kiếm')
@section('title3','Kết quả tìm kiếm')
@section('main')
<div class="row">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Khóa luận được tìm kiếm theo từ khóa: <b>{{$keyword}}</b></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="MSV">Mã sinh viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tên sinh viên bảo vệ">Tên sinh viên</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Đề tài đăng ký">Đề tài</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Giáo viên hướng dẫn">Giáo viên hướng dẫn</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Thời gian">Thời gian</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Phòng">Phòng</th>@if(Auth::user()->quyen<3)<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tải báo cáo">Tải xuống</th>@endif<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Điểm">Điểm tổng</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Điểm">Chi tiết</th></tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr role="row" class="odd">
            <td class="sorting_1">{{$item->ma_thanhvien}}</td>
            <td>{{$item->ten_thanhvien}}</td>
            <td>{{$item->de_tai}}</td>
            <td>@foreach($tv as $tvs) @if($tvs->id == $item->giao_vien) {{$tvs->ten_thanhvien}} @endif @endforeach</td>
            <td>{{$item->thoi_gian}}</td>
            <td>{{$item->phong}}</td>
            @if(Auth::user()->quyen<3)<td>@if($item->bao_cao != null)<a href="{{ asset('lib/storage/app/report/'.$item->bao_cao) }}"><span class="glyphicon glyphicon-download-alt" style=""></span></a>@else <a onclick="return alert('Không có file báo cáo')"><span class="glyphicon glyphicon-download-alt" style=""></span></a> @endif</td>@endif
            <td>{{$item->diem1*($item->ts1/100)+$item->diem2*($item->ts2/100)+$item->diem3*($item->ts3/100)+$item->diem4*($item->ts4/100)}}</td>
            <td><a><span class="glyphicon glyphicon-eye-open" data-id="{{$item->id_khoaluan}}" rel="tim-kiem"></span></a></td>
          </tr>
          @endforeach
          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            
          </div>

        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<div class="box-footer clearfix">
  <ul class="pagination pagination-sm no-margin pull-right">
    {{$items->links()}}
  </ul>
</div>
@stop
@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    
    $('[rel="tim-kiem"]').click(function(){

    let id = $(this).data('id');

    $.ajax({
      url: "{{ url('/ajax/tim-kiem') }}",
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