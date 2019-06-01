@extends('backend.master')
@section('main')
@section('title','List user')
@section('title2','Users')
<div class="row">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List user</h3>
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
                  <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Email">Email</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Full name">Full name</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Access">Access</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Photo's User">Avatar</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Sửa">Edit</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Xóa">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list as $l)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$l->email}}</td>
                  <td>{{$l->name_user}}</td>
                  <td>@if($l->level == 1) Admin @elseif($l->level == 2) Mod @elseif($l->level == 3) Member @endif</td>
                  <td><img width="150px" src="{{asset('lib/storage/app/avatar/'.$l->avatar)}}"></td>
                  <td><a href="{{asset('admin/user/edit/'.$l->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                  <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/user/del/'.$l->id)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Show 5 users per page</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              <ul class="pagination">
                <li class="paginate_button previous" id="example2_previous">
                  {{$list->links()}}
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