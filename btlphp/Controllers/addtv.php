<?php
$user = new User();
if(isset($_POST['submit'])){
	$user->set_name_thanhvien($_POST['name_thanhvien']);
	$user->set_email($_POST['email']);
	$user->set_password($_POST['password']);
	$user->set_level_thanhvien($_POST['level_thanhvien']);
	if ($user->add() == "exists") {
		$_SESSION['error'] = '<div class="alert alert-danger">Thêm thành viên thất bại!</div>';
		header('location: quantri.php?page_layout=addtv');
	}
	else{
		$_SESSION['success'] = '<div class="alert alert-success">Thêm thành viên thành công!</div>';
		header('location: quantri.php?page_layout=admin');
	}
}
include_once 'Views/quantri/addtv.php';
?>