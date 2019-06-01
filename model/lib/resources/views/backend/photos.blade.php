@extends('backend.master')
@section('main')
@section('title','Add photo')
@section('title2','Photos')
<div class="box box-primary">

  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="box-header">
        <h3 class="box-title">Add photo</h3>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Model</label>
        <div class="col-sm-10">
          <select required="" name="model_photo" class="selectpicker form-control" data-live-search="true">
            <option value="unselect" selected="">Select Model</option>
            @foreach($model as $m)
            <option value="{{$m->id_model}}">{{$m->name_model}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Photo's Model</label>

        <div class="col-sm-10">
          <input class="form-control" type="text" required="" name="p_photo" placeholder="Link photo">
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="reset" name="reset" class="btn btn-default">Reset</button>
      </div>
    </div>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Photo List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Model</th>
              <th>Photo</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($photo as $p)
            <tr>
              <td>{{$p->model->name_model}}</td>
              <td><img width="150px" src="{{$p->p_photo}}"></td>
              <td><a href="{{asset('admin/photo/edit/'.$p->id_photo)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
              <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/photo/del/'.$p->id_photo)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- /.box-body -->
    </div>

    <div class="row">
      <div class="col-sm-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Show 5 photos per page</div>
      </div>
      <div class="col-sm-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
          <ul class="pagination">
            <li class="paginate_button" id="example2_previous">
              {{$photo->links()}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  {{csrf_field()}}
</form>
@stop