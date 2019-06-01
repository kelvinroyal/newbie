<?php
$dong = new Dong();
$id=$_GET['id_dong'];
$dong->set_id_dong($id);
$dong->del();
$_SESSION['success'] = '<div class="alert alert-success">Xóa dòng xe thành công!</div>';
header('location: quantri.php?page_layout=qldong');
?>