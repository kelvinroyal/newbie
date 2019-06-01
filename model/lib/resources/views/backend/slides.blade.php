@extends('backend.master')
@section('main')
@section('title','Add slide')
@section('title2','Slides')
<div class="box box-primary">

  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="box-header">
        <h3 class="box-title">Add slide</h3>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Model's name</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_slide" placeholder="Model's name..." required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Link Slide</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="link_slide" placeholder="Link slide..." required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Continent Slide</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="cont_slide" placeholder="Continent's name..." required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Nation Slide</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="na_slide" placeholder="Nation's name..." required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Photo's Slide [2:3(4:6)]</label>

        <div class="col-sm-10">
          <input type="file" name="photo_slide" onchange="changeImg(this)" required="">
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="reset" name="reset" class="btn btn-default">Reset</button>
      </div>
    </div>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Slide List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Link Slide</th>
              <th>Photo's Slide</th>
              <th>Model's name</th>
              <th>Continents</th>
              <th>Nation</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($slide as $s)
            <tr>
              <td>{{$s->link_slide}}</td>
              <td><img width="150px" src="{{asset('lib/storage/app/bg-img/'.$s->photo_slide)}}"></td>
              <td>{{$s->name_slide}}</td>
              <td>{{$s->cont_slide}}</td>
              <td>{{$s->na_slide}}</td>
              <td><a href="{{asset('admin/slide/edit/'.$s->id_slide)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
              <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/slide/del/'.$s->id_slide)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- /.box-body -->
    </div>

    <div class="row">
      <div class="col-sm-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Show 5 photo's slide per page</div>
      </div>
      <div class="col-sm-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
          <ul class="pagination">
            <li class="paginate_button" id="example2_previous">
              {{$slide->links()}}
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