@extends('backend.master')
@section('main')
@section('title','Add slide2')
@section('title2','Slides2')
<div class="box box-primary">

  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="box-header">
        <h3 class="box-title">Add slide2</h3>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Link Slide2</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="link_slide2" placeholder="Link slide2..." required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Photo's Slide2 [1:1(square)]</label>

        <div class="col-sm-10">
          <input type="file" name="photo_slide2" onchange="changeImg(this)" required="">
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="reset" name="reset" class="btn btn-default">Reset</button>
      </div>
    </div>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Slide2 List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Link Slide2</th>
              <th>Photo's Slide2</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($slide2 as $s)
            <tr>
              <td>{{$s->link_slide2}}</td>
              <td><img width="150px" src="{{asset('lib/storage/app/slide2-img/'.$s->photo_slide2)}}"></td>
              <td><a href="{{asset('admin/slide2/edit/'.$s->id_slide2)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
              <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/slide2/del/'.$s->id_slide2)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- /.box-body -->
    </div>

    <div class="row">
      <div class="col-sm-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Show 10 photo's slide2 per page</div>
      </div>
      <div class="col-sm-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
          <ul class="pagination">
            <li class="paginate_button" id="example2_previous">
              {{$slide2->links()}}
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