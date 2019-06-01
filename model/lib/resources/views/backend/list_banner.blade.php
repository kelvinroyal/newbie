@extends('backend.master')
@section('main')
@section('title','List banner')
@section('title2','Banners')
<div class="row">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List banner</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Link">ID</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Content">Content</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Link">Link</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Edit">Edit</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Delete">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($banner as $b)
                <tr role="row" class="odd">
                  <td>{{$b->id_banner}}</td>
                  <td class="sorting_1">{!!$b->content_banner!!}</td>
                  <td>{{$b->link_banner}}</td>
                  <td><a href="{{asset('admin/banner/edit/'.$b->id_banner)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                  <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/banner/del/'.$b->id_banner)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Show 5 banners per page</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              <ul class="pagination">
                <li class="paginate_button" id="example2_previous">
                  {{$banner->links()}}
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