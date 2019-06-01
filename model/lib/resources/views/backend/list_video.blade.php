@extends('backend.master')
@section('main')
@section('title','List video')
@section('title2','Video')
<div class="row">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List video</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-6">

          </div>
          <div class="col-sm-6">

          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-sm-12">
            <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Model">Avatar</th>
                  {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Link">Link video</th> --}}
                  <th class="sorting col-xs-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Link">Video embed</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Link">Model</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Edit">Edit</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Delete">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($video as $v)
                <tr role="row" class="odd">
                  <td><img width="100px" src="{{$v->avatar_video}}"></td>
                  {{-- <td>{{$v->download}}</td> --}}
                  <td>{!!$v->embed!!}</td>
                  <td class="sorting_1">{{$v->model->name_model}}</td>
                  <td><a href="{{asset('admin/video/edit/'.$v->id_video)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                  <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/video/del/'.$v->id_video)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Show 5 videos per page</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              <ul class="pagination">
                <li class="paginate_button" id="example2_previous">
                  {{$video->links()}}      
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
  @stop