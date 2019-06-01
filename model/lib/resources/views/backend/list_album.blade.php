@extends('backend.master')
@section('main')
@section('title','List album')
@section('title2','Albums')
<div class="row">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List album</h3>
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
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Album's name">Album's name</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Avatar">Avatar</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Model">Model</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Edit">Edit</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Delete">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($album as $al)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$al->name_album}}</td>
                  <td><img width="100px" height="130px" src="{{$al->avatar_album}}"></td>
                  <td>{{$al->model->name_model}}</td>
                  <td><a href="{{asset('admin/album/edit/'.$al->id_album)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                  <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/album/del/'.$al->id_album)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Show 10 albums per page</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              <ul class="pagination">
                <li class="paginate_button previous" id="example2_previous">
                  {{$album->links()}}
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