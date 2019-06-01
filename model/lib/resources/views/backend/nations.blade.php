@extends('backend.master')
@section('main')
@section('title','Add nation')
@section('title2','Nations')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Add Nation</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nations</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_nation" placeholder="nation..." required="">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select required="" name="continents_nation" class="form-control">
            <option value="unselect" selected="">Select Continent</option>
            @foreach($cont as $c)
            <option value="{{$c->id_continents}}">{{$c->name_continents}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="reset" name="reset" class="btn btn-default">Reset</button>
      </div>
    </div>
{{csrf_field()}}
</form>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">List Country</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>National</th>
              <th>Continent</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($nation as $n)
            <tr>
              <td>{{$n->name_nation}}</td>
              <td>{{$n->name_continents}}</td>
              <td><a href="{{asset('admin/nation/edit/'.$n->id_nation)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
              <td><a onclick="return confirm('Do you want to delete?')" href="{{asset('admin/nation/del/'.$n->id_nation)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <div class="row">
      <div class="col-sm-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
          <ul class="pagination">
            <li class="paginate_button previous" id="example2_previous">
              {{$nation->links()}}
            </li>
          </ul>
        </div>
      </div>
    </div>

  <!-- /.box-body -->

</div>
@stop