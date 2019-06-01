<form id="frm" method="post" >
  <input type="hidden" name="id" id="id" value="{{$kl->id_khoaluan}}">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Điểm khóa luận</h4>
      </div>
      <div class="modal-body">
        <label>Chủ tịch: </label>
        @if($kl->thietlap_khoaluan==null)
          <select class="form-control" disabled="disabled" style="-moz-appearance: none; -webkit-appearance: none; appearance: none;">
            <option value="" selected=""></option>
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
        @else
          <select class="form-control" disabled="disabled" style="-moz-appearance: none; -webkit-appearance: none; appearance: none;">
            <option value="{{$tl->hd1}}">{{$tl->thanhvien1->ten_thanhvien}}</option>
          </select>
        @endif
        @if(Auth::user()->quyen==1)
          <input type="text" class="form-control" name="diem1" value="{{$kl->diem1}}">
          <input style="width: 30px;" type="text" name="ts1" value="{{$kl->ts1}}">%
        @else
          <input type="text" class="form-control" name="diem1" disabled="disabled" value="{{$kl->diem1}}">
          <input style="width: 30px;" type="text" name="ts1" disabled="disabled" value="{{$kl->ts1}}">%
        @endif
      </div>
      <div class="modal-body">
        <label>Ủy viên: </label>
        @if($kl->thietlap_khoaluan==null)
          <select class="form-control" disabled="disabled" style="-moz-appearance: none; -webkit-appearance: none; appearance: none;">
            <option value="" selected=""></option>
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
        @else
          <select class="form-control" disabled="disabled" style="-moz-appearance: none; -webkit-appearance: none; appearance: none;">
            <option value="{{$tl->hd2}}">{{$tl->thanhvien2->ten_thanhvien}}</option>
          </select>
        @endif
        @if(Auth::user()->quyen==1)
          <input type="text" class="form-control" name="diem2" value="{{$kl->diem2}}">
          <input style="width: 30px;" type="text" name="ts2" value="{{$kl->ts2}}">%
        @else
          <input type="text" class="form-control" name="diem2" disabled="disabled" value="{{$kl->diem2}}">
          <input style="width: 30px;" type="text" name="ts2" disabled="disabled" value="{{$kl->ts2}}">%
        @endif
      </div>
      <div class="modal-body">
        <label>Phản biện: </label>
        @if($kl->thietlap_khoaluan==null)
          <select class="form-control" disabled="disabled" style="-moz-appearance: none; -webkit-appearance: none; appearance: none;">
            <option value="" selected=""></option>
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
        @else
          <select class="form-control" disabled="disabled" style="-moz-appearance: none; -webkit-appearance: none; appearance: none;">
            <option value="{{$tl->hd3}}">{{$tl->thanhvien3->ten_thanhvien}}</option>
          </select>
        @endif
        @if(Auth::user()->quyen==1)
          <input type="text" class="form-control" name="diem3" value="{{$kl->diem3}}">
          <input style="width: 30px;" type="text" name="ts3" value="{{$kl->ts3}}">%
        @else
          <input type="text" class="form-control" name="diem3" disabled="disabled" value="{{$kl->diem3}}">
          <input style="width: 30px;" type="text" name="ts3" disabled="disabled" value="{{$kl->ts3}}">%
        @endif
      </div>
      <div class="modal-body">
        <label>Thư ký: </label>
        @if($kl->thietlap_khoaluan==null)
          <select class="form-control" disabled="disabled" style="-moz-appearance: none; -webkit-appearance: none; appearance: none;">
            <option value="" selected=""></option>
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
        @else
          <select class="form-control" disabled="disabled" style="-moz-appearance: none; -webkit-appearance: none; appearance: none;">
            <option value="{{$tl->hd4}}">{{$tl->thanhvien4->ten_thanhvien}}</option>
          </select>
        @endif
        @if(Auth::user()->quyen==1)
          <input type="text" class="form-control" name="diem4" value="{{$kl->diem4}}">
          <input style="width: 30px;" type="text" name="ts4" value="{{$kl->ts4}}">%
        @else
          <input type="text" class="form-control" name="diem4" disabled="disabled" value="{{$kl->diem4}}">
          <input style="width: 30px;" type="text" name="ts4" disabled="disabled" value="{{$kl->ts4}}">%
        @endif
      </div>
      <div class="modal-body">
        @if(Auth::user()->quyen == 1) <input type="submit" name="submit" rel="submit" class="btn btn-secondary" value="Cập nhật"> @endif
        <label>Tổng điểm = </label>
        {{$kl->diem1*($kl->ts1/100)+$kl->diem2*($kl->ts2/100)+$kl->diem3*($kl->ts3/100)+$kl->diem4*($kl->ts4/100)}}
      </div>
      <div class="modal-body">
        @if(isset($kl->diem1) && isset($kl->diem2) && isset($kl->diem3) && isset($kl->diem4))
          @if($kl->diem1*($kl->ts1/100)+$kl->diem2*($kl->ts2/100)+$kl->diem3*($kl->ts3/100)+$kl->diem4*($kl->ts4/100) >= 5) 
            <p style="color: red; font-weight: bold; text-align: center; text-transform: uppercase;">trên trung bình</p>
          @else
            <p style="color: green; font-weight: bold; text-align: center; text-transform: uppercase;">dưới trung bình</p>
          @endif
        @else
            <p style="color: blue; font-weight: bold; text-align: center; text-transform: uppercase;">chưa có điểm</p>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
      </div>
    </div>

  </div>
  {{csrf_field()}}
</form>

<script type="text/javascript">
  $(document).ready(function(){
    $('[rel="submit"]').click(function(){
    var $data = $('form#frm').serialize();
    $.ajax({
    type : 'POST',
        dataType: 'json',
    url: "{{ url('/khoa-luan/danh-sach') }}",
    data: $data,
        success : function($json){
            alert($json.msg);
            if($json.error == false)
                window.location = $json.url;
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {}
  });
});
});
</script>