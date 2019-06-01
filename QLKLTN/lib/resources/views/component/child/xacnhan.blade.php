<div class="modal-dialog">
              <!-- Modal content-->
  <div class="modal-content">
    <form method="post" id="frm" >
      <input type="hidden" name="id" id="id" value="{{$kl->id_khoaluan}}">
      <input type="hidden" name="tv" id="tv" value="{{$kl->thanhvien_khoaluan}}">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Xác nhận bảo vệ</h4>
    </div>
    <div class="modal-body">
        <label>Đề tài khóa luận:</label>
        <input type="text" class="form-control select" name="de_tai" value="{{$kl->de_tai}}">
    </div>
    <div class="modal-body">
      <label>Giáo viên hướng dẫn: </label>
      <select name="giao_vien" class="form-control">
        <option value="{{$kl->giao_vien}}">@if($kl->huongdan != null) {{$kl->huongdan->ten_thanhvien}} @endif</option>
        @foreach($gv as $tv)
          <option value="{{$tv->id}}">{{$tv->ten_thanhvien}}</option>
        @endforeach
      </select>
    </div>
    <div class="modal-body">
      <label>Thời gian: </label>
      <input type="datetime-local" class="form-control" name="thoi_gian" value="{{ date('Y-m-d', strtotime($kl->thoi_gian))}}T{{date('H:i', strtotime($kl->thoi_gian))}}">
    </div>
    <div class="modal-body">
      <label>Phòng: </label>
      <input type="text" class="form-control" name="phong" value="{{ $kl->phong }}">
    </div>
    <div class="modal-body" rel="thietlap">
      {{-- {{ print_r(array_dot($kl->giaovien->toArray()['*'])) }} --}}
      <label>Chọn hội đồng chấm: </label><br>
      <label>Chủ tịch</label>
      <select name="hd1" class="form-control">
        <option value="" selected="">Lựa chọn giáo viên</option>
        @foreach($hd as $tv)
        @php $check = 0;  @endphp
          @foreach($kl->giaovien as $gv)
            @if($tv->thanhvien->id === $gv->id && $gv->pivot->chuc_vu === 1)
              @php $check = $gv->id; @endphp
            @endif
          @endforeach
           <option value="{{$tv->thanhvien->id}}" @if($check === $tv->thanhvien->id ) selected @endif>{{ $tv->thanhvien->ten_thanhvien }}</option>
         @endforeach
      </select>
      <label>Ủy viên</label>
      <select name="hd2" class="form-control">
        <option value="" selected="">Lựa chọn giáo viên</option>
        @foreach($hd as $tv)
        @php $check = 0;  @endphp
          @foreach($kl->giaovien as $gv)
            @if($tv->thanhvien->id === $gv->id && $gv->pivot->chuc_vu === 2)
              @php $check = $gv->id; @endphp
            @endif
          @endforeach
           <option value="{{$tv->thanhvien->id}}" @if($check === $tv->thanhvien->id ) selected @endif>{{ $tv->thanhvien->ten_thanhvien }}</option>
         @endforeach
      </select>
      <br>
      <label>Phản biện</label>
      <select name="hd3" class="form-control">
        <option value="" selected="">Lựa chọn giáo viên</option>
        @foreach($hd as $tv)
        @php $check = 0;  @endphp
          @foreach($kl->giaovien as $gv)
            @if($tv->thanhvien->id === $gv->id && $gv->pivot->chuc_vu === 3)
              @php $check = $gv->id; @endphp
            @endif
          @endforeach
           <option value="{{$tv->thanhvien->id}}" @if($check === $tv->thanhvien->id ) selected @endif>{{ $tv->thanhvien->ten_thanhvien }}</option>
         @endforeach
      </select>
      <label>Thư ký</label>
      <select name="hd4" class="form-control">
        <option value="" selected="">Lựa chọn giáo viên</option>
        @foreach($hd as $tv)
        @php $check = 0;  @endphp
          @foreach($kl->giaovien as $gv)
            @if($tv->thanhvien->id === $gv->id && $gv->pivot->chuc_vu === 4)
              @php $check = $gv->id; @endphp
            @endif
          @endforeach
           <option value="{{$tv->thanhvien->id}}" @if($check === $tv->thanhvien->id ) selected @endif>{{ $tv->thanhvien->ten_thanhvien }}</option>
         @endforeach
      </select>
    </div>
    <div class="modal-body">
      <label>Chọn hội đồng đã có</label>
      <select name="thietlap_khoaluan" class="form-control" rel="hoidong">
          @if($kl->thietlap_khoaluan != null)
            @foreach($tl as $t)
            @if($kl->thanhvien->khoa_thanhvien == $t->khoa_thietlap)
              <option value="{{$t->id_thietlap}}" @if($kl->thietlap_khoaluan == $t->id_thietlap) selected @endif>Hội đồng số {{$t->id_thietlap}}</option>
            @endif
            @endforeach
              <option value="">Bỏ chọn hội đồng</option>
          @else
              <option value="" selected="">Lựa chọn hội đồng</option>
            @foreach($tl as $t)
            @if($kl->thanhvien->khoa_thanhvien == $t->khoa_thietlap)
              <option value="{{$t->id_thietlap}}">Hội đồng số {{$t->id_thietlap}}</option>
            @endif
            @endforeach
          @endif
      </select>
    </div>
    <div class="modal-footer">
      <input id="send" rel="submit" type="submit" name="submit" class="btn btn-primary" value="Cập nhật">
      <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
    </div>
    {{csrf_field()}}
  </form>
  </div>

</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('[rel="submit"]').click(function(){
    var $data = $('form#frm').serialize();
    $.ajax({
    type : 'POST',
      dataType: 'json',
    url: "{{ url('/khoa-luan/xac-nhan/') }}",
    // data: $data,
    //     success : function($json){
    //         alert($json.msg);
    //         if($json.error == false)
    //             window.location = $json.url;
    //     },
    //     error : function(XMLHttpRequest, textStatus, errorThrown) {}
   });
  });

  function select()
    {
      var id = $('[rel="hoidong"] :selected').val();
      $.ajax({
        url: "{{ url('/ajax/thietlap') }}",
        data: { idhoidong: id @if($kl->thietlap_khoaluan != null) ,idthietlap: {{ $kl->thietlap_khoaluan }} @endif}
      }).done(function(data2){
        $('[rel="thietlap"]').html(data2)
      });
    }

    select();
    $('[rel="hoidong"]').change(function(){
      select();

    });
});
</script>
