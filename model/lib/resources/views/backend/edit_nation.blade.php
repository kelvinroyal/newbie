@extends('backend.master')
@section('main')
@section('title','Edit nation')
@section('title2','Nation')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Edit nation</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" method="post">
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nation</label>

				<div class="col-sm-10">
					<input type="text" class="form-control" name="name_nation" value="{{$nation->name_nation}}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Select Continent</label>
				<div class="col-sm-10">
					<select name="continents_nation" class="form-control">
						@foreach($cont as $c)
						<option value="{{$c->id_continents}}" @if($c->id_continents == $nation->id_nation) selected @endif>{{$c->name_continents}}</option>
						@endforeach
					</select>
				</div>
			</div> 
			<div class="box-footer">
				<button type="submit" class="btn btn-info">Submit</button>
				<a href="{{asset('admin/nation')}}" class="btn btn-default">Cancel</a>
			</div>             

	</div>
	<!-- /.box-body -->

	<!-- /.box-footer -->
	{{csrf_field()}}
</form>
</div>
@stop