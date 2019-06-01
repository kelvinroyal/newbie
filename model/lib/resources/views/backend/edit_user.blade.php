@extends('backend.master')
@section('main')
@section('title','Edit user')
@section('title2','Users')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Edit user</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" value="{{$user->email}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>

        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" value="{{$user->password}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Full Name</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_user" value="{{$user->name_user}}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="level" class="form-control">
            <option value="1"  @if($user->level==1) selected @endif>Admin</option>
            <option value="2"  @if($user->level==2) selected @endif>Mod</option>
            <option value="3"  @if($user->level==3) selected @endif>Member</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Avatar</label>

        <div class="col-sm-10">
          <input type="file" name="avatar" onchange="changeImg(this)">
          <img width="150px" src="{{asset('lib/storage/app/avatar/'.$user->avatar)}}">
        </div>
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-info">Submit</button>
      <a href="{{asset('admin/user/list')}}" class="btn btn-default">Cancel</a>
    </div>

  <!-- /.box-body -->

  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop