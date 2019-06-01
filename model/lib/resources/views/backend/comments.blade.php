@extends('backend.master')
@section('main')
@section('title','Comment List')
@section('title2','Comments')
<div class="box box-primary">

  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Comment List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Model</th>
              <th>Comment</th>
              <th>User</th>
              <th>Check</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($comment as $c)
            <tr>
              @foreach($model as $m)
              @if($m->id_model==$c->model_comment) <td>{{$m->name_model}}</td> @endif
              @endforeach
              <td>{{$c->content_comment}}</td>
              <td>{{$c->user->name_user}}</td>
              <td>@if($c->status_comment==1) Checked @else None @endif</td>
              <td><a href="{{asset('admin/comment/edit/'.$c->id_comment)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
              <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/comment/del/'.$c->id_comment)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
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
              {{$comment->links()}}
            </li>
          </ul>
        </div>
      </div>
    </div>

  <!-- /.box-body -->

</form>
</div>
@stop