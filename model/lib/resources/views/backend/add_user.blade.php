@extends('backend.master')
@section('main')
@section('title','Add user')
@section('title2','Users')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Add user</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    @include('errors.note')
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>

        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Full Name</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_user" placeholder="Full name">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="level" class="form-control">
            <option value="1">Admin</option>
            <option value="2">Mod</option>
            <option value="3">Member</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Avatar</label>

        <div class="col-sm-10">
          <input type="file" name="avatar" onchange="changeImg(this)">
        </div>
      </div>

    </div>
    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-info">Submit</button>
      <button type="reset" name="reset" class="btn btn-default">Reset</button>
    </div>
  <!-- /.box-body -->

  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop