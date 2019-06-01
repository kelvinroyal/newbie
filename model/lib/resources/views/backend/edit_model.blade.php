@extends('backend.master')
@section('main')
@section('title','Edit model')
@section('title2','Models')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Edit model</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Model's name</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_model" value="{{$model->name_model}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Cover</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="cover_model" value="{{$model->cover_model}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Avatar</label>

        <div class="col-sm-10">
          <input type="file" name="avatar_model" onchange="changeImg(this)">
          <img width="150px" src="{{asset('lib/storage/app/avarmodel-img/'.$model->avatar_model)}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Information</label>
        <div class="col-sm-10">
          <textarea required="" class="form-control" id="info" rows="3" name="info_model">{{$model->info_model}}</textarea>
          <script type="text/javascript">
            CKEDITOR.replace('info');
          </script>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="continents_model" class="form-control">
            @foreach($cont as $c)
            <option value="{{$c->id_continents}}" @if($c->id_continents==$model->continents_model) selected="selected" @endif>{{$c->name_continents}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="nation_model" class="form-control">
            @foreach($nation as $n)
            <option value="{{$n->id_nation}}" @if($n->id_nation==$model->nation_model) selected="selected" @endif>{{$n->name_nation}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>

        <div class="col-sm-10">
          <input type="radio" name="status" value="0" @if($model->status==0) checked="checked" @endif>None<br>
          <input type="radio" name="status" value="1" @if($model->status==1) checked="checked" @endif>Featured<br>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Facebook</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="facebook" value="{{$model->facebook}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Instagram</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="instagram" value="{{$model->instagram}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Twitter</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="twitter" value="{{$model->twitter}}">
        </div>
      </div>              
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-info">Submit</button>
      <a href="{{asset('admin/model/list')}}" class="btn btn-default">Cancel</a>
    </div>

  <!-- /.box-body -->

  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop