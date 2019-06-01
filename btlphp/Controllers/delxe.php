<?php
$xe = new Xe();
$id=$_GET['id_xe'];
$xe->set_id_xe($id);
$xe->del();
$_SESSION['success'] = '<div class="alert alert-success">Xóa xe thành công!</div>';
header('location: quantri.php?page_layout=qlxe');
?>