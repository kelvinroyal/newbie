<form id="frm" method="post" >
  <input type="hidden" name="id" id="id" value="{{$hd->id_hoidong}}">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Sửa thành viên hội đồng</h4>
    </div>
    <div class="modal-body">
      <div class="col-md-3">
        <div class="form-group">
          <select name="ky" class="form-control">
            <option value="{{$hd->ky}}">@if($hd->ky == 1) Kỳ I @endif @if($hd->ky == 2) Kỳ II @endif @if($hd->ky == 3) Kỳ III @endif</option>
            <option value="1">Kỳ I</option>
            <option value="2">Kỳ II</option>
            <option value="3">Kỳ III</option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <select name="nhom" class="form-control">
            <option value="{{$hd->nhom}}">@if($hd->nhom == 1) Nhóm 1 @endif @if($hd->nhom == 2) Nhóm 2 @endif @if($hd->nhom == 3) Nhóm 3 @endif</option>
            <option value="1">Nhóm 1</option>
            <option value="2">Nhóm 2</option>
            <option value="3">Nhóm 3</option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <select name="nam_hoidong" class="form-control">
            {{-- @foreach($hd as $hds)
            <option value="{{$hds->nam->id_nam}}" @if($hds->nam_hoidong == $hds->nam->id_nam) selected @endif>{{$hds->nam->so_nam}}</option>
            @endforeach --}}
            <option value="{{$hd->nam_hoidong}}">{{$hd->nam->so_nam}}</option>
          </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <input id="send" rel="submit" type="submit" name="submit" class="btn btn-primary" value="Cập nhật">
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
    url: "{{ url('/hoi-dong/danh-sach/') }}",
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