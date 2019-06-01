<div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
		<form method="post" id="frm" >
			<input type="hidden" name="id" id="id" value="{{$bc->id_khoaluan}}">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Public tải báo cáo cho sinh viên</h4>
			</div>
			<div class="modal-body">
				<div class="radio">
					<label>
						<input required="" type="radio" @if($bc->pub == 1) checked="" @endif name="pub" value=1>Cho phép tải
					</label>
				</div><br>
				<div class="radio">
					<label>
						<input required="" type="radio" @if($bc->pub != 1) checked="" @endif name="pub" value=2>Không cho phép tải
					</label>
				</div>
			</div>
			<div class="modal-footer">
				<input id="send" rel="submit" type="submit" name="submit" class="btn btn-primary" value="Cập nhật">
				<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
			</div>
			{{csrf_field()}}
		</form>
	</div>
</div>

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('[rel="submit"]').click(function(){
			var $data = $('form#frm').serialize();
			$.ajax({
				type : 'POST',
				dataType: 'json',
				url: "{{ url('/bao-cao') }}",
			});
		});

	});
</script>
@stop