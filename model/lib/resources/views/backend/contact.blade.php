@extends('backend.master')
@section('main')
@section('title','Suggestion List')
@section('title2','Suggestion')
<div class="box box-primary">

  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Suggestion List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Name</th>
              <th>Facebook</th>
              <th>Twitter</th>
              <th>Instagram</th>
              <th>Info</th>
              <th>Delete</th>
            </tr>
            @foreach($contact as $c)
            <tr>
              <td>{{$c->name}}</td>
              <td>{{$c->facebook}}</td>
              <td>{{$c->twitter}}</td>
              <td>{{$c->instagram}}</td>
              <td>{{$c->info}}</td>
              <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/contact/del/'.$c->id_contact)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- /.box-body -->
    </div>

    <div class="row">
      <div class="col-sm-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Show 10 comments per page</div>
      </div>
      <div class="col-sm-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
          <ul class="pagination">
            <li class="paginate_button" id="example2_previous">
              {{$contact->links()}}
            </li>
          </ul>
        </div>
      </div>
    </div>

  <!-- /.box-body -->

</form>
</div>
@stop