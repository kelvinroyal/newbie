<?php
$user = new User();
$id=$_GET['id_thanhvien'];
$user->set_id_thanhvien($id);
$user->del();
$_SESSION['success'] = '<div class="alert alert-success">Xóa thành viên thành công!</div>';
header('location: quantri.php');
?>