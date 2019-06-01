@extends('backend.master')
@section('main')
@section('title','List model')
@section('title2','Models')
<div class="row">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List model</h3>
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
                  <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Full name">Full name</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Country">Avatar</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nation">Nation</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Continent">Continent</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Information">Status</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Facebook">Facebook</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Sửa">Edit</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Xóa">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($model as $m)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$m->name_model}}</td>
                  <td><img width="100px" src="{{asset('lib/storage/app/avarmodel-img/'.$m->avatar_model)}}"></td>
                  <td>{{$m->nation->name_nation}}</td>
                  <td>{{$m->continents->name_continents}}</td>
                  <td>@if($m->status==0) None @elseif($m->status==1) Featured @endif</td>
                  <td>{{$m->facebook}}</td>
                  <td><a href="{{asset('admin/model/edit/'.$m->id_model)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                  <td><a href="{{asset('admin/model/del/'.$m->id_model)}}"><span class="glyphicon glyphicon-remove" onclick="return confirm('Do you want to delete?')"></span></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Show 10 models per page</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              <ul class="pagination">
                <li class="paginate_button" id="example2_previous">
                  {{$model->links()}}
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