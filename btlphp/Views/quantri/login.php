<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="Views/quantri/css/bootstrap.min.css">
    <script src="Views/quantri/js/jquery-1.11.1.min.js"></script>
    <script src="Views/quantri/js/bootstrap.min.js"></script>
    <style>
    #login{
        float:none;
        margin:50px auto;}
    </style>
</head>

<body>
    <div class="container">
       <div class="row">
           <div id="login" class="col-xs-4">
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
            <a href="quantri.php?page_layout=login"><img src="Views/images/logo.jpg"></a>
            <form method="post" action="">
            	<div class="form-group">
                   <label>Email</label>
                   <input required type="text" name="email" class="form-control" placeholder="Nhập Email" />
               </div>
               <div class="form-group">
                   <label>Password</label>
                   <input required type="text" name="password" class="form-control" placeholder="Nhập mật khẩu" />
               </div>
               <button type="submit" name="submit" class="btn btn-primary">Login</button>
           </form>
           <br>
           <a href="index.php"><button type="button" class="btn btn-success">Trở lại trang chủ AutoCar</button></a>
       </div>
   </div>
</div>
</body>