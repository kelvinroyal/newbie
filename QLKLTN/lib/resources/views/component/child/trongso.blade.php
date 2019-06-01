<form id="frm" method="post" >
	<input type="hidden" name="id" id="id" value="{{$ts->id_hoidong}}">
<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Cập nhật trọng số</h4>
		</div>
		<div class="modal-body">
			<label>Trọng số: </label>
			<input type="text" class="form-control" name="trong_so" value="{{$ts->trong_so}}">
		</div>
		<div class="modal-footer">
			<input type="submit" name="submit" rel="submit" class="btn btn-primary" value="Cập nhật">
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
    url: "{{ url('/trong-so') }}",
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