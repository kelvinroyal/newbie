<?php

$dong = new Dong();
if(isset($_POST['submit'])){
	$dong->set_name_dong($_POST['name_dong']);
	if ($dong->add() == "exists") {
		$_SESSION['error'] = '<div class="alert alert-danger">Thêm dòng xe thất bại!</div>';
	}
	else{
		$_SESSION['success'] = '<div class="alert alert-success">Thêm dòng xe thành công!</div>';
		header('location: quantri.php?page_layout=qldong');
	}
}
include_once 'Views/quantri/adddong.php';
?>