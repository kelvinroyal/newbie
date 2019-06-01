<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>AutoCar</title>
  <link rel="stylesheet" type="text/css" href="Views/quantri/css/bootstrap.min.css">
  <script src="Views/quantri/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="Views/quantri/js/bootstrap.min.js"></script>
  <style>
  #navbar{
   margin-top:50px;}
   #tbl-first-row{
     font-weight:bold;}
     #logout{
       padding-right:30px;}     
     </style>
   </head>
   <div class="container">
    <div id="navbar" class="row">
     <div class="col-sm-12">
       <nav class="navbar navbar-default">
        <div class="container-fluid">
         <ul class="nav navbar-nav">
          <li><a href="quantri.php">Home</a></li>
          <li><a href="quantri.php?page_layout=addtv">Thêm thành viên</a></li>
        </ul>
        <p id="logout" class="navbar-text navbar-right"><a class="navbar-link" href="quantri.php?page_layout=logout">Logout</a></p>
      </div>
    </nav>
  </div>
</div>
<div class="row">
 <div class="col-sm-6">
  <?php
  if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
  }
  ?>
  <form method="post">
   <div class="form-group">
     <label>Tên thành viên</label>
     <input type="text" name="name_thanhvien" class="form-control" placeholder="Tên thành viên" required />
   </div>
   <div class="form-group">
     <label>Email</label>
     <input type="text" name="email" class="form-control" placeholder="Email" required />
   </div>
   <div class="form-group">
     <label>Password</label>
     <input type="password" name="password" class="form-control" placeholder="Password" required />
   </div>
   <div class="form-group">
     <label>Level</label>
     <select name="level_thanhvien" class="form-control">
       <option value="1">Admin</option>
       <option value="2">Mod</option>
       <option value="3" selected="selected">User</option>
     </select>
   </div>
   <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
 </form>
</div>
</div>
</div>