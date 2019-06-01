@extends('layout.master')
@section('title','Danh sách đề tài gợi ý')
@section('title2','Quản lý đề tài')
@section('title3','Danh sách đề tài')
@section('main')

<div class="row" id="select">
  <div class="col-md-2">
    <div class="form-group">
      <select name="khoa" rel="khoa" class="form-control">
        <option value="0" selected="">Lựa chọn khoa</option>
        @foreach($khoalist as $khoa)
        <option value="{{$khoa->id_khoa}}">{{$khoa->ten_khoa}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <select name="nganh" rel="nganh" class="form-control">
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <select name="ky" class="form-control">
        <option value="0" selected="">Lựa chọn kỳ</option>
        <option value="1">Kỳ I</option>
        <option value="2">Kỳ II</option>
        <option value="3">Kỳ III</option>
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <select name="nhom" class="form-control">
        <option value="0" selected="">Lựa chọn nhóm</option>
        <option value="1">Nhóm 1</option>
        <option value="2">Nhóm 2</option>
        <option value="3">Nhóm 3</option>
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <select name="nam_detai" class="form-control">
        <option value="0" selected="">Lựa chọn năm</option>
        @foreach($namlist as $nam)
        <option value="{{$nam->id_nam}}">{{$nam->so_nam}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-1">
    <button type="submit" rel="submit" class="btn bg-purple" onclick="showModal();">Lọc</button>
  </div>
</div>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Các đề tài được giáo viên gợi ý</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body" rel="indulieu">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Đề tài</th>
          <th>Khoa</th>
          <th>Ngành</th>
          <th>Năm</th>
          <th>Giáo viên gợi ý</th>
          <th>Đã chọn</th>
          @if(Auth::user()->quyen != 3) <th style="width: 60px">Sửa</th>
          <th style="width: 60px">Xóa</th>@endif
        </tr>
      </thead>
      <tbody>
        @foreach($detailist as $detai)
        <tr>
          <td>{{$detai->id_detai}}.</td>
          <td>{{$detai->ten_detai}}</td>
          <td>{{ $detai->thanhvien->khoa->ten_khoa }}</td>
          <td>{{ $detai->thanhvien->nganh->ten_nganh }}</td>
          <td>{{$detai->nam->so_nam}}</td>
          <td>{{$detai->thanhvien->ten_thanhvien}}</td>
          <td class="badge bg-grey">
            @php $a=0; @endphp
            @foreach($kllist as $kl)
            @if($kl->de_tai == $detai->ten_detai)
            @php $a=$a+1; @endphp
            @endif
            @endforeach
            {{$a}} lần
          </td>
          @if(Auth::user()->quyen != 3) <td><a href="{{asset('de-tai/edit/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
          <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('de-tai/delete/'.$detai->id_detai)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>@endif
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="box-footer clearfix">
      <ul class="pagination pagination-sm no-margin pull-right">
        {{$detailist->links()}}
      </ul>
    </div>
  </div>
  <!-- /.box-body -->
</div>

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
        url: "{{ url('/ajax/detai') }}",
        data: obj
      }).done(function(data){
        $('[rel="indulieu"]').html(data);
      });

    });




    $('[rel="khoa"]').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "{{ url('/ajax/nganh') }}",
        data: { idkhoa: id }
      }).done(function(data){
        $('[rel="nganh"]').html(data)
        console.log(data);
      });

    });

  });



// popup load
function showModal() {
  $('body').loadingModal({text: 'Đợi chút...'});

  var delay = function(ms){ return new Promise(function(r) { setTimeout(r, ms) }) };
  var time = 700;

  delay(time)
  .then(function() { $('body').loadingModal('animation', 'fadingCircle').loadingModal('backgroundColor', 'gray'); return delay(time);})
  .then(function() { $('body').loadingModal('hide'); return delay(time); } )
  .then(function() { $('body').loadingModal('destroy') ;} );
}




var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
@stop