@extends('backend.master')
@section('main')
@section('title','Edit continent')
@section('title2','Continents')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Edit continent</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" method="post">
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Continent</label>

				<div class="col-sm-10">
					<input type="text" class="form-control" name="name_continents" value="{{$cont->name_continents}}">
				</div>
			</div>

			<div class="box-footer">
				<button type="submit" class="btn btn-info">Submit</button>
				<a href="{{asset('admin/continent')}}" class="btn btn-default">Cancel</a>
			</div>             
	</div>
	<!-- /.box-body -->

	<!-- /.box-footer -->
	{{csrf_field()}}
</form>
</div>
@stop