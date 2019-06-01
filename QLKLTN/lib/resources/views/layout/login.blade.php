<!DOCTYPE html>
<html>
<head>
  <base href="{{asset('public/layout')}}/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quản lý KLTN | Đăng nhập</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<div class="login-box"">
  <div class="login-logo">
    <p><b>Quản lý </b>KLTN</p>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p align="center"><img src="dist/img/TLU.jpg" style="width: 115px;"></p>
    <p class="login-box-msg">Trường ĐH Thăng Long</p>
    <form role="form" method="post">
      <fieldset>
        @include('errors.note')
      <div class="form-group has-feedback">
        <input required="" type="text" name="ma_thanhvien" class="form-control" placeholder="Mã cá nhân" value="{{old('ma_thanhvien')}}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required="" type="password" name="password" class="form-control" placeholder="Mật khẩu">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label>
              <input type="checkbox" name="remember" value="Remember me"> Nhớ tôi
          </label>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
      </fieldset>
      {{csrf_field()}}
    </form>

    <div class="social-auth-links text-center">
      <p style="font-weight: bold;">- Xin chào -</p>
      <p>Bản quyền thuộc về <b>Nguyễn Việt Hoàng</b></p>
    </div>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
