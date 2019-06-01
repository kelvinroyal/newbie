<?php

$dong = new Dong();
$id = $_GET['id_dong'];
$sql= "SELECT * FROM dong WHERE id_dong=$id";
$dong->query($sql);
$row=$dong->fetch_array();
if (isset($_POST['submit'])) {
	$dong->set_id_dong($id);
	$dong->set_name_dong($_POST['name_dong']);
	if ($dong->edit() == 'exists') {
		$_SESSION['error'] = '<div class="alert alert-danger">Sửa dòng xe thất bại!</div>';
	}
	else{
		$_SESSION['success'] = '<div class="alert alert-success">Sửa dòng xe thành công!</div>';
		header('location: quantri.php?page_layout=qldong');
	}
}
include_once 'Views/quantri/editdong.php';
?>