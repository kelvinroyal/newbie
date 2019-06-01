@extends('backend.master')
@section('main')
@section('title','Add Continent')
@section('title2','Continents')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Add Continent</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  @include('errors.note')
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Continent</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_continents" placeholder="continent..." required="">
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-info">Submit</button>
        <button type="reset" name="reset" class="btn btn-default">Reset</button>
      </div>
    </div>
    {{csrf_field()}}
  </form>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Continent List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <table class="table table-striped">
        <tbody>
          <tr>
            <th>Continent</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          @foreach($cont as $conts)
          <tr>
            <td>{{$conts->name_continents}}</td>
            <td><a href="{{asset('admin/continent/edit/'.$conts->id_continents)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/continent/del/'.$conts->id_continents)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
      <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        <ul class="pagination">
          <li class="paginate_button">
            {{$cont->links()}}
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- /.box-body -->

</div>
@stop